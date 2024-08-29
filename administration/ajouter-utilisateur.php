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
<title>Page d'Admin:Ajouter un utilisateur — SonoTech</title>
</head>
<body>
<?php
require("../connexion-bdd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
if ($_POST['action'] === 'Ajouter') {
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$dateDeNaissance = isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : '';
$adresseEmail = isset($_POST['adresse_email']) ? $_POST['adresse_email'] : '';
$numeroTelephone = isset($_POST['numero_de_telephone']) ? $_POST['numero_de_telephone'] : '';
$MotDePasse = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';
$hashedPassword = password_hash($MotDePasse, PASSWORD_DEFAULT);
$sqlInsert = "insert into utilisateur (nom, prenom, date_de_naissance, adresse_email, numero_de_telephone,mot_de_passe) 
values ('$nom', '$prenom', '$dateDeNaissance', '$adresseEmail', '$numeroTelephone','$hashedPassword')";
if ($conn -> query($sqlInsert) === TRUE) {
echo "";
} else {
echo "Erreur lors de l'ajout de l'utilisateur : " . $conn -> error;
}
$conn -> close();
}
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
<title>Ajouter Utilisateur — SonoTech</title>
</head>
<style>
form {
max-width: 400px;
width: 100%;
padding: 20px;
border: 1px solid #ccc;
border-radius: 8px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
form label {
display: block;
margin-bottom: 8px;
}
form input {
width: 100%;
padding: 8px;
margin-bottom: 16px;
box-sizing: border-box;
}
form input[type = "submit"] {
background-color: #4CAF50;
color: white;
cursor: pointer;
}
form input[type = "submit"]:hover {
background-color: #45a049;
}
</style>
<body>
<header>
<iframe src = "../commun/header.php"></iframe>
</header>
<div id = "div-contenu">
<h1>Ajouter un Utilisateur</h1>
<form method = "post" action = "">
<label for = "nom">Nom:</label>
<input type = "text" name = "nom" required>
<label for = "prenom">Prénom:</label>
<input type = "text" name = "prenom" required>
<label for = "date_de_naissance">Date de Naissance:</label>
<input type = "text" name = "date_de_naissance" required>
<label for = "adresse_email">Adresse Email:</label>
<input type = "text" name = "adresse_email" required>
<label for = "numero_de_telephone">Numéro de Téléphone:</label>
<input type = "text" name = "numero_de_telephone" required>
<label for = "Mot de passe">Mot de passe:</label>
<input type = "text" name = "mot_de_passe" required>
<input type = "hidden" name = "action" value = "Ajouter">
<input type = "submit" value = "Ajouter l'utilisateur">
</form>
<a href = "dashboard.php">Retour au tableau de bord</a>
</div>
<footer>
<iframe src = "../commun/footer.php"></iframe> 
</footer>
</body>
</html>