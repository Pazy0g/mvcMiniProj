<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8" />
<link rel="icon" href="static/img/favicon.ico" type="image/x-icon" />
<link href="static/css/intro.css" rel="stylesheet" />
<title>Setup</title>
</head>

<body>
<p></p>
<div class="welcome" >
	<h1>Données correctement initialisées.</h1>
	<li>DATABASE : <?= DB_DATABASE ?></li>
	<li>TABLE : <?= DB_USER_TABLE ?></li>
	<li>SERVER : <?= DB_HOST ?></li>
	<h2>
	<a href="?read"/> Mes données clients</a>
	</h2>
</div>

</body>
</html>
	