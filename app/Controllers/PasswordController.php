<?php

namespace App\Controllers;

use Core\Config;
use Core\MainController;
use Core\Request;

use Helpers\Auth;
use Helpers\Csrf;
use Helpers\Flash;
use Helpers\Http;
use Helpers\Session;

/**
 * Controller da página principal do site
 */
class PasswordController extends MainController
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Formulário para troca de senha do usuário
	 *
	 * @access public
	 * @return view
	 */
	public function changeAction()
	{
		if ( Auth::user('guest') ):
			return false;
		endif;

		$passwordChange = $this->model('PasswordChange', 'Password');

		return $this->view($this->getTemplate(), $passwordChange->getData());
	}

	/**
	 * Processa a troca de senha do usuário
	 *
	 * @access public
	 * @return process
	 */
	public function changeProcessAction()
	{
		if ( !Http::checkReferer('password/change') ):
			return $this->redirect(404);
		endif;

		$verifyToken = Csrf::check('changePasswordData', 'password/change');

		if ( $verifyToken ):
			$passwordChange = $this->model('PasswordChange', 'Password');

			$errors = $passwordChange->getData()['validate'];

			if ( !empty($errors) ):
				$message = $passwordChange->getData()['messages'];
				Flash::danger($message);

				return $this->redirect('password/change');
			else:
				if ( !$passwordChange->checkPassword() ):
					Flash::danger(Config::message('message.password.change.invalid'));

					return $this->redirect('password/change');
				else:
					if ( $passwordChange->changePassword() ):
						Flash::success(Config::message('message.password.change.success'));
						$username = Session::get(Config::get('session.user'))['username'];

						return $this->redirect('user/profile/' . $username);
					else:
						Flash::danger(Config::message('message.system.error'));

						return $this->redirect('password/change');
					endif;
				endif;
			endif;
		endif;
	}

	/**
	 * Formulário para a recuperação de senha do usuário
	 *
	 * @access public
	 * @return type
	 */
	public function recoverAction()
	{
		if ( Auth::user('logged') ):
			return false;
		endif;

		$passwordRecover = $this->model('PasswordRecover', 'Password');

		return $this->view($this->getTemplate(), $passwordRecover->getData());
	}

	/**
	 * Processa a solicitação de recuperação de senha do usuário
	 * Envia um e-mail com as informações necessárias
	 *
	 * @access public
	 * @return void
	 */
	public function recoverProcessAction()
	{
		if ( !Http::checkReferer('password/recover') ):
			return $this->redirect(404);
		endif;

		$verifyToken = Csrf::check('recoverPasswordData', 'password/recover');

		if ( $verifyToken ):
			$passwordRecover = $this->model('PasswordRecover', 'Password');

			$errors = $passwordRecover->getData()['validate'];

			if ( !empty($errors) ):
				$message = $passwordRecover->getData()['messages'];
				Flash::danger($message);

				return $this->redirect('password/recover');
			else:
				if ( !$passwordRecover->checkEmail() ):
					Flash::danger(Config::message('message.password.recover.invalid'));

					return $this->redirect('password/recover');
				else:
					if ( $passwordRecover->sendEmail() ):
						Flash::success(Config::message('message.password.recover.success'));

						return $this->redirect('login');
					else:
						Flash::danger(Config::message('message.system.error'));

						return $this->redirect('password/recover');
					endif;
				endif;
			endif;
		endif;
	}

	/**
	 * Formulário para troca de senha do usuário
	 *
	 * @access public
	 * @param string 	$identifier 	Identificador do código para troca da senha
	 * @return void
	 */
	public function resetAction($identifier = null)
	{
		if ( !is_null($identifier) ):
			if ( Session::get(Config::get('session.user')) ):
				return $this->redirect(404);
			endif;

			$passwordReset = $this->model('PasswordReset', 'Password');

			$getUri = Request::get('uri');
			$getUri = explode('/', $getUri);

			Session::set('passwordUri', $getUri[2]);

			return $this->view($this->getTemplate(), $passwordReset->getData());
		endif;

		return $this->redirect(404);
	}

	/**
	 * Processa a troca de senha do usuário mediante a recuperação de senha
	 *
	 * @access public
	 * @return void
	 */
	public function resetProcessAction()
	{

		if ( !Http::checkReferer('password/reset/' . Session::get('passwordUri')) ):
			return $this->redirect(404);
		endif;

		$verifyToken = Csrf::check('resetPasswordData', 'password/reset/' . Session::get('passwordUri'));

		if ( $verifyToken ):
			$passwordReset = $this->model('PasswordReset', 'Password');

			$errors = $passwordReset->getData()['validate'];

			if ( !empty($errors) ):
				$message = $passwordReset->getData()['messages'];
				Flash::danger($message);

				return $this->redirect('password/reset/' . Session::get('passwordUri'));
			else:
				if ( $passwordReset->change() ):
					Session::delete('passwordUri');
					Flash::success(Config::message('message.password.reset.success'));

					return $this->redirect('login');
				else:
					Flash::danger(Config::message('message.system.error'));

					return $this->redirect('password/reset/' . Session::get('passwordUri'));
				endif;
			endif;
		endif;
	}
}