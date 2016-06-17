{assign var=token value=Helpers\Csrf::generate()}

<form action="{$smarty.const.BASE_URL}/contact/process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="name">Nome</label>
			<input type="text" name="name" id="name" value="{$smarty.session.contactData.name|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="email">E-mail</label>
			<input type="text" name="email" id="email" value="{$smarty.session.contactData.email|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="subject">Assunto</label>
			<input type="text" name="subject" id="subject" value="{$smarty.session.contactData.subject|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="message">Mensagem</label>
			<textarea name="message" id="message" rows="10">{$smarty.session.contactData.message|default:null}</textarea>
		</div><!-- /.form__field -->

		<div class="form__field">
			<input type="hidden" name="{$smarty.const.CSRF_TOKEN}" value="{$token}">
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Enviar</button>
			<a class="button" href="{$smarty.const.BASE_URL}">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>