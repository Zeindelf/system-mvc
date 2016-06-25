<?php

namespace App\Models\User;

use Core\Config;
use Core\MainModel;
use Core\Request;

use Mail\Mailer;

use Helpers\Hash;
use Helpers\Session;
use Helpers\Validate;

/**
 * Modelo para envio do link de desbloqueio de usuários
 */
class UserActivateModel extends MainModel
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Armazena os dados do usuário vindos do Banco de Dados
	 *
	 * @access private
	 * @var array
	 */
	private $user;

	/**
	 * Identificador da conta no Banco de Dados
	 *
	 * @var string
	 */
	private $identifier;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Realiza o envio do e-mail contendo o link para ativação da conta
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
		$subject = 'Ativação da conta';

		$this->saveHashActive($uriHash, $email);

		$username = $this->user['username'];

		// Dados para o template do e-mail enviado
		$data = [
			'uriHash'       => $uriHash,
			'emailHash'     => $emailHash,
			'delimiterHash' => $delimiterHash,
			'username'      => $username,
		];

		$mailer = new Mailer;
		$mailer->from();

		if ( $mailer->send('user-activate', $email, $subject, $data) ):
			return true;
		endif;

		return false;
	}

	/**
	 * Obtém o identificador da conta do usuário
	 *
	 * @param string 	$identifier 	Identificador
	 * @return boolean
	 */
	public function getIdentifier($identifier)
	{
		$this->identifier = explode(Config::get('password.delimiter'), $identifier);

		$readUser = $this->newRead();
		if ( isset($this->identifier[1]) ):
			$readUser->executeRead('users', 'WHERE active_hash = :active_hash', "active_hash={$this->identifier[1]}");

			if ( $readUser->getResult() ):
				$userId = $readUser->getResult()[0]['id'];

				$updateUser = $this->newUpdate();
				$updateUser->executeUpdate('users', ['active' => '1', 'active_hash' => null], 'WHERE id = :id', "id={$userId}");

				if ( $updateUser->getResult() ):
					return true;
				endif;
			endif;
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
		$userId = Session::get('activateId');

		$readUser = $this->newRead();
		$readUser->executeRead('users', 'WHERE id = :id', "id={$userId}");

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
	private function saveHashActive($uri, $email)
	{
		$updateUser = $this->newUpdate();
		$updateUser->executeUpdate('users', ['active_hash' => $uri], 'WHERE email = :email', "email={$email}");
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
}