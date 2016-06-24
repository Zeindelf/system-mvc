<?php
/* Smarty version 3.1.29, created on 2016-06-23 22:53:50
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\email\partials\signature.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576c92aec7c916_86980794',
  'file_dependency' => 
  array (
    'caf86465bda6504eb5dc51bfaf7061edd72ba405' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\email\\partials\\signature.tpl',
      1 => 1466730067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576c92aec7c916_86980794 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?><hr><p style="font-size: 14px; color: #999">Enviada por: <b><?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
</b> em <b><?php echo smarty_modifier_date_format(time(),"%d/%m/%Y");?>
</b> as <b><?php echo smarty_modifier_date_format(time(),"%T");?>
</b></p><?php }
}
