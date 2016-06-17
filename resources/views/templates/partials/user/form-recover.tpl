{assign var=token value=Helpers\Csrf::generate()}

<form action="{$smarty.const.BASE_URL}/user/recover-process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="email">Informe seu e-mail cadastrado</label>
			<input type="text" name="email" id="email">
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="{$smarty.const.CSRF_TOKEN}" value="{$token}">
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Recuperar conta</button>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>