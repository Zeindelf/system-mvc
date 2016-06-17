<?php
/* Smarty version 3.1.29, created on 2016-06-16 18:58:23
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\email\contact.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576320ff08c111_80689614',
  'file_dependency' => 
  array (
    '4098746ac6baafd3bff195217745d6842c85896b' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\email\\contact.tpl',
      1 => 1465751164,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:email/partials/style-start.tpl' => 1,
    'file:email/partials/style-end.tpl' => 1,
  ),
),false)) {
function content_576320ff08c111_80689614 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:email/partials/style-start.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<h2 style="color: seagreen"><?php echo $_smarty_tpl->tpl_vars['data']->value['subject'];?>
</h2>

	<div><?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>
</div>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:email/partials/style-end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
