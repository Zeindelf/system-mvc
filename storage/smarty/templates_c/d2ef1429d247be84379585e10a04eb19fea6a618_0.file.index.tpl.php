<?php
/* Smarty version 3.1.29, created on 2016-06-23 21:44:35
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\index\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576c8273f212b1_23053607',
  'file_dependency' => 
  array (
    'd2ef1429d247be84379585e10a04eb19fea6a618' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\index\\index.tpl',
      1 => 1466729063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/index-header.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_576c8273f212b1_23053607 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="main__content"><div class="container"><h1 class="main__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['indexTitle'];?>
</h1><?php echo (($tmp = @$_SESSION['flash'])===null||$tmp==='' ? null : $tmp);?>
</div></div><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
