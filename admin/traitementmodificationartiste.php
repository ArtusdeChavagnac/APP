<?php
require("../connexion-bdd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idArtiste'])) {
$artisteId = $_POST['idArtiste'];
$pseudo = $_POST['pseudo'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresseEmail = $_POST['adresse_email'];
$numeroTelephone = $_POST['numero_de_telephone'];
$styleDeMusique = $_POST['style_de_musique'];
$stmt = $conn->prepare("UPDATE artiste SET pseudo = ?, nom = ?, prenom = ?, adresse_email = ?, numero_de_telephone = ?, style_de_musique = ? WHERE idArtiste = ?");
$stmt->bind_param("ssssssi", $pseudo, $nom, $prenom, $adresseEmail, $numeroTelephone, $styleDeMusique, $artisteId);
if ($stmt->execute()) {
header("Location: gestionartiste.php");
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