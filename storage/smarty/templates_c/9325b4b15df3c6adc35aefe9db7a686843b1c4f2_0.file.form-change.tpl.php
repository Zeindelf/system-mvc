<?php
/* Smarty version 3.1.29, created on 2016-06-23 21:44:45
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\password\form-change.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576c827d310832_75765876',
  'file_dependency' => 
  array (
    '9325b4b15df3c6adc35aefe9db7a686843b1c4f2' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\password\\form-change.tpl',
      1 => 1466729063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576c827d310832_75765876 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->tpl_vars['csrfToken'] = new Smarty_Variable(Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'csrfToken', 0);?> <?php $_smarty_tpl->tpl_vars['referer'] = new Smarty_Variable(Http::referer(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'referer', 0);?><form action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/password/change-process" method="post"><div class="form__content"><div class="form__field"><label for="current_password">Senha atual</label><input type="password" name="current_password" id="current_password"></div><div class="form__field"><label for="new_password">Nova senha</label><input type="password" name="new_password" id="new_password"></div><div class="form__field"><label for="confirm_new_password">Repita a nova senha</label><input type="password" name="confirm_new_password" id="confirm_new_password"></div><div class="form__field"><?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
</div><div class="form__button"><button class="button" type="submit">Mudar</button> <a class="button" href="<?php echo $_smarty_tpl->tpl_vars['referer']->value;?>
">Voltar</a></div></div></form><?php }
}
