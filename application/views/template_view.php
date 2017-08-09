<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>TestWork</title>
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
	</head>
	<body>
<?php if ($params !== '') echo "<h3>$params</h3>"; ?>
<?php if ($params2 !== '') echo "<h3>$params2</h3>"; ?>
		<div id="page">
			<h3>Карцев Михаил</h3>
			<ul class="list">
				<li class="first "><a href="/">Главная</a></li>
				<li><a href="/about">Контакты</a></li>
			</ul>
		    <div id="content">
				<div class="box">
					<?php include 'application/views/'.$content_view; ?>
				</div>
				<br />
            </div>
			<br />
		</div>
	</body>
</html>