<?php
/* Smarty version 3.1.29, created on 2016-06-24 15:00:58
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\user\index-nav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576d755af04952_42587692',
  'file_dependency' => 
  array (
    '3d1b244c4479d4eb2a3ca91d20332d250d6d3ca1' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\user\\index-nav.tpl',
      1 => 1466740527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576d755af04952_42587692 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?><nav class="main__nav"><div class="user-info"><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">Home</a> <a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/contact">Contato</a> <a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/logout">Sair</a></div></nav><?php }
}
