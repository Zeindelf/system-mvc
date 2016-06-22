<?php

use App\Models\LoginModel;

use Core\App;
use Core\Aliases;

use Helpers\Load;
use Helpers\Session;

/**
 * Inicia o buffering
 */
ob_start();

/**
 * Carrega as configurações gerais
 */
require_once APP_DIR . DS . 'Config.php';

/**
 * Seta a Timezone padrão
 */
date_default_timezone_set(DEFAULT_TIMEZONE);

/**
 * Carrega as configurações da classe Config
 */
$load = new Load;

/**
 * Aliases de classes helpers para a view
 */
Aliases::init();

/**
 * Inicia as sessões
 */
Session::init();

/**
 * Realiza a verificação do login lembrado do usuário
 */
$remember = new LoginModel;
$remember->checkRememberMe();

/**
 * Inicia a aplicação
 */
$app = new App;

/**
 * Sessões temporárias
 *
 * Deleta a sessão de Flash Message
 * Deleta a sessão de contato via site
 * Deleta a sessão de registro de usuário
 * Deleta a sessão de login de usuário
 * Deleta a sessão de troca de senha do usuário
 * Deleta a sessão de recuperação de senha do usuário
 * Deleta a sessão de redefinição de senha do usuário
 * Deleta a sessão de recuperação da conta do usuário
 * Deleta a sessão de atualização dos dados do usuário
 */
Session::delete('flash');
Session::delete('contactData');
Session::delete('registerData');
Session::delete('loginData');
Session::delete('changePasswordData');
Session::delete('recoverPasswordData');
Session::delete('resetPasswordData');
Session::delete('recoverUserData');
Session::delete('updateUserData');