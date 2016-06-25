<?php
/* Smarty version 3.1.29, created on 2016-06-25 17:13:30
  from "C:\wamp\www\Projects\system-mvc\storage\smarty\templates\partials\geral\main-header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576ee5ea9b6512_44655295',
  'file_dependency' => 
  array (
    'c6ca49324e0f44518ee455ffddbd792bd01249ec' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\storage\\smarty\\templates\\partials\\geral\\main-header.tpl',
      1 => 1466884503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576ee5ea9b6512_44655295 ($_smarty_tpl) {
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1"><?php $_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?> <?php $_smarty_tpl->tpl_vars['baseCss'] = new Smarty_Variable(Config::get('html.baseCss'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseCss', 0);?> <?php $_smarty_tpl->tpl_vars['siteName'] = new Smarty_Variable(Config::get('html.siteName'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'siteName', 0);?> <?php $_smarty_tpl->tpl_vars['siteDesc'] = new Smarty_Variable(Config::get('html.siteDesc'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'siteDesc', 0);?><link rel="shortcut icon" href=""><link rel="base" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
"><?php if (isset($_smarty_tpl->tpl_vars['variables']->value['headerTitle'])) {?><title><?php echo $_smarty_tpl->tpl_vars['variables']->value['headerTitle'];?>
 | <?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
</title><?php } else { ?><title><?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
</title><?php }?><meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['siteDesc']->value;?>
"><meta name="robots" content="index, follow"><link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet" type="text/css"><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseCss']->value;?>
/app.css"></head><body><?php }
}
