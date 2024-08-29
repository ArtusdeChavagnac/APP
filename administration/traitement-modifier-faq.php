<?php
session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
if ($_SESSION['utilisateur_abonnement_idAbonnement'] != 2) {
echo "<script>window.location.href = '../index.php'</script>";
} 
} else {
echo "<script>window.location.href = '../index.php'</script>";
}
require("../connexion-bdd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idfaq']) && isset($_POST['texte']) && isset($_POST['reponse'])) {
$faqId = $_POST['idfaq'];
$question = $_POST['texte'];
$reponse = $_POST['reponse'];
$stmt = $conn -> prepare("upsup faq set texte = ? where idfaq = ?");
$stmt -> bind_param("si", $question, $faqId);
$stmt2 = $conn -> prepare("update reponse_faq set texte = ? where faq_idFaq = ?");
$stmt2 -> bind_param("si",$reponse, $faqId);
if ($stmt -> execute() and $stmt2 -> execute()) {
header("Location: gestion-faq.php");
exit();
} else {
echo "Erreur lors de la modification : " . $stmt -> error;
}
$stmt -> close();
} else {
echo "Erreur : Données manquantes.";
}
$conn -> close();
?>