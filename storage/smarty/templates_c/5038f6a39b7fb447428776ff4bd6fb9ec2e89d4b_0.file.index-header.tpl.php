<?php
/* Smarty version 3.1.29, created on 2016-06-24 20:14:49
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\index-header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576dbee9141c91_31119698',
  'file_dependency' => 
  array (
    '5038f6a39b7fb447428776ff4bd6fb9ec2e89d4b' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\index-header.tpl',
      1 => 1466808333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/index-nav.tpl' => 1,
  ),
),false)) {
function content_576dbee9141c91_31119698 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->tpl_vars['siteName'] = new Smarty_Variable(Config::get('html.siteName'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'siteName', 0);?><div class="main__header"><header class="container header__container"><div class="header__title"><a title="<?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
"><h1><?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
</h1></a></div><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</header></div><?php }
}
