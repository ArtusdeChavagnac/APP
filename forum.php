<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel = "stylesheet" href = "stylesheet.css">
<link rel = "shortcut icon" href = "images/shortcut icon.png">
<script src = script.js></script>
<link rel = "stylesheet" href = "stylesheet.css">
</head>
<body>
<?php
session_start();
$idUtilisateur = $_SESSION['utilisateur_id'];
$utilisteur_prenom = $_SESSION['utilisateur_prenom'];
echo "<p>Vous êtes connecté en tant que $utilisteur_prenom</p>";
?>
<header><iframe src = "communs/header.php"></iframe></header>
<h2>Poser une question</h2>
<form method = "post" action = "traitement-forum.php">
<label for = "question">Votre question:</label>
<textarea name = "question" required></textarea>
<input type = "submit" value = "Soumettre">
</form>
<h2>Questions existantes</h2>
<?php
include 'afficher-question.php';
?>
<footer><iframe src = "communs/footer.php"></iframe></footer>
</body>
</html>