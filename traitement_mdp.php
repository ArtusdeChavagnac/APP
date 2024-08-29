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
if (isset($_SESSION['utilisateur_connecte'])){
$idUtilisateur = $_SESSION['utilisateur_id'];
} else {
echo "<script>window.location.href = 'connexion.php'</script>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Récupérer les données du formulaire
$oldPassword = $_POST["oldpsd"];
$newPassword = $_POST["psd"];
$confirmPassword = $_POST["confpsd"];
// Vérifier si le mot de passe actuel est correct (vous pouvez utiliser la session pour récupérer l'ID de l'utilisateur actuel)
$query = $bdd->prepare("SELECT mot_de_passe FROM utilisateur WHERE idUtilisateur = ?");
$query->execute([$idUtilisateur]);
$userData = $query->fetch(PDO::FETCH_ASSOC);
if (password_verify($oldPassword, $userData['mot_de_passe'])) {
// Mot de passe actuel correct, vérifier si les nouveaux mots de passe correspondent
if ($newPassword == $confirmPassword) {
// Mettre à jour le mot de passe dans la base de données
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
$updateQuery = $bdd->prepare("UPDATE utilisateur SET mot_de_passe = ? WHERE idUtilisateur = ?");
$updateQuery->execute([$hashedPassword, $idUtilisateur]);
// Rediriger l'utilisateur vers la page de profil ou une autre page appropriée
header("Location: moncompte.php");
exit();
} else {
echo "<script>alert('Les nouveaux mots de passe ne correspondent pas.')
window.location.href = 'modifier_mdp.php'</script>";
echo "Les nouveaux mots de passe ne correspondent pas.";
}
} else {
echo "<script>alert('Mot de passe actuel incorrect.')
window.location.href = 'modifier_mdp.php'</script>";
}
}
?>
