<?php
// supprimer.php
require("../connexion_bdd.php");

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete the user from the database
    $sqlDelete = "DELETE FROM utilisateur WHERE idUtilisateur=$userId";
    $conn->query($sqlDelete);

    // Redirect back to the dashboard or any other appropriate page
    header("Location: dashboard.php");
    exit();
} else {
    echo "ID d'utilisateur non spécifié.";
}
?>