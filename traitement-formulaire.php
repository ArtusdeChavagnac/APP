<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sonotech";
try {
$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
echo "La connexion à la base de données a échoué : " . $e->getMessage();
}
if (isset($_SESSION['utilisateur_connecte'])) {
$idUtilisateur = $_SESSION['utilisateur_id'];
} else {
echo "<script>window.location.href = 'connexion.php'</script>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["mail"];
$telephone = $_POST["numero_de_telephone"];
$date_naissance = $_POST["date_de_naissance"];
$query = $bdd->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, adresse_email = ?, numero_de_telephone = ?, date_de_naissance = ? WHERE idUtilisateur = ?");
$query->execute([$nom, $prenom, $email, $telephone, $date_naissance, $idUtilisateur]);
$_SESSION['utilisateur_nom'] = $nom;
$_SESSION['utilisateur_prenom'] = $prenom;
$_SESSION['utilisateur_adresse_email'] = $email;
$_SESSION['utilisateur_numero_de_telephone'] = $telephone;
$_SESSION['utilisateur_date_de_naissance'] = $date_naissance;
header("Location: mon-compte.php"); 
}
?>
