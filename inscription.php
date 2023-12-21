<?php
include('./fonctions.php');

?>
<!DOCTYPE html>
<html lang = "fr">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<link rel = "stylesheet" href = "stylesheet.css">
	<link rel = "shortcut icon" href = "images/shortcut icon.png">
	<script src = script.js></script>
	<title>Inscription — SonoTech</title>
</head>
<body>
<header><iframe src = "communs/header.html"></iframe></header>
<div id = "div-contenu">


<h1>Inscription</h1>

<form id="inscription" action="traitement.php" method = "post">
	<input type = "text" name = "nom" placeholder = "Nom" required><br>
	<input type = "text" name = "prenom" placeholder = "Prénom" required><br>
	<input type = "text" name = "telephone" placeholder = "Numéro de téléphone" required><br>
	<input type = "email" name = "email" placeholder = "Adresse email" required><br>
	<label>Date de naissance</label><br>
	<input type = "date" name = "dateNaissance" required><br>
	<input type = "password" name = "motDePasse" placeholder = "Mot de passe" required><br>
	<input type = "radio" name = "CGU" required>
	<label>J'accepte les Conditions Générales d'Utilisation de SonoTech, proposé par Event IT.</label>
	<br>
	<button>Inscription</button>
</form>

<a href = "connexion.php">J'ai déja un compte.</a>


</div>
<footer><iframe src = "communs/footer.html"></iframe></footer>
</body>
</html>