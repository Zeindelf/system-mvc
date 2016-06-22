<?php
/* Smarty version 3.1.29, created on 2016-06-22 15:55:44
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\user\index-nav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576adf307b6a78_17032128',
  'file_dependency' => 
  array (
    '7779de3738ed093afddfed0d5c69fb24d2daa5e0' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\user\\index-nav.tpl',
      1 => 1466617499,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576adf307b6a78_17032128 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?>

<nav class="main__nav">
	<div class="user-info">
		<a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">Home</a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/contact">Contato</a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/logout">Sair</a>
	</div><!-- /.user-info -->
</nav><?php }
}
