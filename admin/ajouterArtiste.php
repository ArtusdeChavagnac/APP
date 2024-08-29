<?php
session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
if ($_SESSION['utilisateur_abonnement_idAbonnement'] != 2) {
echo "<script>window.location.href = '../index.php'</script> " ;
} 
} else {
echo "<script>window.location.href = '../index.php'</script> " ;
}
?>
<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "../stylesheet.css">
<link rel = "shortcut icon" href = "../images/shortcut icon.png"> 
<script src = "../script.js"></script> 
<title>Ajout Artiste — SonoTech</title>
</head>
<body>
<header>
<iframe src = "../communs/header.php"></iframe>
</header>
<div id = "div-contenu">
<h1>Ajout Artiste</h1>
<form action = "traitementajoutartiste.php" method = "post">
<label for = "pseudo">Pseudo :</label>
<input type = "text" name = "pseudo" required>
<label for = "nom">Nom :</label>
<input type = "text" name = "nom" required>
<label for = "prenom">Prénom :</label>
<input type = "text" name = "prenom" required>
<label for = "adresse_email">Adresse Email :</label>
<input type = "text" name = "adresse_email" required>
<label for = "numero_de_telephone">Numéro de Téléphone :</label>
<input type = "text" name = "numero_de_telephone" required>
<label for = "style_de_musique">Style de Musique :</label>
<input type = "text" name = "style_de_musique" required>
<button type = "submit">Ajouter</button>
</form>
</div>
<footer>
<iframe src = "../communs/footer.php"></iframe> 
</footer>
</body>
</html>