<?php
/* Smarty version 3.1.29, created on 2016-06-23 21:44:41
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\user\profile.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576c8279149122_11991236',
  'file_dependency' => 
  array (
    'dc8918e98ae403b235b570bb2aa5b4a83fd6fad6' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\user\\profile.tpl',
      1 => 1466729063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/user/index-header.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_576c8279149122_11991236 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.capitalize.php';
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/user/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="main__content"><div class="container"><?php echo (($tmp = @$_SESSION['flash'])===null||$tmp==='' ? null : $tmp);?>
<div class="user__content"><div class="user__change"><ul class="user__change-info"><li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/user/update/<?php echo $_SESSION['userSession']['username'];?>
">Atualizar dados</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/password/change">Mudar senha</a></li></ul></div><div class="user__info"><h1 class="main__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['indexTitle'];?>
</h1><ul class="user__info-details"><li>Nome de Usuário: <span class="user__info-field"><?php echo smarty_modifier_capitalize($_SESSION['userSession']['username']);?>
</span></li><li>Nome: <span class="user__info-field"><?php echo smarty_modifier_capitalize($_SESSION['userSession']['firstname']);?>
</span></li><li>Sobrenome: <span class="user__info-field"><?php echo smarty_modifier_capitalize($_SESSION['userSession']['lastname']);?>
</span></li><li>E-mail: <span class="user__info-field"><?php echo $_SESSION['userSession']['email'];?>
</span></li></ul></div></div></div></div><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
