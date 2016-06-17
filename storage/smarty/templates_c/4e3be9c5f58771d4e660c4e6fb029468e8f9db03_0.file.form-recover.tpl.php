<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:11:27
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\user\form-recover.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576307ef6880d6_34481038',
  'file_dependency' => 
  array (
    '4e3be9c5f58771d4e660c4e6fb029468e8f9db03' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\user\\form-recover.tpl',
      1 => 1465284585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576307ef6880d6_34481038 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['token'] = new Smarty_Variable(Helpers\Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'token', 0);?>

<form action="<?php echo @constant('BASE_URL');?>
/user/recover-process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="email">Informe seu e-mail cadastrado</label>
			<input type="text" name="email" id="email">
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="<?php echo @constant('CSRF_TOKEN');?>
" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Recuperar conta</button>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form><?php }
}
