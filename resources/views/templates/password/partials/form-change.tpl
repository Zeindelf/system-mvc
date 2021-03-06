{assign var=baseUrl value=Config::get('html.baseUrl')}

{assign var=csrfToken value=Csrf::generate()}
{assign var=referer value=Http::referer()}

<form action="{$baseUrl}/password/change-process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="current_password">Senha atual</label>
			<input type="password" name="current_password" id="current_password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="new_password">Nova senha</label>
			<input type="password" name="new_password" id="new_password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="confirm_new_password">Repita a nova senha</label>
			<input type="password" name="confirm_new_password" id="confirm_new_password">
		</div><!-- /.form__field -->

		<div class="form__field">
			{$csrfToken}
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Mudar</button>
			<a class="button" href="{$referer}">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>