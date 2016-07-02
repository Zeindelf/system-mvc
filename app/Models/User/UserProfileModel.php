<?php

namespace App\Models\User;

use Core\Config;
use Core\MainModel;

use Helpers\Session;

/**
 * Modelo da página principal de usuário
 */
class UserProfileModel extends MainModel
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

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Seta o array com as informações necessárias
	 *
	 * @access private
	 * @return array
	 */
	private function setData()
	{
		$username = Session::get(Config::get('session.user'))['username'];
		$firstname = Session::get(Config::get('session.user'))['firstname'];
		$lastname = Session::get(Config::get('session.user'))['lastname'];

		if ( is_null($firstname) || is_null($lastname) ) {
			$userdata = 'Olá, ' . ucfirst($username);
		} else {
			$userdata = 'Olá, ' . ucfirst($firstname) . ' ' . ucfirst($lastname);
		}

		$this->data = [
			'variables' => [
				'headerTitle' => $username,
				'indexTitle'  => $userdata,
			],
			'session' => [
				'message' => Session::get('message'),
			],
			'messages' => $this->messages,
		];
	}
}