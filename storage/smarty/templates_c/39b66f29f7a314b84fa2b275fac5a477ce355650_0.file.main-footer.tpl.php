<?php
/* Smarty version 3.1.29, created on 2016-06-24 00:55:29
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\geral\main-footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576caf314d98e0_55985625',
  'file_dependency' => 
  array (
    '39b66f29f7a314b84fa2b275fac5a477ce355650' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\geral\\main-footer.tpl',
      1 => 1466740527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576caf314d98e0_55985625 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseJs'] = new Smarty_Variable(Config::get('html.baseJs'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseJs', 0);
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseJs']->value;?>
/app.js"><?php echo '</script'; ?>
><?php }
}
