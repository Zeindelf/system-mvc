<?php
/* Smarty version 3.1.29, created on 2016-06-16 18:40:26
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\register\form-register.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57631ccaca8f29_80435915',
  'file_dependency' => 
  array (
    '2bcfde676512b4d5c9fd16a90eedd1baea5e2978' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\register\\form-register.tpl',
      1 => 1464926005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57631ccaca8f29_80435915 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['token'] = new Smarty_Variable(Helpers\Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'token', 0);?>

<form action="<?php echo @constant('BASE_URL');?>
/register/process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="username">Usuário</label>
			<input type="text" name="username" id="username" value="<?php echo (($tmp = @$_SESSION['registerData']['username'])===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="email">E-mail</label>
			<input type="text" name="email" id="email" value="<?php echo (($tmp = @$_SESSION['registerData']['email'])===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="password">Senha</label>
			<input type="password" name="password" id="password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="confirm_password">Repita sua senha</label>
			<input type="password" name="confirm_password" id="confirm_password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="<?php echo @constant('CSRF_TOKEN');?>
" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Cadastrar</button>
			<a class="button" href="<?php echo @constant('BASE_URL');?>
">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form><?php }
}
