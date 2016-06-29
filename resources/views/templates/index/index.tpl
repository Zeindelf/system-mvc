{include file="index/partials/index-header.tpl"}

	<div class="main__content">
		<div class="container">

			<h1 class="main__title">{$variables.indexTitle}</h1>

			{$smarty.session.flash|default:null}

		</div><!-- /.container -->
	</div><!-- /.main__content -->

{include file="index/partials/index-footer.tpl"}