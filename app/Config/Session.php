<?php

use Core\Config;

/**
 * Configurações das Sessões
 */
Config::set('session', [
	'token'    => CSRF_TOKEN,
	'user'     => USER_SESSION,
	'remember' => USER_REMEMBER,

	//------------------------------------------------------------
	// Sessões temporárias
	//------------------------------------------------------------
	'delete' => [
		// Sessão de Flash Message
		'flash',

		// Sessão de contato via site
		'contactData',

		// Sessão de registro de usuário
		'registerData',

		// Sessão de login de usuário
		'loginData',

		// Sessão de troca de senha do usuário
		'changePasswordData',

		// Sessão de recuperação de senha do usuário
		'recoverPasswordData',

		// Sessão de redefinição de senha do usuário
		'resetPasswordData',

		// Sessão de recuperação da conta do usuário
		'recoverUserData',

		// Sessão de atualização dos dados do usuário
		'updateUserData',

		// Sessão de bloqueio de usuário
		'blockUserData',
	],
]);