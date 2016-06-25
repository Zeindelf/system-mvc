<?php
/* Smarty version 3.1.29, created on 2016-06-25 01:42:08
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\user\form-recover.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e0ba02b1b82_75129219',
  'file_dependency' => 
  array (
    '2becf7a1460df93312c9934c7bb435ac189daf5b' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\user\\form-recover.tpl',
      1 => 1466808334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e0ba02b1b82_75129219 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->tpl_vars['csrfToken'] = new Smarty_Variable(Csrf::generate(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'csrfToken', 0);?><form action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/user/recover-process" method="post"><div class="form__content"><div class="form__field"><label for="email">Informe seu e-mail cadastrado</label><input type="text" name="email" id="email"></div><div class="form__field"><?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
</div><div class="form__button"><button class="button" type="submit">Recuperar conta</button></div></div></form><?php }
}
