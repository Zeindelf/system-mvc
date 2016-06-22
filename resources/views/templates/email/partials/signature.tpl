{assign var=baseUrl value=Config::get('html.baseUrl')}

<hr>
<p style="font-size: 14px; color: #999;">Enviada por: <b>{$baseUrl}</b> em <b>{$smarty.now|date_format: "%d/%m/%Y"}</b> as <b>{$smarty.now|date_format: "%T"}</b></p>