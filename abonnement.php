<?php
include "connexion-bdd.php";
session_start();
if (!isset($_SESSION["utilisateur_connecte"])) {
header("Location: connexion.php");
exit();
}
// $user_id = $_SESSION["idUtilisateur"];
$abo_id = $_SESSION["utilisateur_abonnement_idAbonnement"];
echo $abo_id;
mysqli_close($conn);
?>
