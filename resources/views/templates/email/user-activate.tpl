{assign var=baseUrl value=Config::get('html.baseUrl')}

{include file="email/partials/style-start.tpl"}

	<h2 style="color: seagreen">Olá, {$data.username|capitalize}. Ative sua conta!</h2>

	<p>Para ativar sua conta, clique no botão abaixo:</p>

	<p><a
		style="display: inline-block; margin: 10px 0 30px 150px; text-align: center; text-decoration: none; padding: 16px 20px; color: #eee; background: seagreen; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px; border-radius: 4px;"
		href="{$baseUrl}/user/activate-process/{$data.emailHash}{$data.delimiterHash}{$data.uriHash}">Ativar Conta</a>
	</p>

	<p>Ou copie e cole o link abaixo no seu navegador:</p>
	<p style="font-family: sans-serif; background: #f1f1f1; display: inline; padding: 4px;">
		{$baseUrl}/user/activate-process/{$data.emailHash}{$data.delimiterHash}{$data.uriHash}
	</p>

{include file="email/partials/style-end.tpl"}