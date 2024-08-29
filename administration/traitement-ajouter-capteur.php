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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$capteurId = $_POST['idCapteur_sonore'];
$position = $_POST['position'];
$date = $_POST['date'];
$niveauSonore = $_POST['niveau_sonore'];
$sql = "insert into capteur_sonore (position, `date`, niveau_sonore) values (?, ?, ?)";
$stmt = $conn -> prepare($sql);
$stmt -> bind_param("ssd", $position, $date, $niveauSonore);
if ($stmt -> execute()) {
header("Location: gestion-capteur.php");
exit();
} else {
echo "Erreur lors de l'ajout : " . $stmt -> error;
}
$stmt -> close();
}
$conn -> close();
