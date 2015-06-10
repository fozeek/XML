<html>
    <head>
        <meta charset="utf-8">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
	<div class="container">
<?php


/* ERROR REPORTING */
error_reporting(E_ALL);
ini_set("display_errors", 1);

//require_once __DIR__.'/../php-markdown/Michelf/Markdown.inc.php';
require_once __DIR__.'/../php-markdown/Michelf/MarkdownExtra.inc.php';
ob_start();
include __DIR__.'/../README.md';
$my_text = ob_get_clean();
$my_html = Michelf\MarkdownExtra::defaultTransform($my_text);
echo $my_html;
?>
	</div>
	<script>
	$(function(){
	    jQuery('table').addClass('table');
	});
	</script>
    </body>
</html>
