<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:10:33
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\password\form-reset.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576307b9e70de1_37914222',
  'file_dependency' => 
  array (
    '6ccf67e678c7c02f88907d23ca364c72ccdf8b45' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\password\\form-reset.tpl',
      1 => 1466102193,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576307b9e70de1_37914222 ($_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['identifier']->value) {?>
	<?php $_smarty_tpl->tpl_vars['token'] = new Smarty_Variable(Helpers\Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'token', 0);?>
	<?php $_smarty_tpl->tpl_vars['referer'] = new Smarty_Variable(Helpers\Http::referer(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'referer', 0);?>

	<form action="<?php echo @constant('BASE_URL');?>
/password/reset-process" method="post">
		<div class="form__content">

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
	</form>
<?php } else { ?>
	<div class="alert alert-info">
		<p>Desculpe, mas não foi possível acessar qualquer cadastro com o código de recuperação informado. Talvez ele já tenha sido usado ou expirado.</p>

		<p>Caso deseje, você pode solicitar outro código <a href="<?php echo @constant('BASE_URL');?>
/password/recover"><b>Clicando Aqui!</b></a></p>
	</div>
<?php }
}
}
