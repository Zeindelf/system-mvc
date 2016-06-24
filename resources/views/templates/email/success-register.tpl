{assign var=baseUrl value=Config::get('html.baseUrl')}

{include file="email/partials/style-start.tpl"}

	<h2 style="color: seagreen">Olá, {$data.username|capitalize}!</h2>

	<p>Este e-mail foi enviado pelo sistema pois foi realizado um cadastro em nossa base de dados com seu e-mail.</p>
	<p>Sua conta já está ativa e pode ser usada a qualquer momento.</p>
	<p>Clique no botão abaixo para realizar o login.</p>

	<p><a
		style="display: inline-block; margin: 10px 0 30px 150px; text-align: center; text-decoration: none; padding: 16px 20px; color: #eee; background: seagreen; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px; border-radius: 4px;"
		href="{$baseUrl}/login">Logar agora!</a>
	</p>

{include file="email/partials/style-end.tpl"}