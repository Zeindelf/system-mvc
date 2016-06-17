<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href=""/>
        <link rel="base" href="{$smarty.const.BASE_URL}"/>

		{if isset($variables.headerTitle)}
			<title>{$variables.headerTitle} | {$smarty.const.SITE_NAME}</title>
		{else}
			<title>{$smarty.const.SITE_NAME}</title>
		{/if}

		<meta name="description" content="{$smarty.const.SITE_DESC}">
		<meta name="robots" content="index, follow"/>

		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{$smarty.const.BASE_CSS}/style.css">
	</head>

	<body>