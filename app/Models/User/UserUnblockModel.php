<?php

namespace App\Models\User;

use Core\Config;
use Core\MainModel;

use Mail\Mailer;

use Helpers\Hash;
use Helpers\Session;
use Helpers\Validate;

/**
 * Modelo para envio do link de desbloqueio de usuários
 */
class UserUnblockModel extends MainModel
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
	 * Realiza o envio do e-mail contendo o link para desbloqueio
	 *
	 * @access public
	 * @return boolean
	 */
	public function sendEmail()
	{
		$this->setUser();

		$uriHash = $this->generateLink();
		$email = $this->user['email'];
		$emailHash = Hash::hash($email);
		$delimiterHash = Config::get('password.delimiter');
		$subject = 'Recuperação de conta';

		$this->saveHashUri($uriHash, $email);

		$username = $this->user['username'];
		$firstname = $this->user['firstname'];


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

		if ( $mailer->send('user-unblock', $email, $subject, $data) ):
			return true;
		endif;

		return false;
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Recupera os dados do usuário para realizar o envio do e-mail
	 *
	 * @access private
	 * @return void
	 */
	private function setUser()
	{
		$this->user = Session::get('blockUserData');
		Session::delete('blockUserData');

		$readUser = $this->newRead();
		$readUser->executeRead('users', 'WHERE id = :id', "id={$this->user}");

		$this->user = $readUser->getResult()[0];
	}

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
		$updateUser->executeUpdate('users', ['login_recover' => $uri], 'WHERE email = :email', "email={$email}");
	}

	/**
	 * Gera uma string aleatória de 128 caracteres
	 *
	 * @return string
	 */
	public function generateLink()
	{
		return Hash::randomHash(128);
	}

	/**
	 * Seta o array com as informações necessárias
	 *
	 * @access private
	 * @return array
	 */
	private function setData()
	{
		$this->getMessages();

		$this->data = [
			'variables' => [
				'headerTitle' => 'Usuário bloqueado',
				'indexTitle'  => 'Usuário bloqueado',
			],
			'session' => [
				'message' => Session::get('message'),
			],
			'messages' => $this->messages,
		];
	}
}