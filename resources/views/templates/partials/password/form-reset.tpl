{assign var=baseUrl value=Config::get('html.baseUrl')}

{if $identifier}
	{assign var=token value=Helpers\Csrf::generate()}
	{assign var=referer value=Helpers\Http::referer()}

	<form action="{$baseUrl}/password/reset-process" method="post">
		<div class="form__content">

			<div class="form__field">
				<label for="new_password">Nova senha</label>
				<input type="password" name="new_password" id="new_password">
			</div><!-- /.form__field -->

			<div class="form__field">
				<label for="confirm_new_password">Repita a nova senha</label>
				<input type="password" name="confirm_new_password" id="confirm_new_password">
			</div><!-- /.form__field -->

			<div class="form__field">
				<input type="hidden" name="{$smarty.const.CSRF_TOKEN}" value="{$token}">
			</div><!-- /.form__field -->

			<div class="form__button">
				<button class="button" type="submit">Mudar</button>
				<a class="button" href="{$referer}">Voltar</a>
			</div><!-- /.form__button -->

		</div><!-- /.form__content -->
	</form>
{else}
	<div class="alert alert-info">
		<p>Desculpe, mas não foi possível acessar qualquer cadastro com o código de recuperação informado. Talvez ele já tenha sido usado ou expirado.</p>

		<p>Caso deseje, você pode solicitar outro código <a href="{$baseUrl}/password/recover"><b>Clicando Aqui!</b></a></p>
	</div>
{/if}