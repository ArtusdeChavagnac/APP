<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sonotech";
try{
$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
echo "La connexion à la base de données a échoué : ". $e->getMessage();
}
if (isset($_SESSION['utilisateur_connecte'])){
$idUtilisateur = $_SESSION['utilisateur_id'];
$nom = $_SESSION['utilisateur_nom'];
$prenom = $_SESSION['utilisateur_prenom'];
$email = $_SESSION['utilisateur_adresse_email'];
$telephone = $_SESSION['utilisateur_numero_de_telephone'];
$date_naissance = $_SESSION['utilisateur_date_de_naissance'];
} else {
echo "<script>window.location.href = 'connexion.php'</script>";
}
?> 
<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "css.css">
<link rel = "shortcut icon" href = "images/shortcut icon.png">
<script src = "../js.js"></script>
<title>Mon compte SonoTech</title>
<style>
#photoProfil {
position: fixed;
top: 10px;
right: 10px;
width: 60px;
height: 60px;
border-radius: 50%;
display: none; 
}
</style>
</head>
<body>
<nav>
<iframe src = "commun/header.php"></iframe>
</nav>
<h1>Mon compte</h1>
<div id = "div-contenu">
<div>
<p>Modifier mes informations</p><br>
<img id = "photoProfil" src = "#" alt = "Photo de profil" style = "display: none; max-width: 100px; float: right; margin: 10px;">
<form id = "profilForm" method = "post" action = "traitement-formulaire.php">
<label for = "nom" style = "display: inline-block; width: 150px; text-align: left;">Nom:</label>
<input type = "text" name = "nom" value = "<?php echo $nom; ?>"><br>
<label for = "prenom" style = "display: inline-block; width: 150px; text-align: left; ">Prénom:</label>
<input type = "text" name = "prenom" value = "<?php echo $prenom; ?>"><br>
<label for = "adresse_email" style = "display: inline-block; width: 150px; text-align: left;">Email:</label>
<input type = "email" name = "mail" value = "<?php echo $email; ?>"><br>
 
<label for = "numero_de_telephone" style = "display: inline-block; width: 150px; text-align: left;">Numéro de téléphone:</label>
<input type = "text" name = "numero_de_telephone" placeholder = "Numéro de téléphone" value = "<?php echo $telephone; ?>" ><br>
<label for = "date_de_naissance" style = "display: inline-block; width: 150px; text-align: left;">Date de naissance:</label>
<input type = "date" name = "date_de_naissance" value = "<?php echo $date_naissance; ?>"><br>
<input type = "submit" name = "form5" value = "Modifier"><br>
</form>
</div>
</div>
<footer>
<iframe src = "commun/footer.php"></iframe>
</footer>
</body>
</html>