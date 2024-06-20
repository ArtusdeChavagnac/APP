<?php

session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
    if ($_SESSION['utilisateur_abonnement_idAbonnement'] != 2) {
        echo "<script>window.location.href = '../index.php'</script> " ;
    } 
} else {
    echo "<script>window.location.href = '../index.php'</script> " ;
}

/// Inclure le fichier de connexion à la base de données
require("../connexion_bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $capteurId = $_POST['idCapteur_sonore'];
    $position = $_POST['position'];
    $date = $_POST['date'];
    $niveauSonore = $_POST['niveau_sonore'];

    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO capteur_sonore (position, `date`, niveau_sonore) VALUES (?, ?, ?)";

    // Préparer et exécuter la requête en utilisant les déclarations préparées
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssd", $position, $date, $niveauSonore);  // Utiliser "d" pour le type de données double

    if ($stmt->execute()) {
        // Redirection vers la page gestioncapteur après l'ajout réussi
        header("Location: gestioncapteur.php");
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
