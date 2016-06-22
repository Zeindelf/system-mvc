{assign var=baseUrl value=Config::get('html.baseUrl')}
{assign var=token value=Helpers\Csrf::generate()}

<form action="{$baseUrl}/register/process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="username">Usuário</label>
			<input type="text" name="username" id="username" value="{$smarty.session.registerData.username|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="email">E-mail</label>
			<input type="text" name="email" id="email" value="{$smarty.session.registerData.email|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="password">Senha</label>
			<input type="password" name="password" id="password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="confirm_password">Repita sua senha</label>
			<input type="password" name="confirm_password" id="confirm_password">
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="{$smarty.const.CSRF_TOKEN}" value="{$token}">
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Cadastrar</button>
			<a class="button" href="{$baseUrl}">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>