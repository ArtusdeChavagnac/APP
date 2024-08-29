<?php
require("../connexion-bdd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$pseudo = $_POST['pseudo'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresseEmail = $_POST['adresse_email'];
$numeroTelephone = $_POST['numero_de_telephone'];
$styleDeMusique = $_POST['style_de_musique'];
$sql = "INSERT INTO artiste (pseudo, nom, prenom, adresse_email, numero_de_telephone, style_de_musique) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $pseudo, $nom, $prenom, $adresseEmail, $numeroTelephone, $styleDeMusique);
if ($stmt->execute()) {
header("Location: gestionartiste.php");
exit();
} else {
echo "Erreur lors de l'ajout : " . $stmt->error;
}
$stmt->close();
}
$conn->close();
?>