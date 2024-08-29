<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sonotech";
try {
$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTIon));
} catch (PDOException $e) {
echo "La connexion à la base de données a échoué : " . $e -> getMessage();
}
if (isset($_SESSIon['utilisateur_connecte'])) {
$idUtilisateur = $_SESSIon['utilisateur_id'];
} else {
echo "<script>window.location.href = 'connexion.php'</script>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["mail"];
$telephone = $_POST["numero_de_telephone"];
$date_naissance = $_POST["date_de_naissance"];
$query = $bdd -> prepare("update utilisateur set nom = ?, prenom = ?, adresse_email = ?, numero_de_telephone = ?, date_de_naissance = ? where idUtilisateur = ?");
$query -> execute([$nom, $prenom, $email, $telephone, $date_naissance, $idUtilisateur]);
$_SESSIon['utilisateur_nom'] = $nom;
$_SESSIon['utilisateur_prenom'] = $prenom;
$_SESSIon['utilisateur_adresse_email'] = $email;
$_SESSIon['utilisateur_numero_de_telephone'] = $telephone;
$_SESSIon['utilisateur_date_de_naissance'] = $date_naissance;
header("Location: mon-compte.php"); 
}
?>
