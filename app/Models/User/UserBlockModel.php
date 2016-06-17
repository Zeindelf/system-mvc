<?php

namespace App\Models\User;

use Core\Config;
use Core\MainModel;

use Helpers\Message;
use Helpers\Session;

/**
 * Modelo da página de usuários bloqueados
 */
class UserBlockModel extends MainModel
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
	 * Obtém as mensagens referente ao bloqueio para serem processadas na view
	 *
	 * @access private
	 * @return type
	 */
	private function getMessages()
	{
		$link = BASE_URL . '/user/unblock';
		$this->messages = Message::get(
			'danger',
			Config::message('message.user.block', $link),
			false
		);
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