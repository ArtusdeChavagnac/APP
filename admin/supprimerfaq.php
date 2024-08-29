<?php
session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
if ($_SESSION['utilisateur_abonnement_idAbonnement'] != 2) {
echo "<script>window.location.href = '../index.php'</script> " ;
} 
} else {
echo "<script>window.location.href = '../index.php'</script> " ;
}
require("../connexion-bdd.php");
if(isset($_GET['id'])) {
$faqId = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM faq WHERE idFaq = ?");
$stmt->bind_param("i", $faqId);
if ($stmt->execute()) {
echo "La question/réponse a été supprimée avec succès.";
} else {
echo "Erreur lors de la suppression : " . $stmt->error;
}
$stmt->close();
} else {
echo "Erreur : Identifiant de la question/réponse non spécifié.";
}
$conn->close();
?>
