{assign var=baseUrl value=Config::get('html.baseUrl')}

{assign var=csrfToken value=Csrf::generate()}
{assign var=referer value=Http::referer()}

{assign var=email value=Session::get('userSession.email')}
{assign var=firstname value=Session::get('userSession.firstname')}
{assign var=lastname value=Session::get('userSession.lastname')}


<form action="{$baseUrl}/user/update-process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="email">Informe seu e-mail</label>
			<input type="text" name="email" id="email" value="{$email}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="firstname">Informe seu nome</label>
			<input type="text" name="firstname" id="firstname" value="{$firstname|capitalize|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="lastname">Informe seu sobrenome</label>
			<input type="text" name="lastname" id="lastname" value="{$lastname|capitalize|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			{$csrfToken}
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Atualizar dados</button>
			<a class="button" href="{$referer}">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>