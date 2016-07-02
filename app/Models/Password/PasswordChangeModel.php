<?php

namespace App\Models\Password;

use Core\Config;
use Core\MainModel;
use Core\Request;

use Helpers\Hash;
use Helpers\Session;
use Helpers\Validate;

/**
 * Modelo da página principal
 */
class PasswordChangeModel extends MainModel
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
	 * Realiza a troca de senha do usuário
	 *
	 * @access public
	 * @return boolean
	 */
	public function changePassword()
	{
		$userId = Session::get(Config::get('session.user'))['id'];
		$newPassword = Hash::set(Request::post('new_password'));

		$updateUser = $this->newUpdate();
		$updateUser->executeUpdate('users', ['password' => $newPassword], 'WHERE id = :id', "id={$userId}");

		if ( $updateUser->getResult() ) {
			return true;
		}

		return false;

	}

	/**
	 * Verifica se a senha informada pelo usuário é sua senha atual válida
	 *
	 * @access public
	 * @return boolean
	 */
	public function checkPassword()
	{
		$userId = Session::get(Config::get('session.user'))['id'];

		$readUser = $this->newRead();
		$readUser->executeRead('users', 'WHERE id = :id', "id={$userId}");
		$this->user = $readUser->getResult()[0];

		$userPassword = $this->user['password'];
		$currentPassword = Request::post('current_password');

		if ( Hash::check($currentPassword, $userPassword) ) {
			return true;
		}

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
		$this->validate = Session::get('changePasswordData');

		$validate = new Validate;
		$validate->check($this->validate, [
			'current_password' => [
				'name'     => 'Senha atual',
				'required' => true,
				'min'      => Config::get('validate.user.minPassword'),
			],
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
				'headerTitle' => 'Mudar a senha',
				'indexTitle'  => 'Mudar a senha',
			],
			'session' => [
				'message' => Session::get('message'),
			],
			'validate' => $this->validate,
			'messages' => $this->messages,
		];
	}
}