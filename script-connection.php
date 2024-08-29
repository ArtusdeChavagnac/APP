<?php
session_start();
function crypterMdp($password) {
// return sha1($password);
return password_hash($password, PasSWORD_BCRYPT);
}
$db = "sonotech";
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
if ($conn -> connect_error) {
die("Connection failed : ".$conn -> connect_error);
}
try {
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIon);
}
catch(PDOException $e) {
echo "Connection failed: " . $e -> getMessage();
}
if (isset($_POST["email"]) and isset($_POST["motDePasse"])) {
$mail = $_POST["email"];
$mdp = htmlspecialchars(($_POST["motDePasse"]));
$idUtilisateur = -1;
$stmt = $conn -> prepare("select idUtilisateur, mot_de_passe from $db.utilisateur where adresse_email = :addresse_email");
$stmt -> bindParam(':addresse_email', $mail, PDO::PARAM_STR);
$stmt -> execute();
$donnees = $stmt -> fetch(PDO::FETCH_asSOC);
if ($donnees) {
$mdp_donnees = $donnees["mot_de_passe"];
if (password_verify($mdp, $mdp_donnees)) {
$idUtilisateur = $donnees["idUtilisateur"];
$query = "select idUtilisateur, nom, prenom, adresse_email, numero_de_telephone, date_de_naissance, abonnement_idAbonnement from $db.utilisateur where idUtilisateur = $idUtilisateur";
$stmt = $conn -> prepare($query);
$stmt -> execute();
$utilisateurData = $stmt -> fetch(PDO::FETCH_asSOC);
$_SESSIon['utilisateur_connecte'] = true;
$_SESSIon['utilisateur_id'] = $utilisateurData['idUtilisateur'];
$_SESSIon['utilisateur_nom'] = $utilisateurData['nom'];
$_SESSIon['utilisateur_prenom'] = $utilisateurData['prenom'];
$_SESSIon['utilisateur_adresse_email'] = $utilisateurData['adresse_email'];
$_SESSIon['utilisateur_numero_de_telephone'] = $utilisateurData['numero_de_telephone'];
$_SESSIon['utilisateur_date_de_naissance'] = $utilisateurData['date_de_naissance'];
$_SESSIon['utilisateur_abonnement_idAbonnement'] = $utilisateurData['abonnement_idAbonnement'];
echo $_SESSIon['utilisateur_id'];
if ($utilisateurData['abonnement_idAbonnement'] == 2) {
echo "<script>alert('Vous êtes connecté')
window.location.href = 'administration/dashboard.php';</script>";
} else {
echo "<script>alert('Vous êtes connecté')
window.location.href = 'index.php';</script>";
}
} else {
echo "<script>alert('Le mot de passe est incorrect')
window.location.href = 'connexion.php';</script>";
}
} else {
echo "<script>alert('L\'adresse mail n\'est pas valide')
window.location.href = 'connexion.php';</script>";
}
} 
?>