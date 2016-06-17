<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:09:21
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\contact\form-contact.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57630771ee4b25_14198950',
  'file_dependency' => 
  array (
    '454acce6a352ce8c3ede2cfb569ed0818ac72a6c' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\contact\\form-contact.tpl',
      1 => 1465747314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57630771ee4b25_14198950 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['token'] = new Smarty_Variable(Helpers\Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'token', 0);?>

<form action="<?php echo @constant('BASE_URL');?>
/contact/process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="name">Nome</label>
			<input type="text" name="name" id="name" value="<?php echo (($tmp = @$_SESSION['contactData']['name'])===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="email">E-mail</label>
			<input type="text" name="email" id="email" value="<?php echo (($tmp = @$_SESSION['contactData']['email'])===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="subject">Assunto</label>
			<input type="text" name="subject" id="subject" value="<?php echo (($tmp = @$_SESSION['contactData']['subject'])===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="message">Mensagem</label>
			<textarea name="message" id="message" rows="10"><?php echo (($tmp = @$_SESSION['contactData']['message'])===null||$tmp==='' ? null : $tmp);?>
</textarea>
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="<?php echo @constant('CSRF_TOKEN');?>
" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Enviar</button>
			<a class="button" href="<?php echo @constant('BASE_URL');?>
">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form><?php }
}
