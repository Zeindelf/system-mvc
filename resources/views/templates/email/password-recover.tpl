{assign var=baseUrl value=Config::get('html.baseUrl')}
{assign var=tokenExpire value=Config::get('html.tokenExpire')}

{include file="email/partials/style-start.tpl"}

	<h2 style="color: seagreen">Olá, {if isset($data.firstname)}{$data.firstname|capitalize}{else}{$data.username|capitalize}{/if}. Recupere sua senha!</h2>

	<p>Este e-mail foi enviado pelo sistema pois foi requisitado uma recuperação de senha.</p>
	<p>Para recuperar sua senha, clique no botão abaixo:</p>

	<p><a
		style="display: inline-block; margin: 10px 0 30px 150px; text-align: center; text-decoration: none; padding: 16px 20px; color: #eee; background: seagreen; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px; border-radius: 4px;"
		href="{$baseUrl}/password/reset/{$data.emailHash}{$data.delimiterHash}{$data.uriHash}">Recuperar Senha</a>
	</p>

	<p>Ou copie e cole o link abaixo no seu navegador:</p>
	<p style="font-family: sans-serif; background: #f1f1f1; display: inline; padding: 4px;">
		{$baseUrl}/password/reset/{$data.emailHash}{$data.delimiterHash}{$data.uriHash}
	</p>

	<p style="color: seagreen; font-weight: bold;">Este link é válido pelas próximas {$tokenExpire/60} horas.</p>

	<p style="font-size: 15px; color: seagreen; margin-top: 30px;">Caso não tenha solicitado a troca de e-mail, desconsidere esta mensagem.<br>Os dados de acesso são enviados exclusivamente para seu e-mail. Sendo assim, somente você pode visualizar e acessar.</p>

{include file="email/partials/style-end.tpl"}