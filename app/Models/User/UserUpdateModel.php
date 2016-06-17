<?php

namespace App\Models\User;

use Core\Config;
use Core\MainModel;

use Helpers\Hash;
use Helpers\Request;
use Helpers\Session;
use Helpers\Validate;

/**
 * Modelo da página de usuários bloqueados
 */
class UserUpdateModel extends MainModel
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
	 * Atualiza os dados do usuário
	 *
	 * @return boolean
	 */
	public function update()
	{
		$this->user = Session::get(Config::get('session.user'));

		$data = [
			'email' => Session::get('updateUserData')['email'],
			'firstname' => Session::get('updateUserData')['firstname'],
			'lastname' => Session::get('updateUserData')['lastname']
		];

		$updateUser = $this->newUpdate();
		$updateUser->executeUpdate('users', $data, 'WHERE id = :id', "id={$this->user['id']}");

		if ( $updateUser->getResult() ):
			$readUser = $this->newRead();
			$readUser->executeRead('users', 'WHERE id = :id', "id={$this->user['id']}");
			$this->user = $readUser->getResult()[0];
			unset($this->user['password']);

			Session::set(Config::get('session.user'), $this->user);

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
		$this->validate = Session::get('updateUserData');

		$validate = new Validate;
		$validate->check($this->validate, [
			'email' => [
				'name'     => 'E-mail',
				'required' => true,
				'email'    => true,
				'max'      => Config::get('validate.user.maxEmail'),
				'unique'   => 'users',
			],
			'firstname' => [
				'name'     => 'Nome',
				'required' => true,
				'min'      => Config::get('validate.user.minFirstname'),
				'max'      => Config::get('validate.user.maxFirstname'),
			],
			'lastname' => [
				'name'     => 'Sobrenome',
				'required' => true,
				'min'      => Config::get('validate.user.minLastname'),
				'max'      => Config::get('validate.user.maxLastname'),
			],
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
				'headerTitle' => 'Atualizar dados',
				'indexTitle'  => 'Atualizar dados',
			],
			'session' => [
				'message' => Session::get('message'),
			],
			'validate' => $this->validate,
			'messages' => $this->messages,
		];
	}
}