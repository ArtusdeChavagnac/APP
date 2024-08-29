<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sonotech";
try {
$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
echo "La connexion à la base de données a échoué : " . $e -> getMessage();
}
if (isset($_SESSION['utilisateur_connecte'])){
$idUtilisateur = $_SESSION['utilisateur_id'];
} else {
echo "<script>window.location.href = 'connexion.php'</script>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$oldPassword = $_POST["oldpsd"];
$newPassword = $_POST["psd"];
$confirmPassword = $_POST["confpsd"];
$query = $bdd -> prepare("select mot_de_passe from utilisateur where idUtilisateur = ?");
$query -> execute([$idUtilisateur]);
$userData = $query -> fetch(PDO::FETCH_ASSOC);
if (password_verify($oldPassword, $userData['mot_de_passe'])) {
if ($newPassword == $confirmPassword) {
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
$updateQuery = $bdd -> prepare("update utilisateur set mot_de_passe = ? where idUtilisateur = ?");
$updateQuery -> execute([$hashedPassword, $idUtilisateur]);
header("Location: mon-compte.php");
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
