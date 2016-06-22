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
		// Sessão de bloqueio de usuário
		'blockUserData',

		// Sessão de troca de senha do usuário
		'changePasswordData',

		// Sessão de contato via site
		'contactData',

		// Sessão de Flash Message
		'flash',

		// Sessão de login de usuário
		'loginData',

		// Sessão de recuperação de senha do usuário
		'recoverPasswordData',

		// Sessão de recuperação da conta do usuário
		'recoverUserData',

		// Sessão de registro de usuário
		'registerData',

		// Sessão de redefinição de senha do usuário
		'resetPasswordData',

		// Sessão de atualização dos dados do usuário
		'updateUserData',
	],
]);