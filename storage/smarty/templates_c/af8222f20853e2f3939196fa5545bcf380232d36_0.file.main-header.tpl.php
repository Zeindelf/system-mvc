<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:09:04
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\geral\main-header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5763076046a543_87879158',
  'file_dependency' => 
  array (
    'af8222f20853e2f3939196fa5545bcf380232d36' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\geral\\main-header.tpl',
      1 => 1465243334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5763076046a543_87879158 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href=""/>
        <link rel="base" href="<?php echo @constant('BASE_URL');?>
"/>

		<?php if (isset($_smarty_tpl->tpl_vars['variables']->value['headerTitle'])) {?>
			<title><?php echo $_smarty_tpl->tpl_vars['variables']->value['headerTitle'];?>
 | <?php echo @constant('SITE_NAME');?>
</title>
		<?php } else { ?>
			<title><?php echo @constant('SITE_NAME');?>
</title>
		<?php }?>

		<meta name="description" content="<?php echo @constant('SITE_DESC');?>
">
		<meta name="robots" content="index, follow"/>

		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo @constant('BASE_CSS');?>
/style.css">
	</head>

	<body><?php }
}
