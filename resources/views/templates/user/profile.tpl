{include file="partials/user/index-header.tpl"}

	<div class="main__content">
		<div class="container">

			{$smarty.session.flash|default:null}

			<div class="user__content">
				<div class="user__change">
					<ul class="user__change-info">
						<li><a href="{$smarty.const.BASE_URL}/user/update/{$smarty.session.userSession.username}">Atualizar dados</a></li>
						<li><a href="{$smarty.const.BASE_URL}/password/change">Mudar senha</a></li>
					</ul>
				</div><!-- /.user__change -->

				<div class="user__info">
					<h1 class="main__title">{$variables.indexTitle}</h1>

					<ul class="user__info-details">
						<li>Nome de Usuário: <span class="user__info-field">{$smarty.session.userSession.username|capitalize}</span></li>
						<li>Nome: <span class="user__info-field">{$smarty.session.userSession.firstname|capitalize}</span></li>
						<li>Sobrenome: <span class="user__info-field">{$smarty.session.userSession.lastname|capitalize}</span></li>
						<li>E-mail: <span class="user__info-field">{$smarty.session.userSession.email}</span></li>
					</ul>
				</div><!-- /.user__info -->
			</div><!-- /.user__container -->

		</div><!-- /.container -->
	</div><!-- /.main__content -->

{include file="partials/index-footer.tpl"}