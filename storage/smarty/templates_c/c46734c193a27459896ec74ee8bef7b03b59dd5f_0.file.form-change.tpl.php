<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:09:40
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\password\form-change.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5763078464a0d6_26230204',
  'file_dependency' => 
  array (
    'c46734c193a27459896ec74ee8bef7b03b59dd5f' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\password\\form-change.tpl',
      1 => 1465605765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5763078464a0d6_26230204 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['token'] = new Smarty_Variable(Helpers\Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'token', 0);
$_smarty_tpl->tpl_vars['referer'] = new Smarty_Variable(Helpers\Http::referer(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'referer', 0);?>

<form action="<?php echo @constant('BASE_URL');?>
/password/change-process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="current_password">Senha atual</label>
			<input type="password" name="current_password" id="current_password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="new_password">Nova senha</label>
			<input type="password" name="new_password" id="new_password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="confirm_new_password">Repita a nova senha</label>
			<input type="password" name="confirm_new_password" id="confirm_new_password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="<?php echo @constant('CSRF_TOKEN');?>
" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Mudar</button>
			<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['referer']->value;?>
">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form><?php }
}
