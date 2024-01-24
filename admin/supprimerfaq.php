
<?php
// Inclure le fichier de connexion à la base de données
require("../connexion_bdd.php");

// Vérifiez si un identifiant est passé via la requête GET
if(isset($_GET['id'])) {
    $faqId = $_GET['id'];

    // Utilisez une requête préparée pour éviter les problèmes de sécurité
    $stmt = $conn->prepare("DELETE FROM faq WHERE idFaq = ?");
    $stmt->bind_param("i", $faqId);

    // Exécutez la requête
    if ($stmt->execute()) {
        echo "La question/réponse a été supprimée avec succès.";
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
