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
<h1>Gestion FAQ</h1>
<table border = "1">
<tr>
<th>ID</th>
<th>Question</th>
<th>Réponse</th>
<th>Action</th>
<th>Action</th>
</tr>
<?php
require("../connexion-bdd.php");
$sql = "select * from faq";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$idFaq = $row["idfaq"];
$sql = "select texte from reponse_faq where $idFaq = faq_idFaq";
$reponses = $conn->query($sql);
$reponse = $reponses->fetch_assoc();
echo '<tr>';
echo '<td>' . $row["idfaq"] . '</td>';
echo '<td>' . $row["texte"] . '</td>';
echo '<td>' . $reponse["texte"] . '</td>';
 
echo '<td><a href = "modifier-faq.php?id=' . $row["idfaq"] . '">Modifier</a></td>';
echo '<td><a href = "supprimer-faq.php?id=' . $row["idfaq"] . '">Supprimer</a></td>';
echo '</tr>';
}
} else {
echo "Aucune question dans la FAQ.";
}
?>
</table>
<a href = "ajouter-faq.php" class = "button">Ajouter</a>
</div>
<footer>
<iframe src = "../commun/footer.php"></iframe> 
</footer>
</body>