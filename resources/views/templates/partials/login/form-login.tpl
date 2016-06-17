{assign var=token value=Helpers\Csrf::generate()}

{*<form action="{$smarty.const.BASE_URL}/login/process" method="post">*}
<form action="{$smarty.const.BASE_URL}/login/process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="userdata">Nome de Usuário ou E-mail</label>
			<input type="text" name="userdata" id="userdata"
				value="{$smarty.session.registerData.username|default:null}{$smarty.session.loginData.userdata|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="password">Senha</label>
			<input type="password" name="password" id="password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="{$smarty.const.CSRF_TOKEN}" value="{$token}">
		</div><!-- /.form__field -->

		<div class="form__extra">
			<label for="remember">
				<input type="checkbox" name="remember" id="remember" checked="chekced">
				<span>Lembrar-me</span>
			</label>

			<div class="forgot">
				<a href="{$smarty.const.BASE_URL}/password/recover">Esqueci minha senha</a>
			</div><!-- /.forgot -->
		</div><!-- /.form__extra -->

		<div class="form__button">
			<button class="button" type="submit">Entrar</button>
			<a class="button" href="{$smarty.const.BASE_URL}">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>