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
 * Controller de registro de usuários
 */
class RegisterController extends MainController
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Página com formulário de registro
	 *
	 * @access public
	 * @return view
	 */
	public function indexAction()
	{
		if ( Auth::user('logged') ) {
			return false;
		}

		$register = $this->model('RegisterUser', 'Register');

		return $this->view($this->getTemplate(), $register->getData());
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
		if ( !Http::checkReferer('register') ) {
			return $this->redirect(404);
		}

		$verifyToken = Csrf::check('registerData', 'register');

		if ( $verifyToken ) {
			$register = $this->model('RegisterUser', 'Register');

			$errors = $register->getData()['validate'];

			if ( !empty($errors) ) {
				$message = $register->getData()['messages'];
				Flash::danger($message);

				return $this->redirect('register');
			} else {
				if ( \Badwords\Badwords::verify(Session::get('registerData.username')) ) {
					Flash::danger(Config::message('message.register.censored'));

					return $this->redirect('register');
				} else {
					if ( !$register->create() ) {
						Flash::danger(Config::message('message.system.error'));

						return $this->redirect('register');
					} else {
						if ( Config::get('user.activeAcc') ) {
							$activate = $this->model('UserActivate', 'User');
							$activate->sendEmail();

							$link = Config::get('html.baseUrl') . '/user/activate';
							Flash::warning(Config::message('message.register.activate', $link));
						} else {
							$register->sendEmail();
							Flash::success(Config::message('message.register.success'));
						}

						return $this->redirect('login');
					}
				}
			}
		}
	}
}