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
<title>Modifier Capteur — SonoTech</title>
</head>
<body>
<header>
<iframe src = "../commun/header.php"></iframe>
</header>
<div id = "div-contenu">
<h1>Modifier Capteur</h1>
<?php 
require("../connexion-bdd.php");
if(isset($_GET['id'])) {
$CapteurId = $_GET['id'];
$sql = "SELECT * FROM capteur_sonore WHERE idCapteur_sonore = $CapteurId";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
?>
<h1>Modifier un capteur</h1>
<form action = "traitement-modifier-capteur.php.php" method = "post">
<input type = "hidden" name = "idCapteur_sonore" value = "<?php echo $row['idCapteur_sonore']; ?>">
<label for = "position">Position :</label>
<input type = "text" name = "position" value = "<?php echo $row['position']; ?>" required>
<label for = "date">date</label>
<textarea name = "date" required><?php echo $row['date']; ?></textarea>
<label for = "niveau_sonore">Niveau Sonore</label>
<textarea name = "niveau_sonore" required><?php echo $row['niveau_sonore']; ?></textarea>
<button type = "submit">Modifier</button>
</form>
<?php
} else {
echo "capteur non trouvée.";
}
$conn->close();
} else {
echo "Identifiant du capteur non spécifié.";
}
?>
</div>
<footer>
<iframe src = "../commun/footer.php"></iframe> 
</footer>
</body>
</html>