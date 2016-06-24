<?php
/* Smarty version 3.1.29, created on 2016-06-23 22:54:05
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\password\form-reset.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576c92bd3c31b7_87634149',
  'file_dependency' => 
  array (
    '97189ca9109169a52737914d525ac467ffa34c6c' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\password\\form-reset.tpl',
      1 => 1466730067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576c92bd3c31b7_87634149 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php if ($_smarty_tpl->tpl_vars['identifier']->value) {?> <?php $_smarty_tpl->tpl_vars['csrfToken'] = new Smarty_Variable(Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'csrfToken', 0);?> <?php $_smarty_tpl->tpl_vars['referer'] = new Smarty_Variable(Http::referer(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'referer', 0);?><form action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/password/reset-process" method="post"><div class="form__content"><div class="form__field"><label for="new_password">Nova senha</label><input type="password" name="new_password" id="new_password"></div><div class="form__field"><label for="confirm_new_password">Repita a nova senha</label><input type="password" name="confirm_new_password" id="confirm_new_password"></div><div class="form__field"><?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
</div><div class="form__button"><button class="button" type="submit">Mudar</button> <a class="button" href="<?php echo $_smarty_tpl->tpl_vars['referer']->value;?>
">Voltar</a></div></div></form><?php } else { ?><div class="alert alert-info"><p>Desculpe, mas não foi possível acessar qualquer cadastro com o código de recuperação informado. Talvez ele já tenha sido usado ou expirado.</p><p>Caso deseje, você pode solicitar outro código <a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/password/recover"><b>Clicando Aqui!</b></a></p></div><?php }
}
}
