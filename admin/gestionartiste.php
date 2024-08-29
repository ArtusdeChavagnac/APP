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
<title>Gestion FAQ — SonoTech</title>
</head>
<body>
<header>
<iframe src = "../communs/header.php"></iframe>
</header>
<div id = "div-contenu">
<h1>Gestion Artistes</h1>
<table border = "1">
<tr>
<th>ID</th>
<th>Pseudo</th>
<th>Nom</th>
<th>Prénom</th>
<th>Adresse Email</th>
<th>Numéro de Téléphone</th>
<th>Style de Musique</th>
<th>Action</th>
<th>Action</th>
</tr>
<?php
require("../connexion-bdd.php");
$sql = "SELECT * FROM artiste";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo '<tr>';
echo '<td>' . $row["idArtiste"] . '</td>';
echo '<td>' . $row["pseudo"] . '</td>';
echo '<td>' . $row["nom"] . '</td>';
echo '<td>' . $row["prenom"] . '</td>';
echo '<td>' . $row["adresse_email"] . '</td>';
echo '<td>' . $row["numero_de_telephone"] . '</td>';
echo '<td>' . $row["style_de_musique"] . '</td>';
echo '<td><a href = "modifierArtiste.php?id=' . $row["idArtiste"] . '">Modifier</a></td>';
echo '<td><a href = "supprimerartiste.php?id=' . $row["idArtiste"] . '">Supprimer</a></td>';
echo '</tr>';
}
} else {
echo "Aucun artiste enregistré.";
}
?>
</table>
<a href = "ajouterArtiste.php" class = "button">Ajouter</a>
</div>
<footer>
<iframe src = "../communs/footer.php"></iframe> 
</footer>
</body>