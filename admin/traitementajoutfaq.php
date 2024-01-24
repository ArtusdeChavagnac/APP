<?php

session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
    if ($_SESSION['utilisateur_abonnement_idAbonnement'] != 2) {
        echo "<script>window.location.href = '../index.php'</script> " ;
    } 
} else {
    echo "<script>window.location.href = '../index.php'</script> " ;
}

// Inclure le fichier de connexion à la base de données
require("../connexion_bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $question = $_POST["texte"];
    $reponse = $_POST["reponse"];

    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO faq (texte, reponse) VALUES (?, ?)";

    // Préparer et exécuter la requête en utilisant les déclarations préparées
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $question, $reponse);

    if ($stmt->execute()) {
        // Redirection vers la page gestionfaq après l'ajout réussi
        header("Location: gestionfaq.php");
        exit();
    } else {
        // En cas d'erreur lors de l'exécution de la requête
        echo "Erreur lors de l'ajout : " . $stmt->error;
    }

    // Fermer la déclaration préparée
    $stmt->close();
}

// Fermer la connexion à la base de données
$conn->close();
?>