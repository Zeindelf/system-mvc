<?php
/* Smarty version 3.1.29, created on 2016-06-23 21:52:04
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\email\contact.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576c843485a5d6_46562938',
  'file_dependency' => 
  array (
    '352b87f6b7b151b12cc10ce7906a34460aacd481' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\email\\contact.tpl',
      1 => 1466729063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:email/partials/style-start.tpl' => 1,
    'file:email/partials/style-end.tpl' => 1,
  ),
),false)) {
function content_576c843485a5d6_46562938 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:email/partials/style-start.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h2 style="color: seagreen"><?php echo $_smarty_tpl->tpl_vars['data']->value['subject'];?>
</h2><div><?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>
</div><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:email/partials/style-end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
