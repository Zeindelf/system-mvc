<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	{assign var=baseUrl value=Config::get('html.baseUrl')}
    	{assign var=baseCss value=Config::get('html.baseCss')}
    	{assign var=siteName value=Config::get('html.siteName')}
    	{assign var=siteDesc value=Config::get('html.siteDesc')}

		<link rel="shortcut icon" href=""/>
        <link rel="base" href="{$baseUrl}"/>

		{if isset($variables.headerTitle)}
			<title>{$variables.headerTitle} | {$siteName}</title>
		{else}
			<title>{$siteName}</title>
		{/if}

		<meta name="description" content="{$siteDesc}">
		<meta name="robots" content="index, follow"/>

		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{$baseCss}/style.css">
	</head>

	<body>