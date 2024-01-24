<?php
session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
    if ($_SESSION['utilisateur_abonnement_idAbonnement'] != 2) {
        echo "<script>window.location.href = '../index.php'</script> " ;
    } 
} else {
    echo "<script>window.location.href = '../index.php'</script> " ;
}

require("../connexion_bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idfaq']) && isset($_POST['texte']) && isset($_POST['reponse'])) {
    $faqId = $_POST['idfaq'];
    $question = $_POST['texte'];
    $reponse = $_POST['reponse'];

    // Utilisez une requête préparée pour éviter les injections SQL
    $stmt = $conn->prepare("UPDATE faq SET texte = ? WHERE idfaq = ?");
    $stmt->bind_param("si", $question, $faqId);
    $stmt2 = $conn->prepare("UPDATE reponse_faq SET texte = ?  WHERE faq_idFaq = ?");
    $stmt2->bind_param("si",$reponse, $faqId);

    if ($stmt->execute() AND $stmt2->execute()) {
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