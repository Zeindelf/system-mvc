{assign var=baseUrl value=Config::get('html.baseUrl')}
{assign var=siteName value=Config::get('html.siteName')}

<div class="main__header">
	<header class="container header__container">
		<div class="header__title">
			<a title="{$siteName}" href="{$baseUrl}">
				<h1>{$siteName}</h1>
			</a>
		</div><!-- /.header__title -->

		{include file="index/partials/index-nav.tpl"}

	</header>
</div><!-- /.main__header -->