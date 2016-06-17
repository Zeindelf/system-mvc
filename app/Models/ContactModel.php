<?php

namespace App\Models;

use Core\Config;
use Core\MainModel;

use Mail\Mailer;

use Helpers\Hash;
use Helpers\Request;
use Helpers\Session;
use Helpers\Validate;

/**
 * Modelo da página de cadastro de usuários
 */
class ContactModel extends MainModel
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
	 * Envia a mensagem para o e-mail cadastrado no sistema
	 *
	 * @return boolean
	 */
	public function sendEmail()
	{

		$name = Session::get('contactData.name');
		$email = Session::get('contactData.email');
		$subject = Session::get('contactData.subject');
		$message = Session::get('contactData.message');

		$subjectEmail = 'Contato via site';
		Session::delete('contctData');

		// Dados para o template do e-mail enviado
		$data = [
			'name'    => $name,
			'email'   => $email,
			'subject' => $subject,
			'message' => $message,
		];

		$mailer = new Mailer;
		$mailer->from('site@zeindelf.com', $name, $email);

		if ( $mailer->send('contact', Config::get('mail.username'), $subjectEmail, $data) ):
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
		$this->validate = Session::get('contactData');

		$validate = new Validate;
		$validate->check($this->validate, [
			'name' => [
				'name'     => 'Nome',
				'required' => true,
				'min'      => Config::get('validate.contact.minName'),
				'max'      => Config::get('validate.contact.maxName'),
			],
			'email' => [
				'name'     => 'E-mail',
				'required' => true,
				'email'    => true,
				'max'      => Config::get('validate.contact.maxEmail'),
			],
			'subject' => [
				'name'     => 'Assunto',
				'required' => true,
				'min'      => Config::get('validate.contact.minSubject'),
				'max'      => Config::get('validate.contact.maxSubject'),
			],
			'message' => [
				'name'     => 'Mensagem',
				'required' => true,
				'min'      => Config::get('validate.contact.minMessage'),
				'max'      => Config::get('validate.contact.maxMessage'),
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
				'headerTitle' => 'Contato',
				'indexTitle'  => 'Contato',
			],
			'session' => [
				'message' => Session::get('message'),
			],
			'validate' => $this->validate,
			'messages' => $this->messages,
		];
	}
}