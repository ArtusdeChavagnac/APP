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
<title>Modifier Artiste — SonoTech</title>
</head>
<body>
<header>
<iframe src = "../commun/header.php"></iframe>
</header>
<div id = "div-contenu">
<h1>Modifier Artiste</h1>
<?php 
require("../connexion-bdd.php");
if(isset($_GET['id'])) {
$artisteId = $_GET['id'];
$sql = "select * from artiste where idArtiste = $artisteId";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
?>
<h1>Modifier un artiste</h1>
<form action = "traitement-modifier-artiste.php.php" method = "post">
<input type = "hidden" name = "idArtiste" value = "<?php echo $row['idArtiste']; ?>">
<label for = "pseudo">Pseudo :</label>
<input type = "text" name = "pseudo" value = "<?php echo $row['pseudo']; ?>" required>
<label for = "nom">Nom :</label>
<input type = "text" name = "nom" value = "<?php echo $row['nom']; ?>" required>
<label for = "prenom">Prénom :</label>
<input type = "text" name = "prenom" value = "<?php echo $row['prenom']; ?>" required>
<label for = "adresse_email">Adresse Email :</label>
<input type = "text" name = "adresse_email" value = "<?php echo $row['adresse_email']; ?>" required>
<label for = "numero_de_telephone">Numéro de Téléphone :</label>
<input type = "text" name = "numero_de_telephone" value = "<?php echo $row['numero_de_telephone']; ?>" required>
<label for = "style_de_musique">Style de Musique :</label>
<input type = "text" name = "style_de_musique" value = "<?php echo $row['style_de_musique']; ?>" required>
<button type = "submit">Modifier</button>
</form>
<?php
} else {
echo "Artiste non trouvé.";
}
$conn->close();
} else {
echo "Identifiant de l'artiste non spécifié.";
}
?>
</div>
<footer>
<iframe src = "../commun/footer.php"></iframe> 
</footer>
</body>
</html>