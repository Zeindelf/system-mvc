<?php
/* Smarty version 3.1.29, created on 2016-06-23 22:01:14
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\geral\main-footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576c865a7b5e18_15542897',
  'file_dependency' => 
  array (
    '39b66f29f7a314b84fa2b275fac5a477ce355650' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\geral\\main-footer.tpl',
      1 => 1466730067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576c865a7b5e18_15542897 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseJs'] = new Smarty_Variable(Config::get('html.baseJs'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseJs', 0);
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseJs']->value;?>
/app.js"><?php echo '</script'; ?>
><?php }
}
