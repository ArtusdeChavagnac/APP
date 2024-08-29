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
<title>Gestion FAQ — SonoTech</title>
</head>
<body>
<header>
<iframe src = "../commun/header.php"></iframe>
</header>
<div id = "div-contenu">
<h1>Gestion Capteurs</h1>
<table border = "1">
<tr>
<th>ID</th>
<th>Position</th>
<th>date</th>
<th>Niveau sonore</th>
<th>Action</th>
<th>Action</th>
</tr>
<?php
require("../connexion-bdd.php");
$sql = "select * from capteur_sonore";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo '<tr>';
echo '<td>' . $row["idCapteur_sonore"] . '</td>';
echo '<td>' . $row["position"] . '</td>';
echo '<td>' . $row["date"] . '</td>';
echo '<td>' . $row["niveau_sonore"] . '</td>';
 
echo '<td><a href = "modifier-capteur.php?id=' . $row["idCapteur_sonore"] . '">Modifier</a></td>';
echo '<td><a href = "supprimer-capteur.php?id=' . $row["idCapteur_sonore"] . '">Supprimer</a></td>';
echo '</tr>';
}
} else {
echo "Aucun capteur enregistré.";
}
?>
</table>
<a href = "ajouter-capteur.php" class = "button">Ajouter</a>
</div>
<footer>
<iframe src = "../commun/footer.php"></iframe> 
</footer>
</body>
</html>