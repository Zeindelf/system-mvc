<nav class="main__nav">
	{if !isset($smarty.session.userSession)}
		<ul>
			<li><a class="main__nav--button" href="{$baseUrl}">Home</a></li>
			<li><a class="main__nav--button" href="{$baseUrl}/contact">Contato</a></li>
			<li><a class="main__nav--button" href="{$baseUrl}/login">Logar</a></li>
			<li><a class="main__nav--button" href="{$baseUrl}/register">Cadastrar</a></li>
		</ul>
	{else}
		<div class="user-info">
			<p class="user-info__username">Olá, {$smarty.session.userSession.username|capitalize}</p>
			<a href="{$baseUrl}/user/profile/{$smarty.session.userSession.username}">Meu profile</a>
			<a href="{$baseUrl}/contact">Contato</a>
			<a href="{$baseUrl}/logout">Sair</a>
		</div><!-- /.user-info -->
	{/if}
</nav>