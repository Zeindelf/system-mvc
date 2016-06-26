<?php
/* Smarty version 3.1.29, created on 2016-06-26 14:03:42
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\password\form-recover.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57700aee680d28_18460032',
  'file_dependency' => 
  array (
    'aa6660228e90f914fd59d66619ff6ff429667877' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\password\\form-recover.tpl',
      1 => 1466960204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57700aee680d28_18460032 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->tpl_vars['csrfToken'] = new Smarty_Variable(Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'csrfToken', 0);?> <?php $_smarty_tpl->tpl_vars['referer'] = new Smarty_Variable(Http::referer(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'referer', 0);?><form action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/password/recover-process" method="post"><div class="form__content"><div class="form__field"><label for="email">Informe seu e-mail cadastrado</label><input type="text" name="email" id="email"></div><div class="form__field"><?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
</div><div class="form__button"><button class="button" type="submit">Recuperar senha</button>  <a class="button" href="<?php echo $_smarty_tpl->tpl_vars['referer']->value;?>
">Voltar</a></div></div></form><?php }
}
