{assign var=siteName value=Config::get('html.siteName')}

<div class="main__footer">
	<div class="container">

		<p>{$siteName} Footer &copy; {$smarty.now|date_format: "%Y"}</p>

	</div><!-- /.container -->
</div><!-- /.main__footer -->