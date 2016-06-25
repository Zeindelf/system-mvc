<?php
/* Smarty version 3.1.29, created on 2016-06-24 20:14:49
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\register\form-register.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576dbee9258488_78319792',
  'file_dependency' => 
  array (
    '260da3318d672401b24e7432d70b7f44d038a30a' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\register\\form-register.tpl',
      1 => 1466808334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576dbee9258488_78319792 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->tpl_vars['csrfToken'] = new Smarty_Variable(Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'csrfToken', 0);?> <?php $_smarty_tpl->tpl_vars['username'] = new Smarty_Variable(Session::get('registerData.username'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'username', 0);?> <?php $_smarty_tpl->tpl_vars['email'] = new Smarty_Variable(Session::get('registerData.email'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'email', 0);?><form action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/register/process" method="post"><div class="form__content"><div class="form__field"><label for="username">Usuário</label><input type="text" name="username" id="username" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['username']->value)===null||$tmp==='' ? null : $tmp);?>
"></div><div class="form__field"><label for="email">E-mail</label><input type="text" name="email" id="email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['email']->value)===null||$tmp==='' ? null : $tmp);?>
"></div><div class="form__field"><label for="password">Senha</label><input type="password" name="password" id="password"></div><div class="form__field"><label for="confirm_password">Repita sua senha</label><input type="password" name="confirm_password" id="confirm_password"></div><div class="form__field"><?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
</div><div class="form__button"><button class="button" type="submit">Cadastrar</button> <a class="button" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">Voltar</a></div></div></form><?php }
}
