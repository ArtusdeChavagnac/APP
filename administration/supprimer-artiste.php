<?php
require("../connexion-bdd.php");
if (isset($_GET['id'])) {
$artisteId = $_GET['id'];
$stmt = $conn -> prepare("delete from artiste where idArtiste = ?");
$stmt -> bind_param("i", $artisteId);
if ($stmt -> execute()) {
header("Location: gestion-artiste.php");
exit();
} else {
echo "Erreur lors de la suppression : " . $stmt -> error;
}
$stmt -> close();
} else {
echo "ID de l'artiste non spécifié.";
}
$conn -> close();
?>