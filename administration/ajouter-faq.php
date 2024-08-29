<?php
session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
if ($_SESSION['utilisateur_abonnement_idAbonnement'] != 2) {
echo "<script>window.location.href = '../index.php'</script>";
} 
} else {
echo "<script>window.location.href = '../index.php'</script>";
}
?>
<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "../css.css">
<link rel = "shortcut icon" href = "../images/shortcut icon.png"> 
<script src = "../js.js"></script> 
<title>Ajouter FAQ — SonoTech</title>
</head>
<body>
<header>
<iframe src = "../commun/header.php"></iframe>
</header>
<div id = "div-contenu">
<h1>Ajouter FAQ</h1>
<form action = "traitementajouter-faq.php" method = "post">
<label for = "question">Question :</label>
<input type = "text" name = "texte" required>
<label for = "reponse">Réponse :</label>
<textarea name = "reponse" required></textarea>
<button type = "submit">Ajouter</button>
</form>
</div>
<footer>
<iframe src = "../commun/footer.php"></iframe> 
</footer>
</body>
</html>