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
 * Controller da página de usuários
 */
class UserController extends MainController
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Página inicial de usuários
	 *
	 * @access public
	 * @return view
	 */
	public function indexAction()
	{
		// @TODO Listar usuários.. talvez
		return $this->redirect(404);
	}

	/**
	 * Página de profile de usuários
	 *
	 * @param string 	$username 	Nome de usuário que define sua página
	 * @return void
	 */
	public function profileAction($username = null)
	{
		if ( Session::exists(Config::get('session.user')) ):
			// Usuário logado, pode alterar seu perfil
			if ( $username === Session::get(Config::get('session.user'))['username'] ):
				$profile = $this->model('UserProfile', 'User');

				return $this->view($this->getTemplate(), $profile->getData());
			endif;
		endif;

		// @TODO Outros usuários poderão ver o perfil (?)
		return $this->redirect(404);
	}

	/**
	 * Processa o envio do e-mail para o usuário desbloquear a conta
	 *
	 * @return boolean
	 */
	public function activateAction()
	{
		if ( Http::checkReferer('register') || Http::checkReferer('login') ):
			$activate = $this->model('UserActivate', 'User');

			if ( $activate->sendEmail() ):
				Flash::success(Config::get('message.user.account.email'));
			else:
				Flash::danger(Config::message('message.system.error'));
			endif;

			return $this->redirect('login');
		endif;

		return $this->redirect(404);
	}

	/**
	 * Ativa a conta do usuário
	 *
	 * @param string 	$identifier 	Identificador da conta inativa
	 * @return void
	 */
	public function activateProcessAction($identifier = null)
	{
		if ( !is_null($identifier) ):
			$activateUser = $this->model('UserActivate', 'User');

			$getUri = Request::get('uri');
			$getUri = explode('/', $getUri);

			if ( $activateUser->getIdentifier($getUri[2]) ):
				Flash::success(Config::message('message.user.account.active'));

				$this->redirect('login');
			endif;
		endif;

		return $this->redirect(404);
	}

	/**
	 * Página de usuário bloqueado
	 *
	 * @return void
	 */
	public function blockAction()
	{
		if ( !Http::checkReferer('login') ):
			return $this->redirect(404);
		endif;

		$userBlock = $this->model('UserBlock', 'User');

		return $this->view($this->getTemplate(), $userBlock->getData());
	}

	/**
	 * Processa o envio de e-mail para o usuário recuperar a conta
	 *
	 * @return void
	 */
	public function unblockAction()
	{
		if ( !Http::checkReferer('user/block') ):
			return $this->redirect(404);
		endif;

		$unblock = $this->model('UserUnblock', 'User');

		if ( $unblock->sendEmail() ):
			Flash::success(Config::message('message.user.unblock.success'));
		else:
			Flash::danger(Config::message('message.system.error'));
		endif;

		return $this->redirect();
	}

	/**
	 * Página para o usuário desbloquear sua conta
	 *
	 * @param string 	$identifier 	Identificador do código para reativar a conta
	 * @return type
	 */
	public function recoverAction($identifier = null)
	{
		if ( !is_null($identifier) ):
			$userRecover = $this->model('UserRecover', 'User');

			$getUri = Request::get('uri');
			$getUri = explode('/', $getUri);
			Session::set('userUri', $getUri[2]);

			if ( !$userRecover->getIdentifier() ):
				return $this->redirect(404);
			endif;

			return $this->view($this->getTemplate(), $userRecover->getData());
		endif;

		return $this->redirect(404);
	}

	/**
	 * Processa o desbloqueio da conta do usuário
	 *
	 * @return type
	 */
	public function recoverProcessAction()
	{
		if ( !Http::checkReferer('user/recover/' . Session::get('userUri')) ):
			return $this->redirect(404);
		endif;

		$verifyToken = Csrf::check('recoverUserData', 'user/recover/' . Session::get('passwordUri'));

		if ( $verifyToken ):
			$userRecover = $this->model('UserRecover', 'User');

			$errors = $userRecover->getData()['validate'];

			if ( !empty($errors) ):
				$message = $userRecover->getData()['messages'];
				Flash::danger($message);

				return $this->redirect('user/recover/' . Session::get('userUri'));
			else:
				if ( $userRecover->getIdentifier() ):
					if ( !$userRecover->checkEmail() ):
						Flash::danger(Config::message('message.user.recover.invalid'));

						return $this->redirect('user/recover/' . Session::get('userUri'));
					else:
						if ( $userRecover->unblockUser() ):
							Session::delete('userUri');
							Flash::success(Config::message('message.user.recover.success'));

							return $this->redirect('login');
						else:
							Flash::danger(Config::message('message.system.error'));

							return $this->redirect('user/recover/' . Session::get('userUri'));
						endif;
					endif;
				endif;
			endif;
		endif;
	}

	/**
	 * Página para o usuário alterar os dados
	 *
	 * @param string 	$username 	Nome de usuário que define sua página
	 * @return void
	 */
	public function updateAction($username = null)
	{
		if ( Session::exists(Config::get('session.user')) ):
			if ( $username === Session::get(Config::get('session.user'))['username'] ):
				$update = $this->model('UserUpdate', 'User');

				return $this->view($this->getTemplate(), $update->getData());
			endif;
		endif;

		return $this->redirect(404);
	}

	/**
	 * Processa a alteração dos dados do usuário
	 *
	 * @return type
	 */
	public function updateProcessAction()
	{
		$username = Session::get(Config::get('session.user'))['username'];

		if ( !Http::checkReferer('user/update/' . $username) ):
			return $this->redirect(404);
		endif;

		$verifyToken = Csrf::check('updateUserData', 'user/update/' . $username);

		if ( $verifyToken ):
			$userUpdate = $this->model('UserUpdate', 'User');

			$errors = $userUpdate->getData()['validate'];

			if ( !empty($errors) ):
				$message = $userUpdate->getData()['messages'];
				Flash::danger($message);

				return $this->redirect('user/update/' . $username);
			else:
				if ( $userUpdate->update() ):
					Flash::success(Config::message('message.user.update.success'));

					return $this->redirect('user/profile/' . $username);
				else:
					Flash::danger(Config::message('message.system.error'));

					return $this->redirect('user/update/' . $username);
				endif;
			endif;
		endif;
	}
}