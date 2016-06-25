<?php
/* Smarty version 3.1.29, created on 2016-06-25 15:57:55
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\error404\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576ed433704a91_82386817',
  'file_dependency' => 
  array (
    '104a976c28e7bc03273955b5c98e91446b6cc087' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\error404\\index.tpl',
      1 => 1466880834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/index-header.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_576ed433704a91_82386817 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="main__content"><div class="container"><article class="not-found"><h1 class="not-found__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['errorTitle'];?>
</h1><div class="not-found__content"><h2><?php echo $_smarty_tpl->tpl_vars['variables']->value['errorDesc'];?>
</h2><p>O link que você tentou acessar pode estar quebrado ou a página pode ter sido removida.</p><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">Voltar para a página principal</a></div></article></div></div><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
