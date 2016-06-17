<?php

namespace App\Controllers;

use Core\Config;
use Core\MainController;

use Helpers\Auth;
use Helpers\Csrf;
use Helpers\Flash;
use Helpers\Http;
use Helpers\Session;

/**
 * Controller da página de contaco
 */
class ContactController extends MainController
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Página de contato
	 *
	 * @access public
	 * @return view
	 */
	public function indexAction()
	{
		$contact = $this->model('Contact');

		return $this->view($this->getTemplate(), $contact->getData());
	}

	/**
	 * Processa o envio da mensagem
	 *
	 * @access public
	 * @return mix
	 */
	public function processAction()
	{
		if ( !Http::checkReferer('contact') ):
			return $this->redirect(404);
		endif;

		$verifyToken = Csrf::check('contactData', 'contact');

		if ( $verifyToken ):
			$contact = $this->model('Contact');

			$errors = $contact->getData()['validate'];

			if ( !empty($errors) ):
				$message = $contact->getData()['messages'];
				Flash::danger($message);

				return $this->redirect('contact');
			else:
				if ( $contact->sendEmail() ):
					Flash::success(Config::get('message.contact.success'));

					return $this->redirect();
				else:
					Flash::danger(Config::message('message.system.error'));

					return $this->redirect('contact');
				endif;
			endif;
		endif;
	}
}