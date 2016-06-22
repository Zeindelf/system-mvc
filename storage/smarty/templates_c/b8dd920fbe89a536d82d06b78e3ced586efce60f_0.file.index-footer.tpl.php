<?php
/* Smarty version 3.1.29, created on 2016-06-22 14:44:21
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\index-footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576ace75b9b9f9_37778363',
  'file_dependency' => 
  array (
    'b8dd920fbe89a536d82d06b78e3ced586efce60f' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\index-footer.tpl',
      1 => 1466617459,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576ace75b9b9f9_37778363 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars['siteName'] = new Smarty_Variable(Config::get('html.siteName'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'siteName', 0);?>

<div class="main__footer">
	<div class="container">

		<p><?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
 Footer &copy <?php echo smarty_modifier_date_format(time(),"%Y");?>
</p>

	</div><!-- /.container -->
</div><!-- /.main__footer --><?php }
}
