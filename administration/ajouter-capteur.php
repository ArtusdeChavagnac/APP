<?php
session_start();
if (isset($_SESSIon['utilisateur_abonnement_idAbonnement'])) {
if ($_SESSIon['utilisateur_abonnement_idAbonnement'] != 2) {
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
<title>Ajouter Capteurs — SonoTech</title>
</head>
<body>
<header>
<iframe src = "../communs/header.html"></iframe>
</header>
<div id = "div-contenu">
<h1>Ajouter FAQ</h1>
<?php
require("../connexion-bdd.php");
?>
<form action = "traitementajouter-capteur.php" method = "post">
<input type = "hidden" name = "idCapteur_sonore">
<label for = "position">Position :</label>
<input type = "text" name = "position" required>
<label for = "date">date</label>
<input type = "date" name = "date" required>
<label for = "niveau_sonore">Niveau Sonore</label>
<input type = "text" name = "niveau_sonore" required>
<button type = "submit">Ajouter</button>
</form>
</div>
<footer>
<iframe src = "../communs/footer.html"></iframe> 
</footer>
</body>
</html>