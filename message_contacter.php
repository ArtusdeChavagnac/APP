<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Récupérer les données du formulaire
$nom = $_POST["nom"];
$email = $_POST["email"];
$message = $_POST["message"];
// Adresse e-mail du destinataire (sonotech.entreprise@outlook.fr)
$destinataire = "sonotech.entreprise@outlook.fr";
$sujet = "Nouveau message de contact depuis le site";
$corps_message = "Nom : $nom \n\nEmail : $email \n\nMessage : \n$message";
$entete = "From: $nom <$email>";
// Envoyer l'e-mail
mail($destinataire, $sujet, $corps_message, $entete);
// Redirection vers une page de confirmation
header("Location: confirmation.php");
exit;
}
?>
