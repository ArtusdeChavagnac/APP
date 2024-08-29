<?php

include "connexion-bdd.php";
session_start();
if (!isset($_SESSIon["utilisateur_connecte"])) {
	header("Location: connexion.php");
	exit();
}
// $user_id = $_SESSIon["idUtilisateur"];
echo $_SESSIon["utilisateur_abonnement_idAbonnement"];
mysqli_close($conn);

?>