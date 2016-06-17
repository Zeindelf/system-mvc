<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:09:15
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\user\index-nav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5763076b5c9413_85785581',
  'file_dependency' => 
  array (
    '7779de3738ed093afddfed0d5c69fb24d2daa5e0' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\user\\index-nav.tpl',
      1 => 1465752691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5763076b5c9413_85785581 ($_smarty_tpl) {
?>
<nav class="main__nav">
	<div class="user-info">
		<a href="<?php echo @constant('BASE_URL');?>
">Home</a>
		<a href="<?php echo @constant('BASE_URL');?>
/contact">Contato</a>
		<a href="<?php echo @constant('BASE_URL');?>
/logout">Sair</a>
	</div><!-- /.user-info -->
</nav><?php }
}
