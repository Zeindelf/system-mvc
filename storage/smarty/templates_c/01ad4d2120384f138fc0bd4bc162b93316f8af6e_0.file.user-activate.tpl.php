<?php
/* Smarty version 3.1.29, created on 2016-06-26 14:05:39
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\email\user-activate.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57700b63bd2439_38228080',
  'file_dependency' => 
  array (
    '01ad4d2120384f138fc0bd4bc162b93316f8af6e' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\email\\user-activate.tpl',
      1 => 1466960204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:email/partials/style-start.tpl' => 1,
    'file:email/partials/style-end.tpl' => 1,
  ),
),false)) {
function content_57700b63bd2439_38228080 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.capitalize.php';
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:email/partials/style-start.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h2 style="color: seagreen">Olá, <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['data']->value['username']);?>
. Ative sua conta!</h2><p>Para ativar sua conta, clique no botão abaixo:</p><p><a style="display: inline-block; margin: 10px 0 30px 150px; text-align: center; text-decoration: none; padding: 16px 20px; color: #eee; background: seagreen; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px; border-radius: 4px" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/user/activate-process/<?php echo $_smarty_tpl->tpl_vars['data']->value['emailHash'];
echo $_smarty_tpl->tpl_vars['data']->value['delimiterHash'];
echo $_smarty_tpl->tpl_vars['data']->value['uriHash'];?>
">Ativar Conta</a></p><p>Ou copie e cole o link abaixo no seu navegador:</p><p style="font-family: sans-serif; background: #f1f1f1; display: inline; padding: 4px"><?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/user/activate-process/<?php echo $_smarty_tpl->tpl_vars['data']->value['emailHash'];
echo $_smarty_tpl->tpl_vars['data']->value['delimiterHash'];
echo $_smarty_tpl->tpl_vars['data']->value['uriHash'];?>
</p><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:email/partials/style-end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
