{assign var=baseUrl value=Config::get('html.baseUrl')}

{include file="email/partials/style-start.tpl"}

	<h2 style="color: seagreen">Olá, {if isset($data.firstname)}{$data.firstname|capitalize}{else}{$data.username|capitalize}{/if}. Recupere sua conta!</h2>

	<p>Este e-mail foi enviado pelo sistema pois foram feitas várias tentativas de login na sua conta. Por segurança, o sistema bloqueia as contas quando excede 5 falhas de login.</p>
	<p>Para recuperar sua conta, clique no botão abaixo:</p>

	<p><a
		style="display: inline-block; margin: 10px 0 30px 150px; text-align: center; text-decoration: none; padding: 16px 20px; color: #eee; background: seagreen; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px; border-radius: 4px;"
		href="{$baseUrl}/user/recover/{$data.emailHash}{$data.delimiterHash}{$data.uriHash}">Recuperar Conta</a>
	</p>

	<p>Ou copie e cole o link abaixo no seu navegador:</p>
	<p style="font-family: sans-serif; background: #f1f1f1; display: inline; padding: 4px;">
		{$sbaseUrl}/user/recover/{$data.emailHash}{$data.delimiterHash}{$data.uriHash}
	</p>

	<p style="font-size: 15px; color: seagreen; margin-top: 30px;">Os dados de acesso são enviados exclusivamente para seu e-mail. Sendo assim, somente você pode visualizar e acessar.</p>

{include file="email/partials/style-end.tpl"}