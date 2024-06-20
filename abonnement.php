<?php

// Inclure le fichier de configuration de la base de données
include 'connexion_bdd.php';

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['utilisateur_connecte'])) {
    header('Location: connexion.php'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Récupérer l'ID de l'utilisateur connecté
//$user_id = $_SESSION['idUtilisateur'];
$abo_id = $_SESSION['utilisateur_abonnement_idAbonnement'];



echo $abo_id;

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
