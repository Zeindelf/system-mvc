<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:09:53
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\password\form-recover.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576307911c2207_83184028',
  'file_dependency' => 
  array (
    '1d49bdd7eb953f7206d9372cba4277f6678ad65d' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\password\\form-recover.tpl',
      1 => 1465605526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576307911c2207_83184028 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['token'] = new Smarty_Variable(Helpers\Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'token', 0);
$_smarty_tpl->tpl_vars['referer'] = new Smarty_Variable(Helpers\Http::referer(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'referer', 0);?>

<form action="<?php echo @constant('BASE_URL');?>
/password/recover-process" method="post">
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
			<button class="button" type="submit">Recuperar senha</button>
			
			<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['referer']->value;?>
">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form><?php }
}
