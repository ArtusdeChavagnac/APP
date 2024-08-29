<?php
session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
if ($_SESSION['utilisateur_abonnement_idAbonnement'] !=2) {
echo "<script>window.location.href = '../index.php'</script> ";
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
<title>Page d'Administration — SonoTech</title>
</head>
<body>
<header>
<iframe src = "../commun/header.php"></iframe>
</header>
<div id = "div-contenu">
<h1>Page d'Administration</h1>
<a href = "gestion-faq.php" target = "_top">Gestion de la FAQ</a>
<a href = "gestion-artiste.php" target = "_top">Gestion des artistes</a>
<a href = "http://localhost/phpmyadmin" target = "_top">Gestion des salles</a>
<a href = "http://localhost/phpmyadmin" target = "_top">Gestion du Forum</a>
<a href = "gestion-capteur.php" target = "_top">Gestion des Capteurs</a>
<a href = "http://localhost/phpmyadmin" target = "_top">Gestion des évenements</a>
<a href = "log.php" target = "_top">Log des Cpateurs</a>
<h2>Liste des Utilisateurs</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sonotech";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM utilisateur";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo '<table border = "1px">';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Nom</th>';
echo '<th>Prénom</th>';
echo '<th>Date de Naissance</th>';
echo '<th>Adresse Email</th>';
echo '<th>Numéro de Téléphone</th>';
echo '<th>Abonnement</th>';
echo '<th>Action</th>';
echo '<th>Action</th>';
echo '</tr>';
while ($row = $result->fetch_assoc()) {
echo '<tr>';
echo '<td>' . $row["idUtilisateur"] . '</td>';
echo '<td>' . $row["nom"] . '</td>';
echo '<td>' . $row["prenom"] . '</td>';
echo '<td>' . $row["date_de_naissance"] . '</td>';
echo '<td>' . $row["adresse_email"] . '</td>';
echo '<td>' . $row["numero_de_telephone"] . '</td>';
echo '<td>' . $row["abonnement_idAbonnement"] . '</td>';
echo '<td><a href = "modifier.php?id=' . $row["idUtilisateur"] . '">Modifier</a></td>';
echo '<td><a href = "supprimer.php?id=' . $row["idUtilisateur"] . '">Supprimer</a></td>';
echo '</tr>';
}
echo '</table>';
} else {
echo "Aucun utilisateur trouvé.";
}
$conn->close();
?>
<form method = "" action = "ajouter-utilisateur.php">
<input type = "hidden" name = "action" value = "Ajouter">
<input type = "submit" value = "Ajouter un utilisateur">
</form>
</div>
<footer>
<iframe src = "../commun/footer.php"></iframe> 
</footer>
</body>
</html>
