<?php

namespace App\Controllers;

use Core\Config;
use Core\MainController;

use Helpers\Cookie;
use Helpers\Flash;
use Helpers\Session;

/**
 * Controller de logout
 */
class LogoutController extends MainController
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Armazena o nome da sessão
	 *
	 * @var string
	 */
	private $sessionUser;

	/**
	 * Armazena o id do usuário logado
	 *
	 * @var string
	 */
	private $sessionUserId;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Redireciona para o processo de logout caso acessado
	 *
	 * @access public
	 * @return redirect
	 */
	public function indexAction()
	{
		$this->setSessionName();

		if ( Session::exists($this->sessionUser) ):
			$id = Session::get($this->sessionUserId);
			return $this->redirect('logout/process/' . $id);
		endif;

		return $this->redirect(404);
	}

	/**
	 * Processa o logout do usuário
	 *
	 * @access public
	 * @return process
	 */
	public function processAction($id = null)
	{
		$this->setSessionName();

		if ( Session::exists($this->sessionUser) ):
			if ( Session::get($this->sessionUserId) === $id ):
				Session::delete($this->sessionUser);

				if ( Cookie::exists(Config::get('cookie.remember')) ):
					$logout = $this->model('Login');
					$logout->removeRememberCredentials($id);

					Cookie::delete(Config::get('cookie.remember'));
				endif;

				Flash::info(Config::message('message.logout'), false);

				return $this->redirect('login');
			endif;
		endif;

		return $this->redirect(404);
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Obtém o nome da sessão e o id do usuário armazenado na sessão
	 * para efetuar o logout
	 *
	 * @return boolean
	 */
	private function setSessionName()
	{
		$this->sessionUser = Config::get('session.user');
		$this->sessionUserId = Config::get('session.user') . '.id';

		return true;
	}
}