<?php

include "connexion-bdd.php";
session_start();
if (!isset($_SESSION["utilisateur_connecte"])) {
	header("Location: connexion.php");
	exit();
}
// $user_id = $_SESSION["idUtilisateur"];
echo $_SESSION["utilisateur_abonnement_idAbonnement"];
mysqli_close($conn);

?>