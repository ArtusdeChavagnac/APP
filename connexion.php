<!DOCTYPE html>
<html lang = "fr">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<link rel = "stylesheet" href = "stylesheet.css">
	<link rel = "shortcut icon" href = "images/shortcut icon.png">
	<script src = "script.js"></script>
	<title>Connexion — SonoTech</title>
</head>
<body>
<header><iframe src = "communs/header.html"></iframe></header>
<div id = "div-contenu">


<h1>Connexion</h1>

<form action = "index.php" method = "post">
	<input type = "email" name = "email" placeholder = "Adresse email" required><br>
	<input type = "password" name = "motDePasse" placeholder = "Mot de passe" required><br>
	<button type = "submit">Connexion</button>
</form>

<a href = "inscription.php">Je n'ai pas de compte.</a>


</div>
<footer><iframe src = "communs/footer.html"></iframe></footer>
</body>
</html>