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
$sql = "INSERT INTO faq (texte, date) VALUES (?, NOW())"; // Utilisation de la fonction MySQL NOW() pour la date actuelle
// Préparer et exécuter la requête en utilisant les déclarations préparées
$stmt = $conn->prepare($sql);
// Vérifier si la préparation de la requête a réussi
if ($stmt) {
// Binder les paramètres et exécuter la requête
$stmt->bind_param("s", $question);
if ($stmt->execute()) {
// Récupérer l'ID de la FAQ nouvellement insérée
$faqId = $stmt->insert_id;
// Préparer la requête SQL d'insertion pour la réponse
$sqlReponse = "INSERT INTO reponse_faq (texte, date, faq_idFaq) VALUES (?, NOW(), ?)";
// Préparer et exécuter la requête pour la réponse
$stmtReponse = $conn->prepare($sqlReponse);
// Vérifier si la préparation de la requête pour la réponse a réussi
if ($stmtReponse) {
// Binder les paramètres et exécuter la requête pour la réponse
$stmtReponse->bind_param("si", $reponse, $faqId);
if ($stmtReponse->execute()) {
// Redirection vers la page gestionfaq après l'ajout réussi
header("Location: gestionfaq.php");
exit();
} else {
// En cas d'erreur lors de l'exécution de la requête pour la réponse
echo "Erreur lors de l'exécution de la requête pour la réponse : " . $stmtReponse->error;
}
// Fermer la déclaration préparée pour la réponse
$stmtReponse->close();
} else {
// En cas d'échec de la préparation de la requête pour la réponse
echo "Erreur lors de la préparation de la requête pour la réponse : " . $conn->error;
}
} else {
// En cas d'erreur lors de l'exécution de la requête pour la FAQ
echo "Erreur lors de l'exécution de la requête pour la FAQ : " . $stmt->error;
}
// Fermer la déclaration préparée pour la FAQ
$stmt->close();
} else {
// En cas d'échec de la préparation de la requête pour la FAQ
echo "Erreur lors de la préparation de la requête pour la FAQ : " . $conn->error;
}
// Fermer la connexion à la base de données
$conn->close();
}