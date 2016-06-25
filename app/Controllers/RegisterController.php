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
		if ( Auth::user('logged') ):
			return false;
		endif;

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
		if ( !Http::checkReferer('register') ):
			return $this->redirect(404);
		endif;

		$verifyToken = Csrf::check('registerData', 'register');

		if ( $verifyToken ):
			$register = $this->model('RegisterUser', 'Register');

			$errors = $register->getData()['validate'];

			if ( !empty($errors) ):
				$message = $register->getData()['messages'];
				Flash::danger($message);

				return $this->redirect('register');
			else:
				if ( !$register->create() ):
					Flash::danger(Config::message('message.system.error'));

					return $this->redirect('register');
				else:
					// Processar a mensagem que fornecerá o link para ativação da conta
					// Redirecionar para user/activate (?)
					if ( Config::get('user.activeAcc') ):
						return print_r('Ativar');
					endif;

					$register->sendEmail();
					Flash::success(Config::message('message.register.success'));

					return $this->redirect('login');
				endif;
			endif;
		endif;
	}
}