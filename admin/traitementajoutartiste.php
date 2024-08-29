<?php
require("../connexion_bdd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Récupérer les données du formulaire
$pseudo = $_POST['pseudo'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresseEmail = $_POST['adresse_email'];
$numeroTelephone = $_POST['numero_de_telephone'];
$styleDeMusique = $_POST['style_de_musique'];
// Préparer la requête SQL d'insertion
$sql = "INSERT INTO artiste (pseudo, nom, prenom, adresse_email, numero_de_telephone, style_de_musique) VALUES (?, ?, ?, ?, ?, ?)";
// Préparer et exécuter la requête en utilisant les déclarations préparées
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $pseudo, $nom, $prenom, $adresseEmail, $numeroTelephone, $styleDeMusique);
if ($stmt->execute()) {
// Redirection vers la page gestionartiste après l'ajout réussi
header("Location: gestionartiste.php");
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
?>