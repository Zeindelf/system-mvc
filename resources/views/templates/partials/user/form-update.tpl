{assign var=baseUrl value=Config::get('html.baseUrl')}
{assign var=token value=Helpers\Csrf::generate()}
{assign var=referer value=Helpers\Http::referer()}

<form action="{$baseUrl}/user/update-process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="email">Informe seu e-mail</label>
			<input type="text" name="email" id="email" value="{$smarty.session.userSession.email}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="firstname">Informe seu nome</label>
			<input type="text" name="firstname" id="firstname" value="{$smarty.session.userSession.firstname|capitalize|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="lastname">Informe seu sobrenome</label>
			<input type="text" name="lastname" id="lastname" value="{$smarty.session.userSession.lastname|capitalize|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="{$smarty.const.CSRF_TOKEN}" value="{$token}">
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Atualizar dados</button>
			<a class="button" href="{$referer}">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>