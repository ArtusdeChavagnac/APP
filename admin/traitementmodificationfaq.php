<?php
require("../connexion_bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idfaq']) && isset($_POST['texte']) && isset($_POST['reponse'])) {
    $faqId = $_POST['idfaq'];
    $question = $_POST['texte'];
    $reponse = $_POST['reponse'];

    // Utilisez une requête préparée pour éviter les injections SQL
    $stmt = $conn->prepare("UPDATE faq SET texte = ?, reponse = ? WHERE idfaq = ?");
    $stmt->bind_param("ssi", $question, $reponse, $faqId);

    if ($stmt->execute()) {
        // Rediriger vers la page gestionfaq.php après la modification
        header("Location: gestionfaq.php");
        exit();
    } else {
        echo "Erreur lors de la modification : " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Erreur : Données manquantes.";
}

$conn->close();
?>
