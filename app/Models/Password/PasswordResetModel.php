<?php

namespace App\Models\Password;

use Core\Config;
use Core\MainModel;

use Helpers\Hash;
use Helpers\Request;
use Helpers\Session;
use Helpers\Validate;

class PasswordResetModel extends MainModel
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
	 * Identificador da solicitação
	 *
	 * @access private
	 * @var string
	 */
	private $identifier;

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
	 * Compara o identificador com os dados do banco
	 *
	 * @access public
	 * @return boolean
	 */
	public function getIdentifier()
	{
		$this->identifier = explode(Config::get('password.delimiter'), Session::get('passwordUri'));

		$readUser = $this->newRead();
		if ( isset($this->identifier[1]) ):
			$readUser->executeRead('users', 'WHERE recover_hash = :recover_hash', "recover_hash={$this->identifier[1]}");
		endif;

		if ( $readUser->getResult() ):
			$this->user = $readUser->getResult()[0];
			$emailHash = Hash::hash($this->user['email']);

			return $this->expire();
		endif;

		if ( isset($emailHash) ):
			if ( $emailHash === $this->identifier[0] ):
				return true;
			endif;
		endif;

		Session::delete('passwordUri');
		return false;
	}

	/**
	 * Troca a senha do usuário e deleta o código de recuperação
	 *
	 * @access public
	 * @return boolean
	 */
	public function change()
	{
		$userId = $this->user['id'];
		$newPassword = Hash::set(Request::post('new_password'));

		$updateUser = $this->newUpdate();
		$updateUser->executeUpdate('users', ['password' => $newPassword], 'WHERE id = :id', "id={$userId}");

		if ( $updateUser->getResult() ):
			$updateUser->executeUpdate('users', ['recover_hash' => null], 'WHERE id = :id', "id={$userId}");
			return true;
		endif;

		return false;
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Define em quanto tempo o código de recuperação irá expirar
	 *
	 * @access public
	 * @return void
	 */
	private function expire()
	{
		$now = date('Y-m-d H:i:s');

		$date = new \DateTime($this->user['updated_at']);
		$date->modify('+' . Config::get('password.expire') . 'minutes');
		$expire = $date->format('Y-m-d H:i:s');

		if ( $expire < $now ):
			$updateUser = $this->newUpdate();
			$updateUser->executeUpdate('users', ['recover_hash' => null], 'WHERE id = :id', "id={$this->user['id']}");

			return false;
		endif;

		return true;
	}

	/**
	 * Realiza a validação dos dados
	 *
	 * @access private
	 * @return array
	 */
	private function validation()
	{
		$this->validate = Session::get('resetPasswordData');

		$validate = new Validate;
		$validate->check($this->validate, [
			'new_password' => [
				'name'     => 'Nova senha',
				'required' => true,
				'min'      => Config::get('validate.user.minPassword'),
				'max'      => Config::get('validate.user.maxPassword'),
			],
			'confirm_new_password' => [
				'name'     => 'Repita a nova senha',
				'required' => true,
				'matches'  => 'new_password',
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
				'headerTitle' => 'Atualizar senha',
				'indexTitle'  => 'Atualizar senha',
			],
			'session' => [
				'message' => Session::get('message'),
			],
			'validate'   => $this->validate,
			'messages'   => $this->messages,
			'identifier' => $this->getIdentifier(),
		];
	}
}