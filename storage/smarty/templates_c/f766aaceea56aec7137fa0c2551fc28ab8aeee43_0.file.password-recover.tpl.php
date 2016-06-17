<?php
/* Smarty version 3.1.29, created on 2016-06-16 17:10:08
  from "C:\wamp\www\Projects\system-mvc\resources\views\templates\email\password-recover.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576307a018f420_31277195',
  'file_dependency' => 
  array (
    'f766aaceea56aec7137fa0c2551fc28ab8aeee43' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\system-mvc\\resources\\views\\templates\\email\\password-recover.tpl',
      1 => 1465940725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:email/partials/style-start.tpl' => 1,
    'file:email/partials/style-end.tpl' => 1,
  ),
),false)) {
function content_576307a018f420_31277195 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\Projects\\system-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.capitalize.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:email/partials/style-start.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<h2 style="color: seagreen">Olá, <?php if (isset($_smarty_tpl->tpl_vars['data']->value['firstname'])) {
echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['data']->value['firstname']);
} else {
echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['data']->value['username']);
}?>. Recupere sua senha!</h2>

	<p>Este e-mail foi enviado pelo sistema pois foi requisitado uma recuperação de senha.</p>
	<p>Para recuperar sua senha, clique no botão abaixo:</p>

	<p><a
		style="display: inline-block; margin: 10px 0 30px 150px; text-align: center; text-decoration: none; padding: 16px 20px; color: #eee; background: seagreen; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px; border-radius: 4px;"
		href="<?php echo @constant('BASE_URL');?>
/password/reset/<?php echo $_smarty_tpl->tpl_vars['data']->value['emailHash'];
echo $_smarty_tpl->tpl_vars['data']->value['delimiterHash'];
echo $_smarty_tpl->tpl_vars['data']->value['uriHash'];?>
">Recuperar Senha</a>
	</p>

	<p>Ou copie e cole o link abaixo no seu navegador:</p>
	<p style="font-family: sans-serif; background: #f1f1f1; display: inline; padding: 4px;">
		<?php echo @constant('BASE_URL');?>
/password/reset/<?php echo $_smarty_tpl->tpl_vars['data']->value['emailHash'];
echo $_smarty_tpl->tpl_vars['data']->value['delimiterHash'];
echo $_smarty_tpl->tpl_vars['data']->value['uriHash'];?>

	</p>

	<p style="color: seagreen; font-weight: bold;">Este link é válido pelas próximas <?php echo @constant('TOKEN_EXPIRE')/60;?>
 horas.</p>

	<p style="font-size: 15px; color: seagreen; margin-top: 30px;">Caso não tenha solicitado a troca de e-mail, desconsidere esta mensagem.<br>Os dados de acesso são enviados exclusivamente para seu e-mail. Sendo assim, somente você pode visualizar e acessar.</p>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:email/partials/style-end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
