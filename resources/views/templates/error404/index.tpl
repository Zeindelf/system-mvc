{assign var=baseUrl value=Config::get('html.baseUrl')}

{include file="index/partials/index-header.tpl"}

	<div class="main__content">
		<div class="container">

			<article class="not-found">
				<h1 class="not-found__title">{$variables.errorTitle}</h1>

				<div class="not-found__content">
					<h2>{$variables.errorDesc}</h2>
					<p>O link que você tentou acessar pode estar quebrado ou a página pode ter sido removida.</p>
					<a href="{$baseUrl}">Voltar para a página principal</a>
				</div>
			</article>

		</div><!-- /.container -->
	</div><!-- /.main__content -->

{include file="index/partials/index-footer.tpl"}