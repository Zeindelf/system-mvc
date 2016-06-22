<?php
/* Smarty version 3.1.29, created on 2016-06-22 14:38:19
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\geral\main-footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576acd0b241f94_96852022',
  'file_dependency' => 
  array (
    'a8d96c826955d919a3844fec7f1672e7443d5fb6' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\geral\\main-footer.tpl',
      1 => 1466616952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576acd0b241f94_96852022 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseJs'] = new Smarty_Variable(Config::get('html.baseJs'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseJs', 0);?>

		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseJs']->value;?>
/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseJs']->value;?>
/functions.js"><?php echo '</script'; ?>
>
	</body>
</html><?php }
}
