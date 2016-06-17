<nav class="main__nav">
	{if !isset($smarty.session.userSession)}
		<ul>
			<li><a class="main__nav--button" href="{$smarty.const.BASE_URL}">Home</a></li>
			<li><a class="main__nav--button" href="{$smarty.const.BASE_URL}/contact">Contato</a></li>
			<li><a class="main__nav--button" href="{$smarty.const.BASE_URL}/login">Logar</a></li>
			<li><a class="main__nav--button" href="{$smarty.const.BASE_URL}/register">Cadastrar</a></li>
		</ul>
	{else}
		<div class="user-info">
			<p class="user-info__username">Olá, {$smarty.session.userSession.username|capitalize}</p>
			<a href="{$smarty.const.BASE_URL}/user/profile/{$smarty.session.userSession.username}">Meu profile</a>
			<a href="{$smarty.const.BASE_URL}/contact">Contato</a>
			<a href="{$smarty.const.BASE_URL}/logout">Sair</a>
		</div><!-- /.user-info -->
	{/if}
</nav>