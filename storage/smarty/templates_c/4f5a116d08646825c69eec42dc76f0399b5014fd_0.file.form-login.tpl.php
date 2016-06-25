<?php
/* Smarty version 3.1.29, created on 2016-06-24 20:15:12
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\login\form-login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576dbf00389af9_01728935',
  'file_dependency' => 
  array (
    '4f5a116d08646825c69eec42dc76f0399b5014fd' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\login\\form-login.tpl',
      1 => 1466808334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576dbf00389af9_01728935 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->tpl_vars['csrfToken'] = new Smarty_Variable(Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'csrfToken', 0);?> <?php $_smarty_tpl->tpl_vars['username'] = new Smarty_Variable(Session::get('registerData.username'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'username', 0);?> <?php $_smarty_tpl->tpl_vars['userdata'] = new Smarty_Variable(Session::get('loginData.userdata'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'userdata', 0);?><form action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/login/process" method="post"><div class="form__content"><div class="form__field"><label for="userdata">Nome de Usuário ou E-mail</label><input type="text" name="userdata" id="userdata" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['username']->value)===null||$tmp==='' ? null : $tmp);
echo (($tmp = @$_smarty_tpl->tpl_vars['userdata']->value)===null||$tmp==='' ? null : $tmp);?>
"></div><div class="form__field"><label for="password">Senha</label><input type="password" name="password" id="password"></div><div class="form__field"><?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
</div><div class="form__extra"><label for="remember"><input type="checkbox" name="remember" id="remember" checked="chekced"> <span>Lembrar-me</span></label><div class="forgot"><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/password/recover">Esqueci minha senha</a></div></div><div class="form__button"><button class="button" type="submit">Entrar</button> <a class="button" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">Voltar</a></div></div></form><?php }
}
