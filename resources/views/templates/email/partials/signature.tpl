{assign var=siteName value=Config::get('html.siteName')}

<hr>
<p style="font-size: 14px; color: #999;">Enviada por: <b>{$siteName}</b> em <b>{$smarty.now|date_format: "%d/%m/%Y"}</b> as <b>{$smarty.now|date_format: "%T"}</b></p>