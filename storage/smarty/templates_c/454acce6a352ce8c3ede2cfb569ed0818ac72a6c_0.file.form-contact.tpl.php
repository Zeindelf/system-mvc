<?php
/* Smarty version 3.1.29, created on 2016-06-22 16:59:21
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\contact\form-contact.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576aee191e73d5_95112473',
  'file_dependency' => 
  array (
    '454acce6a352ce8c3ede2cfb569ed0818ac72a6c' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\contact\\form-contact.tpl',
      1 => 1466625551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576aee191e73d5_95112473 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?>

<?php $_smarty_tpl->tpl_vars['csrfToken'] = new Smarty_Variable(Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'csrfToken', 0);?>

<?php $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable(Session::get('contactData.name'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'name', 0);
$_smarty_tpl->tpl_vars['email'] = new Smarty_Variable(Session::get('contactData.email'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'email', 0);
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable(Session::get('contactData.subject'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'subject', 0);
$_smarty_tpl->tpl_vars['message'] = new Smarty_Variable(Session::get('contactData.message'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'message', 0);?>

<form action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/contact/process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="name">Nome</label>
			<input type="text" name="name" id="name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['name']->value)===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="email">E-mail</label>
			<input type="text" name="email" id="email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['email']->value)===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="subject">Assunto</label>
			<input type="text" name="subject" id="subject" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['subject']->value)===null||$tmp==='' ? null : $tmp);?>
">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="message">Mensagem</label>
			<textarea name="message" id="message" rows="10"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value)===null||$tmp==='' ? null : $tmp);?>
</textarea>
		</div><!-- /.form__field -->

		<div class="form__field">
			<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>

		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Enviar</button>
			<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form><?php }
}
