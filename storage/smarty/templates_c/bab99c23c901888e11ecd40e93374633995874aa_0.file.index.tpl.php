<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:09:50
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\login\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5763078ec1b208_16457293',
  'file_dependency' => 
  array (
    'bab99c23c901888e11ecd40e93374633995874aa' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\login\\index.tpl',
      1 => 1464822331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/index-header.tpl' => 1,
    'file:partials/login/form-login.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_5763078ec1b208_16457293 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div class="main__content">
		<div class="container">

			<h1 class="main__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['indexTitle'];?>
</h1>

			<div class="form__container">

				<?php echo (($tmp = @$_SESSION['flash'])===null||$tmp==='' ? null : $tmp);?>


				<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/login/form-login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


			</div><!-- /.form__container -->

		</div><!-- /.container -->
	</div><!-- /.main__content -->

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
