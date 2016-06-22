<?php
/* Smarty version 3.1.29, created on 2016-06-22 15:26:32
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\login\form-login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576ad858afcb86_98779990',
  'file_dependency' => 
  array (
    'b45bde3784d864babba6a23f4ce71ccd94bbd579' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\login\\form-login.tpl',
      1 => 1466619460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576ad858afcb86_98779990 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);
$_smarty_tpl->tpl_vars['token'] = new Smarty_Variable(Helpers\Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'token', 0);?>

<form action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/login/process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="userdata">Nome de Usuário ou E-mail</label>
			<input type="text" name="userdata" id="userdata"
				value="<?php echo (($tmp = @$_SESSION['registerData']['username'])===null||$tmp==='' ? null : $tmp);
echo (($tmp = @$_SESSION['loginData']['userdata'])===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="password">Senha</label>
			<input type="password" name="password" id="password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="<?php echo @constant('CSRF_TOKEN');?>
" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
		</div><!-- /.form__field -->

		<div class="form__extra">
			<label for="remember">
				<input type="checkbox" name="remember" id="remember" checked="chekced">
				<span>Lembrar-me</span>
			</label>

			<div class="forgot">
				<a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/password/recover">Esqueci minha senha</a>
			</div><!-- /.forgot -->
		</div><!-- /.form__extra -->

		<div class="form__button">
			<button class="button" type="submit">Entrar</button>
			<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form><?php }
}
