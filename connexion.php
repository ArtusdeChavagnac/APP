<?php
session_start();
if(isset($_SESSION['utilisateur_connecte'])) {
header("Location: index.php");
exit();
}
?>
<!doctype html>
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
<header><iframe src = "commun/header.php"></iframe></header>
<div id = "div-contenu">
<h1>Connexion</h1>
<form action = "script-connection.php" method = "post" onsubmit = "return submitconfirm()">
<input type = "email" name = "email" placeholder = "Adresse email"><br>
<input type = "password" name = "motDePasse" placeholder = "Mot de passe"><br>
<button type = "submit">Connexion</button>
</form>
<a href = "inscription.php">Je n'ai pas de compte.</a>
</div>
<footer><iframe src = "commun/footer.php"></iframe></footer>
</body>
</html>
