<?php
require("../connexion_bdd.php");

// Check if the artist ID is set
if (isset($_GET['id'])) {
    $artisteId = $_GET['id'];

    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare("DELETE FROM artiste WHERE idArtiste = ?");
    $stmt->bind_param("i", $artisteId);

    if ($stmt->execute()) {
        // Redirect back to the artist management page after successful deletion
        header("Location: gestionartiste.php");
        exit();
    } else {
        echo "Erreur lors de la suppression : " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "ID de l'artiste non spécifié.";
}

// Close the database connection
$conn->close();
?>