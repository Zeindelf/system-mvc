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

	private $sessionUserActive;

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

				$logout = $this->model('Login');

				if ( Cookie::exists(Config::get('cookie.remember')) ):
					$logout->removeRememberCredentials($id);

					Cookie::delete(Config::get('cookie.remember'));
				endif;

				if ( Config::get('user.activeAcc') ):
					// Conta não ativada
					if ( !$logout->activeVerify($id) ):
						$link = Config::get('html.baseUrl') . '/user/activate';
						Flash::warning(Config::message('message.user.account.inactive', $link));
					else:
						Flash::info(Config::message('message.logout'), false);
					endif;
				else:
					Flash::info(Config::message('message.logout'), false);
				endif;
			endif;

			return $this->redirect('login');
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