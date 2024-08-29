<?php
session_start();
if (isset($_SESSIon['utilisateur_abonnement_idAbonnement'])) {
if ($_SESSIon['utilisateur_abonnement_idAbonnement'] != 2) {
echo "<script>window.location.href = '../index.php'</script>";
} 
} else {
echo "<script>window.location.href = '../index.php'</script>";
}
require("../connexion-bdd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$question = $_POST["texte"];
$reponse = $_POST["reponse"];
$sql = "INSERT INTO faq (texte, date) VALUES (?, NOW())";
$stmt = $conn -> prepare($sql);
if ($stmt) {
$stmt -> bind_param("s", $question);
if ($stmt -> execute()) {
$faqId = $stmt -> insert_id;
$sqlReponse = "INSERT INTO reponse_faq (texte, date, faq_idFaq) VALUES (?, NOW(), ?)";
$stmtReponse = $conn -> prepare($sqlReponse);
if ($stmtReponse) {
$stmtReponse -> bind_param("si", $reponse, $faqId);
if ($stmtReponse -> execute()) {
header("Location: gestion-faq.php");
exit();
} else {
echo "Erreur lors de l'exécution de la requête pour la réponse : " . $stmtReponse -> error;
}
$stmtReponse -> close();
} else {
echo "Erreur lors de la préparation de la requête pour la réponse : " . $conn -> error;
}
} else {
echo "Erreur lors de l'exécution de la requête pour la FAQ : " . $stmt -> error;
}
$stmt -> close();
} else {
echo "Erreur lors de la préparation de la requête pour la FAQ : " . $conn -> error;
}
$conn -> close();
}