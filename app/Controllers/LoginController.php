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
 * Controller de login
 */
class LoginController extends MainController
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Página com formulário de login
	 *
	 * @access public
	 * @return view
	 */
	public function indexAction()
	{
		if ( Auth::user('logged') ):
			return false;
		endif;

		$login = $this->model('Login');

		return $this->view($this->getTemplate(), $login->getData());
	}

	/**
	 * Envia os dados para o model, recebe eles tratados e decide
	 * o que será enviado à view e para onde enviará o usuário
	 *
	 * @access public
	 * @return mix
	 */
	public function processAction()
	{
		if ( !Http::checkReferer('login') ):
			return $this->redirect(404);
		endif;

		$verifyToken = Csrf::check('loginData', 'login');

		if ( $verifyToken ):
			$login = $this->model('Login');

			$errors = $login->getData()['validate'];

			if ( !empty($errors) ):
				$message = $login->getData()['messages'];
				Flash::danger($message);

				return $this->redirect('login');
			else:
				if ( !$login->checkLogin() ):
					$login->attempts();

					$loginAttempts = Config::get('login.attempts') - $login->countAttempts;

					// Aviso sobre a última tentativa de login
					if ( $loginAttempts == 1 ):
						Flash::danger(Config::message('message.login.alert'));

						return $this->redirect('password/recover');
					endif;

					// Bloqueio da conta
					if ( $login->attempts == Config::get('login.attempts') || $loginAttempts == 0 ):
						return $this->redirect('user/block');
					endif;

					// Contagem de erro de senha
					if ( $loginAttempts < 3 && $loginAttempts > 0 ):
						Flash::danger(Config::message('message.login.warning', $loginAttempts));
					else:
						Flash::danger(Config::message('message.login.invalid'));
					endif;

					return $this->redirect('login');
				else:
					Flash::success($login->getUserName());

					return $this->redirect();
				endif;
			endif;
		endif;
	}
}