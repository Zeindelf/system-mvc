<?php
/* Smarty version 3.1.29, created on 2016-06-24 19:32:58
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\index-footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576db51aa6ec32_53087141',
  'file_dependency' => 
  array (
    '9ed1e3912a82afb97456df27b844bb388a9f980e' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\index-footer.tpl',
      1 => 1466807550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576db51aa6ec32_53087141 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars['siteName'] = new Smarty_Variable(Config::get('html.siteName'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'siteName', 0);?><div class="main__footer"><div class="container"><p><?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
 Footer &copy; <?php echo smarty_modifier_date_format(time(),"%Y");?>
</p></div></div><?php }
}
