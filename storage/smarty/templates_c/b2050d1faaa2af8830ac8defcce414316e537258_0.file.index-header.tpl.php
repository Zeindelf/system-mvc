<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:09:04
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\index-header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57630760511a73_97553200',
  'file_dependency' => 
  array (
    'b2050d1faaa2af8830ac8defcce414316e537258' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\index-header.tpl',
      1 => 1464822329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/index-nav.tpl' => 1,
  ),
),false)) {
function content_57630760511a73_97553200 ($_smarty_tpl) {
?>
<div class="main__header">
	<header class="container header__container">
		<div class="header__title">
			<a title="<?php echo @constant('SITE_NAME');?>
" href="<?php echo @constant('BASE_URL');?>
">
				<h1><?php echo @constant('SITE_NAME');?>
</h1>
			</a>
		</div><!-- /.header__title -->

		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	</header>
</div><!-- /.main__header --><?php }
}
