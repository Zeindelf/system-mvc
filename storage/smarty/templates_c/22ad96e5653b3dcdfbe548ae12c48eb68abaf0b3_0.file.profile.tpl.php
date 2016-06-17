<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:09:15
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\user\profile.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5763076b56aa47_06320253',
  'file_dependency' => 
  array (
    '22ad96e5653b3dcdfbe548ae12c48eb68abaf0b3' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\user\\profile.tpl',
      1 => 1465524467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/user/index-header.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_5763076b56aa47_06320253 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.capitalize.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/user/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div class="main__content">
		<div class="container">

			<?php echo (($tmp = @$_SESSION['flash'])===null||$tmp==='' ? null : $tmp);?>


			<div class="user__content">
				<div class="user__change">
					<ul class="user__change-info">
						<li><a href="<?php echo @constant('BASE_URL');?>
/user/update/<?php echo $_SESSION['userSession']['username'];?>
">Atualizar dados</a></li>
						<li><a href="<?php echo @constant('BASE_URL');?>
/password/change">Mudar senha</a></li>
					</ul>
				</div><!-- /.user__change -->

				<div class="user__info">
					<h1 class="main__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['indexTitle'];?>
</h1>

					<ul class="user__info-details">
						<li>Nome de Usuário: <span class="user__info-field"><?php echo smarty_modifier_capitalize($_SESSION['userSession']['username']);?>
</span></li>
						<li>Nome: <span class="user__info-field"><?php echo smarty_modifier_capitalize($_SESSION['userSession']['firstname']);?>
</span></li>
						<li>Sobrenome: <span class="user__info-field"><?php echo smarty_modifier_capitalize($_SESSION['userSession']['lastname']);?>
</span></li>
						<li>E-mail: <span class="user__info-field"><?php echo $_SESSION['userSession']['email'];?>
</span></li>
					</ul>
				</div><!-- /.user__info -->
			</div><!-- /.user__container -->

		</div><!-- /.container -->
	</div><!-- /.main__content -->

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
