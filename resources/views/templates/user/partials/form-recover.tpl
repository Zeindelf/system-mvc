{assign var=baseUrl value=Config::get('html.baseUrl')}

{assign var=csrfToken value=Csrf::generate()}

<form action="{$baseUrl}/user/recover-process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="email">Informe seu e-mail cadastrado</label>
			<input type="text" name="email" id="email">
		</div><!-- /.form__field -->

		<div class="form__field">
			{$csrfToken}
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Recuperar conta</button>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>