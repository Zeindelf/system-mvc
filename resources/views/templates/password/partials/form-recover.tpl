{assign var=baseUrl value=Config::get('html.baseUrl')}

{assign var=csrfToken value=Csrf::generate()}
{assign var=referer value=Http::referer()}

<form action="{$baseUrl}/password/recover-process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="email">Informe seu e-mail cadastrado</label>
			<input type="text" name="email" id="email">
		</div><!-- /.form__field -->

		<div class="form__field">
			{$csrfToken}
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Recuperar senha</button>
			{*<a class="button" href="{$smarty.const.BASE_URL}/login">Voltar</a>*}
			<a class="button" href="{$referer}">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>