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
 * Carrega as funções
 */
require_once SRC_DIR . DS . 'functions.php';

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
 */
Session::tmp();