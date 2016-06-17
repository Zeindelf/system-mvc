<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:11:07
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\error404\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576307db24d322_49631190',
  'file_dependency' => 
  array (
    '790b268c200d0e0648b1906dc17cc2d1406b1ff3' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\error404\\index.tpl',
      1 => 1464822333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/index-header.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_576307db24d322_49631190 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div class="main__content">
		<div class="container">

			<article class="not-found">
				<h1 class="not-found__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['errorTitle'];?>
</h1>

				<div class="not-found__content">
					<h2><?php echo $_smarty_tpl->tpl_vars['variables']->value['errorDesc'];?>
</h2>
					<p>O link que você tentou acessar pode estar quebrado ou a página pode ter sido removida.</p>
					<a href="<?php echo @constant('BASE_URL');?>
">Voltar para a página principal</a>
				</div>
			</article>

		</div><!-- /.container -->
	</div><!-- /.main__content -->

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
