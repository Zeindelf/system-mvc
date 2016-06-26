<?php
/* Smarty version 3.1.29, created on 2016-06-26 14:04:44
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\email\success-register.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57700b2ce6e3a0_89348099',
  'file_dependency' => 
  array (
    '9281e126f64c01a4ada8c6028a9191ef8a99e141' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\email\\success-register.tpl',
      1 => 1466960204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:email/partials/style-start.tpl' => 1,
    'file:email/partials/style-end.tpl' => 1,
  ),
),false)) {
function content_57700b2ce6e3a0_89348099 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.capitalize.php';
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:email/partials/style-start.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h2 style="color: seagreen">Olá, <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['data']->value['username']);?>
!</h2><p>Este e-mail foi enviado pelo sistema pois foi realizado um cadastro em nossa base de dados com seu e-mail.</p><p>Sua conta já está ativa e pode ser usada a qualquer momento.</p><p>Clique no botão abaixo para realizar o login.</p><p><a style="display: inline-block; margin: 10px 0 30px 150px; text-align: center; text-decoration: none; padding: 16px 20px; color: #eee; background: seagreen; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px; border-radius: 4px" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/login">Logar agora!</a></p><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:email/partials/style-end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
