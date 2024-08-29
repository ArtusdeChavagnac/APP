<?php
session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
if ($_SESSION['utilisateur_abonnement_idAbonnement'] != 2) {
echo "<script>window.location.href = '../index.php'</script> " ;
} 
} else {
echo "<script>window.location.href = '../index.php'</script> " ;
}
// supprimer.php
require("../connexion_bdd.php");
if (isset($_GET['id'])) {
$userId = $_GET['id'];
// Delete the user from the database
$query = $conn->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, adresse_email = ?, numero_de_telephone = ?, date_de_naissance = ?,mot_de_passe =? WHERE idUtilisateur = ?");
$query->execute(["erased","erased","erased","erased","2000-01-01","erased",$userId]);
// Redirect back to the dashboard or any other appropriate page
header("Location: dashboard.php");
exit();
} else {
echo "ID d'utilisateur non spécifié.";
}
?>