<?php

namespace App\Models\Password;

use Core\Config;
use Core\MainModel;

use Mail\Mailer;

use Helpers\Hash;
use Helpers\Session;
use Helpers\Validate;

/**
 * Modelo da página principal
 */
class PasswordRecoverModel extends MainModel
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

	/**
	 * Armazena os dados do usuário vindos do Banco de Dados
	 *
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
	 * Verifica se o usuário existe
	 *
	 * @return boolean
	 */
	public function checkEmail()
	{
		$email = Session::get('recoverPasswordData.email');

		$readUser = $this->newRead();
		$readUser->executeRead('users', 'WHERE email = :email', "email={$email}");

		Session::set( 'recoverUserData', $readUser->getResult()[0] );

		if ( $readUser->getRowCount() > 0 ) {
			return true;
		}

		return false;
	}

	/**
	 * Envia o e-mail com o link para a redefinição
	 *
	 * @return boolean
	 */
	public function sendEmail()
	{
		$uriHash = $this->generateLink();
		$email = Session::get('recoverPasswordData.email');
		$emailHash = Hash::hash($email);
		$delimiterHash = Config::get('password.delimiter');
		$subject = 'Recuperação de senha';

		$this->saveHashUri($uriHash, $email);

		$username = Session::get('recoverUserData.username');
		$firstname = Session::get('recoverUserData.firstname');

		Session::delete('recoverUserData');

		// Dados para o template do e-mail enviado
		$data = [
			'uriHash'       => $uriHash,
			'emailHash'     => $emailHash,
			'delimiterHash' => $delimiterHash,
			'username'      => $username,
			'firstname'     => $firstname,
		];

		$mailer = new Mailer;
		$mailer->from();

		if ( $mailer->send('password-recover', $email, $subject, $data) ) {
			return true;
		}

		return false;
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Salva a URI randômica no banco
	 *
	 * @access private
	 * @param string 	$uri 		Hash randômico de 64 caracteres
	 * @param string 	$email 		E-mail do usuário
	 * @return type
	 */
	private function saveHashUri($uri, $email)
	{
		$updateUser = $this->newUpdate();
		$updateUser->executeUpdate('users', ['recover_hash' => $uri], 'WHERE email = :email', "email={$email}");
	}

	/**
	 * Gera uma string aleatória de 64 caracteres
	 *
	 * @access private
	 * @return string
	 */
	private function generateLink()
	{
		return Hash::randomHash(64);
	}

	/**
	 * Realiza a validação dos dados
	 *
	 * @access private
	 * @return array
	 */
	private function validation()
	{
		$this->validate = Session::get('recoverPasswordData');

		$validate = new Validate;
		$validate->check($this->validate, [
			'email' => [
				'name'     => 'Informe seu e-mail cadastrado',
				'required' => true,
				'email'    => true,
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
				'headerTitle' => 'Recuperar senha',
				'indexTitle'  => 'Recuperar senha',
			],
			'session' => [
				'message' => Session::get('message'),
			],
			'validate' => $this->validate,
			'messages' => $this->messages,
		];
	}
}