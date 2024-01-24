<?php
// Inclure le fichier de connexion à la base de données
require("../connexion_bdd.php");

// Vérifiez si un identifiant est passé via la requête GET
if(isset($_GET['idCapteur_sonore'])) {
    $capteurId = $_GET['idCapteur_sonore'];

    // Utilisez une requête préparée pour éviter les problèmes de sécurité
    $stmt = $conn->prepare("DELETE FROM capteur_sonore WHERE idCapteur_sonore = ?");
    $stmt->bind_param("i", $capteurId);

    // Exécutez la requête
    if ($stmt->execute()) {
        echo "Le capteur a été supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression : " . $stmt->error;
    }

    // Fermez la requête préparée
    $stmt->close();
} else {
    echo "Erreur : Identifiant de la question/réponse non spécifié.";
}

// Fermez la connexion à la base de données
$conn->close();
?>
