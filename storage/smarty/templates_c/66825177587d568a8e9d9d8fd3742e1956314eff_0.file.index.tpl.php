<?php
/* Smarty version 3.1.29, created on 2016-06-23 21:44:49
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\contact\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576c828108a4f9_96915694',
  'file_dependency' => 
  array (
    '66825177587d568a8e9d9d8fd3742e1956314eff' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\contact\\index.tpl',
      1 => 1466729063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/index-header.tpl' => 1,
    'file:partials/contact/form-contact.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_576c828108a4f9_96915694 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="main__content"><div class="container"><h1 class="main__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['indexTitle'];?>
</h1><div class="form__container"><?php echo (($tmp = @$_SESSION['flash'])===null||$tmp==='' ? null : $tmp);?>
 <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/contact/form-contact.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div></div></div><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
