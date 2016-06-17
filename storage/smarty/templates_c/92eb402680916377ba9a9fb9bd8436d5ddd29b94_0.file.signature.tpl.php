<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:10:08
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\email\partials\signature.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576307a023fcd0_51746318',
  'file_dependency' => 
  array (
    '92eb402680916377ba9a9fb9bd8436d5ddd29b94' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\email\\partials\\signature.tpl',
      1 => 1465080720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576307a023fcd0_51746318 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<hr>
<p style="font-size: 14px; color: #999;">Enviada por: <b><?php echo @constant('SITE_NAME');?>
</b> em <b><?php echo smarty_modifier_date_format(time(),"%d/%m/%Y");?>
</b> as <b><?php echo smarty_modifier_date_format(time(),"%T");?>
</b></p><?php }
}
