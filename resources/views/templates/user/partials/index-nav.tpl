{assign var=baseUrl value=Config::get('html.baseUrl')}

<nav class="main__nav">
	<div class="user-info">
		<a href="{$baseUrl}">Home</a>
		<a href="{$baseUrl}/contact">Contato</a>
		<a href="{$baseUrl}/logout">Sair</a>
	</div><!-- /.user-info -->
</nav>