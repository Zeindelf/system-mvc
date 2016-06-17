{include file="partials/user/index-header.tpl"}

	<div class="main__content">
		<div class="container">

			<h1 class="main__title">{$variables.indexTitle}</h1>

			<div class="form__container">

				{$smarty.session.flash|default:null}

				{include file="partials/user/form-recover.tpl"}

			</div><!-- /.form__container -->

		</div><!-- /.container -->
	</div><!-- /.main__content -->

{include file="partials/index-footer.tpl"}