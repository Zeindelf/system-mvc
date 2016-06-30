<?php

namespace App\Models;

use Core\Config;
use Core\MainModel;
use Core\Redirect;

use Helpers\Cookie;
use Helpers\Hash;
use Helpers\Session;
use Helpers\Validate;

/**
 * Modelo da página de login
 */
class LoginModel extends MainModel
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Número de tentativas atual
	 *
	 * @access public
	 * @var int
	 */
	public $attempts;

	/**
	 * Contagem das tentativas
	 *
	 * @access public
	 * @var int
	 */
	public $countAttempts;

	/**
	 * Dados que serão enviados para o Controller abastecer a View
	 *
	 * @access private
	 * @var array
	 */
	private $data;

	/**
	 * Instancia o helper Validate
	 *
	 * @access private
	 * @var object
	 */
	private $validate;

	/**
	 * Armazena a lista de erros do helper Validate
	 *
	 * @access private
	 * @var string
	 */
	private $messages;

	/**
	 * Armazena os dados do usuário vindos do Banco de Dados
	 *
	 * @access private
	 * @var array
	 */
	private $user;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Obtém os dados tratados
	 *
	 * @access public
	 * @return array
	 */
	public function getData()
	{
		$this->setData();

		return $this->data;
	}

	/**
	 * Checa se os dados são válidos e efetua o login do usuário
	 * Realiza o login pelo Nome de Usuário ou pelo E-mail
	 *
	 * @access public
	 * @return boolean
	 */
	public function checkLogin()
	{
		$userdata = strtolower(Session::get('loginData.userdata'));
		$password = Session::get('loginData.password');
		$remember = Session::get('loginData.remember');

		$readUser = $this->newRead();
		$readUser->executeRead('users', 'WHERE username = :userdata OR email = :userdata', "userdata={$userdata}");

		$this->user = $readUser->getResult()[0];
		$check = Hash::check($password, $this->user['password']);

		if ( $check ):
			// Verifica o número de tentativas de login
			$this->attempts = $this->user['login_attempts'];
			if ( $this->attempts == Config::get('login.attempts') ):
				return false;
			endif;

			unset($this->user['password']);
			$userId = $this->user['id'];

			$updateUser = $this->newUpdate();
			$updateUser->executeUpdate('users', ['login_attempts' => null, 'recover_hash' => null], 'WHERE id = :id', "id={$userId}");

			Session::set(Config::get('session.user'), $this->user);

			// Lembrar usuário
			if ( $remember === 'on' ):
				$rememberIdentifier = Hash::randomHash(128);
				$rememberToken = Hash::randomHash(128);

				$this->updateRememberCredentials($rememberIdentifier, Hash::set($rememberToken), $userId);

				Cookie::set(
					Config::get('cookie.remember'),
					$rememberIdentifier . Config::get('cookie.delimiter') . $rememberToken,
					Config::get('cookie.expiry')
				);
			endif;

			if ( Config::get('user.activeAcc') ):
				Session::set('activateId', $userId);
			endif;

			return true;
		endif;

		return false;
	}

	/**
	 * Verifica se existe o cookie correspondente ao usuário que pediu
	 * para ser lembrado ao logar-se
	 *
	 * @access public
	 * @return void
	 */
	public function checkRememberMe()
	{
		if ( Cookie::get(Config::get('cookie.remember')) && !Session::get(Config::get('session.user')) ):
			$cookie = Cookie::get(Config::get('cookie.remember'));

			$credentials = explode(Config::get('cookie.delimiter'), $cookie);

			if ( empty(trim($cookie)) || count($credentials) !== 2 ):
				Redirect::to();
			else:
				$identifier = $credentials[0];

				$readUser = $this->newRead();
				$readUser->executeRead('users', 'WHERE remember_identifier = :remember', "remember={$identifier}");

				$this->user = $readUser->getResult()[0];

				if ( $readUser->getRowCount() > 0 ):
					if ( Hash::check($credentials[1], $this->user['remember_token']) ):
						unset($this->user['password']);
						Session::set(Config::get('session.user'), $this->user);
					else:
						$this->removeRememberCredentials($this->user['id']);
					endif;
				endif;
			endif;
		endif;
	}

	/**
	 * Soma as tentativas falhas de login
	 *
	 * @access public
	 * @return boolean
	 */
	public function attempts()
	{
		$userId = $this->user['id'];
		$this->countAttempts = $this->user['login_attempts'];
		$this->countAttempts++;

		Session::set('blockUserData', $this->user['id']);

		if ( $this->countAttempts <= Config::get('login.attempts') ):
			$updateUser = $this->newUpdate();
			$updateUser->executeUpdate('users', ['login_attempts' => $this->countAttempts], 'WHERE id = :id', "id={$userId}");

			return false;
		endif;

		return true;
	}

	/**
	 * Deleta as credenciais do banco de dados
	 *
	 * @access public
	 * @param int 	$userId 	Id do usuário correspondente
	 * @return void
	 */
	public function removeRememberCredentials($userId)
	{
		$this->updateRememberCredentials(null, null, $userId);
	}

	/**
	 * Verifica se a conta do usuário está ativa ou não
	 *
	 * @param int 	$id 	Id do usuário para verificação no logout
	 * @return boolean
	 */
	public function activeVerify($id = null)
	{
		$userId = $this->user['id'];

		$readUser = $this->newRead();

		if ( !is_null($id) ):
			$readUser->executeRead('users', 'WHERE id = :id', "id={$id}");
		else:
			$readUser->executeRead('users', 'WHERE id = :id', "id={$userId}");
		endif;

		$active = $readUser->getResult()[0]['active'];

		if ( !is_null($active) ):
			// Usuário com a conta ativada
			return true;
		endif;

		return false;
	}

	/**
	 * Apresenta mensagem de boas vindas com base nos dados completo ou não do usuário
	 *
	 * @access public
	 * @return message
	 */
	public function getUserName()
	{
		$username = ucfirst(Session::get(Config::get('session.user') . '.username'));
		$firstname = ucfirst(Session::get(Config::get('session.user') . '.firstname'));
		$lastname = ucfirst(Session::get(Config::get('session.user') . '.lastname'));
		$profileLink = BASE_URL . '/user/profile/' . strtolower($username);

		$nameless = [$username, $profileLink];
		$fullname = [$firstname, $lastname];

		if ( empty($firstname) || empty($lastname ) ):
			return Config::message('message.welcome.nameless', $nameless);
		else:
			return Config::message('message.welcome.fullname', $fullname);
		endif;
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Realiza a validação dos dados
	 *
	 * @access private
	 * @return array
	 */
	private function validation()
	{
		$this->validate = Session::get('loginData');

		$validate = new Validate;
		$validate->check($this->validate, [
			'userdata' => [
				'name'     => 'Usuário',
				'required' => true,
			],
			'password' => [
				'name'     => 'Senha',
				'required' => true,
			]
		]);

		$this->validate = $validate->errors();
		$this->messages = $validate->listMessages();
	}

	/**
	 * Atualiza os dados de cookie no banco
	 *
	 * @access private
	 * @param string 	$identifier 	Código de identificação
	 * @param string 	$token 			Token de verificação
	 * @param int|null 	$userId 		Id do usuário atual
	 * @return void
	 */
	private function updateRememberCredentials($identifier, $token, $userId = null)
	{
		$data = [
			'remember_identifier' => $identifier,
			'remember_token' => $token
		];

		$updateUser = $this->newUpdate();
		$updateUser->executeUpdate('users', $data, 'WHERE id = :id', "id={$userId}");
	}

	/**
	 * Seta o array com as informações necessárias
	 *
	 * @access private
	 * @return array
	 */
	private function setData()
	{
		$this->validation();

		$this->data = [
			'variables' => [
				'headerTitle' => 'Login',
				'indexTitle'  => 'Efetue o Login',
			],
			'session' => [
				'message' => Session::get('message'),
			],
			'validate' => $this->validate,
			'messages' => $this->messages,
		];
	}
}