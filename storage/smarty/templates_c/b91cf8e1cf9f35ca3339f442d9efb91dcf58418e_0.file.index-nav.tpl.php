<?php
/* Smarty version 3.1.29, created on 2016-06-24 19:40:33
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\index-nav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576db6e164a475_21645873',
  'file_dependency' => 
  array (
    'b91cf8e1cf9f35ca3339f442d9efb91dcf58418e' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\index-nav.tpl',
      1 => 1466807656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576db6e164a475_21645873 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.capitalize.php';
?>
<nav class="main__nav"><?php if (!isset($_SESSION['userSession'])) {?><ul><li><a class="main__nav--button" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">Home</a></li><li><a class="main__nav--button" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/contact">Contato</a></li><li><a class="main__nav--button" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/login">Logar</a></li><li><a class="main__nav--button" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/register">Cadastrar</a></li></ul><?php } else { ?><div class="user-info"><p class="user-info__username">Olá, <?php echo smarty_modifier_capitalize($_SESSION['userSession']['username']);?>
</p><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/user/profile/<?php echo $_SESSION['userSession']['username'];?>
">Meu profile</a> <a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/contact">Contato</a> <a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/logout">Sair</a></div><?php }?></nav><?php }
}
