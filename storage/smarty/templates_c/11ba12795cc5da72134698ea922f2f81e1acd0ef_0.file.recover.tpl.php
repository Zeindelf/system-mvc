<?php
/* Smarty version 3.1.29, created on 2016-06-25 01:42:08
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\user\recover.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e0ba023afc0_97703706',
  'file_dependency' => 
  array (
    '11ba12795cc5da72134698ea922f2f81e1acd0ef' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\user\\recover.tpl',
      1 => 1466808334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/user/index-header.tpl' => 1,
    'file:partials/user/form-recover.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_576e0ba023afc0_97703706 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/user/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="main__content"><div class="container"><h1 class="main__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['indexTitle'];?>
</h1><div class="form__container"><?php echo (($tmp = @$_SESSION['flash'])===null||$tmp==='' ? null : $tmp);?>
 <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/user/form-recover.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div></div></div><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
