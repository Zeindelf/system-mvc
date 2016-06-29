{assign var=baseUrl value=Config::get('html.baseUrl')}

{assign var=csrfToken value=Csrf::generate()}

{assign var=username value=Session::get('registerData.username')}
{assign var=email value=Session::get('registerData.email')}

<form action="{$baseUrl}/register/process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="username">Usuário</label>
			<input type="text" name="username" id="username" value="{$username|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="email">E-mail</label>
			<input type="text" name="email" id="email" value="{$email|default:null}">
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
			{$csrfToken}
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Cadastrar</button>
			<a class="button" href="{$baseUrl}">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>