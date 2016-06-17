<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:09:15
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\user\index-header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5763076b5939d4_87791487',
  'file_dependency' => 
  array (
    '508d6b97c33d7f3444c939f4a9e1e026fb2f1583' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\user\\index-header.tpl',
      1 => 1464822327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/user/index-nav.tpl' => 1,
  ),
),false)) {
function content_5763076b5939d4_87791487 ($_smarty_tpl) {
?>
<div class="main__header">
	<header class="container header__container">
		<div class="header__title">
			<h1>Profile de usuário</h1>
		</div><!-- /.header__title -->

		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/user/index-nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	</header>
</div><!-- /.main__header --><?php }
}
