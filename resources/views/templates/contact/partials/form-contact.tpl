{assign var=baseUrl value=Config::get('html.baseUrl')}

{assign var=csrfToken value=Csrf::generate()}

{assign var=name value=Session::get('contactData.name')}
{assign var=email value=Session::get('contactData.email')}
{assign var=subject value=Session::get('contactData.subject')}
{assign var=message value=Session::get('contactData.message')}

<form action="{$baseUrl}/contact/process" method="post">
	<div class="form__content">

		<div class="form__field">
			<label for="name">Nome</label>
			<input type="text" name="name" id="name" value="{$name|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="email">E-mail</label>
			<input type="text" name="email" id="email" value="{$email|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="subject">Assunto</label>
			<input type="text" name="subject" id="subject" value="{$subject|default:null}">
		</div><!-- /.form__field -->

		<div class="form__field">
			<label for="message">Mensagem</label>
			<textarea name="message" id="message" rows="10">{$message|default:null}</textarea>
		</div><!-- /.form__field -->

		<div class="form__field">
			{$csrfToken}
		</div><!-- /.form__field -->

		<div class="form__button">
			<button class="button" type="submit">Enviar</button>
			<a class="button" href="{$baseUrl}">Voltar</a>
		</div><!-- /.form__button -->

	</div><!-- /.form__content -->
</form>