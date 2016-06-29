{include file="user/partials/index-header.tpl"}

	<div class="main__content">
		<div class="container">

			<h1 class="main__title">{$variables.indexTitle}</h1>

			<div class="form__container">

				{$smarty.session.flash|default:null}

				{include file="user/partials/form-update.tpl"}

			</div><!-- /.form__container -->

		</div><!-- /.container -->
	</div><!-- /.main__content -->

{include file="index/partials/index-footer.tpl"}