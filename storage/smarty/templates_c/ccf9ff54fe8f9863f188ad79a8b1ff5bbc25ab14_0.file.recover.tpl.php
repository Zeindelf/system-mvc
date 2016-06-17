<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:11:27
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\user\recover.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576307ef6051e9_58169569',
  'file_dependency' => 
  array (
    'ccf9ff54fe8f9863f188ad79a8b1ff5bbc25ab14' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\user\\recover.tpl',
      1 => 1465284465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/user/index-header.tpl' => 1,
    'file:partials/user/form-recover.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_576307ef6051e9_58169569 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/user/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div class="main__content">
		<div class="container">

			<h1 class="main__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['indexTitle'];?>
</h1>

			<div class="form__container">

				<?php echo (($tmp = @$_SESSION['flash'])===null||$tmp==='' ? null : $tmp);?>


				<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/user/form-recover.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


			</div><!-- /.form__container -->

		</div><!-- /.container -->
	</div><!-- /.main__content -->

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
