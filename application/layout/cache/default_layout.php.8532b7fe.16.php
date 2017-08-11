<?php 
/** Fenom template 'default_layout.php' compiled at 2017-08-11 06:49:49 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>TestWork</title>
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
	</head>
	<body>
		<div id="page">
			<h1>Карцев Михаил</h1>
			    <?php
/* default_layout.php:11: {$menu} */
 echo $var["menu"]; ?>
		    <div id="content">
				<div class="box">
                    <?php
/* default_layout.php:14: {if $content!} */
 if(isset($var["content"])) { ?><?php
/* default_layout.php:14: {$content} */
 echo $var["content"]; ?><?php
/* default_layout.php:14: {/if} */
 } ?>
				</div>
				<br />
            </div>
			<br />
		</div>
	</body>
</html><?php
}, array(
	'options' => 128,
	'provider' => false,
	'name' => 'default_layout.php',
	'base_name' => 'default_layout.php',
	'time' => 1502426988,
	'depends' => array (
  0 => 
  array (
    'default_layout.php' => 1502426988,
  ),
),
	'macros' => array(),

        ));
