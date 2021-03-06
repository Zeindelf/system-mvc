{assign var=baseUrl value=Config::get('html.baseUrl')}

{assign var=csrfToken value=Csrf::generate()}

{assign var=username value=Session::get('registerData.username')}
{assign var=userdata value=Session::get('loginData.userdata')}

<form action="{$baseUrl}/login/process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="userdata">Nome de Usuário ou E-mail</label>
			<input type="text" name="userdata" id="userdata"
				value="{$username|default:null}{$userdata|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="password">Senha</label>
			<input type="password" name="password" id="password">
		</div><!-- /.form__field -->

		<div class="form__field">
			{$csrfToken}
		</div><!-- /.form__field -->

		<div class="form__extra">
			<label for="remember">
				<input type="checkbox" name="remember" id="remember" checked="chekced">
				<span>Lembrar-me</span>
			</label>

			<div class="forgot">
				<a href="{$baseUrl}/password/recover">Esqueci minha senha</a>
			</div><!-- /.forgot -->
		</div><!-- /.form__extra -->

		<div class="form__button">
			<button class="button" type="submit">Entrar</button>
			<a class="button" href="{$baseUrl}">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>