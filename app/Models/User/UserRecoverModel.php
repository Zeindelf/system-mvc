<?php

namespace App\Models\User;

use Core\Config;
use Core\MainModel;

use Helpers\Hash;
use Helpers\Session;
use Helpers\Validate;

/**
 * Modelo da página para o usuário recuperar a conta
 */
class UserRecoverModel extends MainModel
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Contém a URI que identifica o e-mail enviado ao usuário
	 *
	 * @access private
	 * @var string
	 */
	private $idenifier;

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
	 * Verifica se o identificador via URI é válido
	 *
	 * @access public
	 * @return boolean
	 */
	public function getIdentifier()
	{
		$this->identifier = explode(Config::get('password.delimiter'), Session::get('userUri'));

		$readUser = $this->newRead();
		if ( isset($this->identifier[1]) ):
			$readUser->executeRead('users', 'WHERE login_recover = :login_recover', "login_recover={$this->identifier[1]}");
		endif;

		if ( $readUser->getResult() ):
			$this->user = $readUser->getResult()[0];
			$emailHash = Hash::hash($this->user['email']);
		endif;

		if ( isset($emailHash) ):
			if ( $emailHash === $this->identifier[0] ):
				return true;
			endif;
		endif;

		Session::delete('userUri');
		return false;
	}

	/**
	 * Verifica se o e-mail digitado pelo usuário é realmente dele
	 *
	 * @access public
	 * @return boolean
	 */
	public function checkEmail()
	{
		if ( ($this->user['email'] === Session::get('recoverUserData.email')) ):
			return true;
		endif;

		return false;
	}

	/**
	 * Realiza o desbloqueio do usuário zerando as contagens de
	 * tentativas de login e o hash do login_recover
	 *
	 * @access public
	 * @return boolean
	 */
	public function unblockUser()
	{
		$updateUser = $this->newUpdate();
		$updateUser->executeUpdate('users', ['login_attempts' => null, 'login_recover' => null], 'WHERE id = :id', "id={$this->user['id']}");

		if ( $updateUser->getResult() ):
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
	 * @access private
	 * @return array
	 */
	private function validation()
	{
		$this->validate = Session::get('recoverUserData');

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
				'headerTitle' => 'Recuperar conta',
				'indexTitle'  => 'Recuperar conta',
			],
			'session' => [
				'message' => Session::get('message'),
			],
			'validate' => $this->validate,
			'messages' => $this->messages,
		];
	}
}