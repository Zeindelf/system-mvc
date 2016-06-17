<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:09:04
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\partials\index-nav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576307605a9281_03436369',
  'file_dependency' => 
  array (
    'fd8b82e0d57fadb54a370d34ebee6a1ee4b3e70b' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\partials\\index-nav.tpl',
      1 => 1465752764,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576307605a9281_03436369 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.capitalize.php';
?>
<nav class="main__nav">
	<?php if (!isset($_SESSION['userSession'])) {?>
		<ul>
			<li><a class="main__nav--button" href="<?php echo @constant('BASE_URL');?>
">Home</a></li>
			<li><a class="main__nav--button" href="<?php echo @constant('BASE_URL');?>
/contact">Contato</a></li>
			<li><a class="main__nav--button" href="<?php echo @constant('BASE_URL');?>
/login">Logar</a></li>
			<li><a class="main__nav--button" href="<?php echo @constant('BASE_URL');?>
/register">Cadastrar</a></li>
		</ul>
	<?php } else { ?>
		<div class="user-info">
			<p class="user-info__username">Olá, <?php echo smarty_modifier_capitalize($_SESSION['userSession']['username']);?>
</p>
			<a href="<?php echo @constant('BASE_URL');?>
/user/profile/<?php echo $_SESSION['userSession']['username'];?>
">Meu profile</a>
			<a href="<?php echo @constant('BASE_URL');?>
/contact">Contato</a>
			<a href="<?php echo @constant('BASE_URL');?>
/logout">Sair</a>
		</div><!-- /.user-info -->
	<?php }?>
</nav><?php }
}
