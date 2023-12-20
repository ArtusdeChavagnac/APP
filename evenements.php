<!DOCTYPE html>
<html lang = "fr">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<link rel = "stylesheet" href = "stylesheet.css">
	<link rel = "shortcut icon" href = "images/shortcut icon.png">
	<script src = "script.js"></script>
	<title>Événements — SonoTech</title>
</head>
<body>
<header><iframe src = "communs/header.html"></iframe></header>
<div id = "div-contenu">


<h1>Événements</h1>

<p>Voilà les prochains événements auxquels nous participons.</p>
<p>Rechercher par date :</p>

<form action = "evenements.html" method = "get">
	<input type = "date" name = "date">
	<button>Rechercher</button>
</form>

<table>
	<tr>
		<th>Date</th>
		<th>Groupe</th>
		<th>Lieu</th>
		<th>Qualité moyenne du lieu</th>
	</tr>
	<tr>
		<td>jj/mm/aaaa</td>
		<td>nom_groupe</td>
		<td>lieu_concert</td>
		<td>qualite_son_lieu</td>
	</tr>
</table>


</div>
<footer><iframe src = "communs/footer.html"></iframe></footer>
</body>
</html>