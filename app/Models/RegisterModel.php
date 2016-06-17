<?php

namespace App\Models;

use Core\Config;
use Core\MainModel;

use Helpers\Hash;
use Helpers\Session;
use Helpers\Validate;

/**
 * Modelo da página de cadastro de usuários
 */
class RegisterModel extends MainModel
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

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
	 * @var object
	 */
	private $validate;

	/**
	 * Armazena a lista de erros do helper Validate
	 *
	 * @var string
	 */
	private $messages;

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
	 * Realiza o cadastro do usuário
	 *
	 * @return boolean
	 */
	public function create()
	{
		$username = strtolower(Session::get('registerData.username'));
		$email = strtolower(Session::get('registerData.email'));
		$password = Hash::set(Session::get('registerData.password'));

		$data = [
			'username' => $username,
			'email' => $email,
			'password' => $password
		];

		$createUser = $this->newCreate();
		$createUser->executeCreate('users', $data);

		if ( $createUser->getResult() ):
			return true;
		endif;

		return false;
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Realiza a validação dos dados
	 *
	 * @access public
	 * @return array
	 */
	private function validation()
	{
		$this->validate = Session::get('registerData');

		$validate = new Validate;
		$validate->check($this->validate, [
			'username' => [
				'name'     => 'Usuário',
				'required' => true,
				'min'      => Config::get('validate.user.minUsername'),
				'max'      => Config::get('validate.user.maxUsername'),
				'unique'   => 'users',
				'username' => true,
			],
			'email' => [
				'name'     => 'E-mail',
				'required' => true,
				'email'    => true,
				'max'      => Config::get('validate.user.maxEmail'),
				'unique'   => 'users',
			],
			'password' => [
				'name'     => 'Senha',
				'required' => true,
				'min'      => Config::get('validate.user.minPassword'),
				'max'      => Config::get('validate.user.maxPassword'),
			],
			'confirm_password' => [
				'name'     => 'Repita sua senha',
				'required' => true,
				'matches'  => 'password',
			]
		]);

		$this->validate = $validate->errors();
		$this->messages = $validate->listMessages();
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
				'headerTitle' => 'Cadastrar',
				'indexTitle'  => 'Cadastre-se',
			],
			'session' => [
				'message' => Session::get('message'),
			],
			'validate' => $this->validate,
			'messages' => $this->messages,
		];
	}
}