<?php
/* Smarty version 3.1.29, created on 2016-06-16 18:45:36
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\user\form-update.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57631e00329675_63577043',
  'file_dependency' => 
  array (
    '7fcb65158db9f0920d6f8fe8f6efe5055900c927' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\user\\form-update.tpl',
      1 => 1466113534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57631e00329675_63577043 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.capitalize.php';
$_smarty_tpl->tpl_vars['token'] = new Smarty_Variable(Helpers\Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'token', 0);
$_smarty_tpl->tpl_vars['referer'] = new Smarty_Variable(Helpers\Http::referer(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'referer', 0);?>

<form action="<?php echo @constant('BASE_URL');?>
/user/update-process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="email">Informe seu e-mail</label>
			<input type="text" name="email" id="email" value="<?php echo $_SESSION['userSession']['email'];?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="firstname">Informe seu nome</label>
			<input type="text" name="firstname" id="firstname" value="<?php echo (($tmp = @smarty_modifier_capitalize($_SESSION['userSession']['firstname']))===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="lastname">Informe seu sobrenome</label>
			<input type="text" name="lastname" id="lastname" value="<?php echo (($tmp = @smarty_modifier_capitalize($_SESSION['userSession']['lastname']))===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="<?php echo @constant('CSRF_TOKEN');?>
" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Atualizar dados</button>
			<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['referer']->value;?>
">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form><?php }
}