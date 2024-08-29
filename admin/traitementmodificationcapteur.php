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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idCapteur_sonore']) && isset($_POST['position']) && isset($_POST['niveau_sonore']) && isset($_POST['date'])) {
$capteurId = $_POST['idCapteur_sonore'];
$position = $_POST['position'];
$date = $_POST['date'];
$niveauSonore = $_POST['niveau_sonore'];
$stmt = $conn->prepare("UPDATE capteur_sonore SET position = ?, `date` = ? ,niveau_sonore = ? WHERE idCapteur_sonore = ?");
$stmt->bind_param("ssii", $position, $date, $niveauSonore, $capteurId);
if ($stmt->execute()) {
header("Location: gestioncapteur.php");
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
