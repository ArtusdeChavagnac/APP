<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nom = $_POST["nom"];
$email = $_POST["email"];
$message = $_POST["message"];
$destinataire = "sonotech.entreprise@outlook.fr";
$sujet = "Nouveau message de contact depuis le site";
$corps_message = "Nom : $nom \n\nEmail : $email \n\nMessage : \n$message";
$entete = "From: $nom <$email>";
mail($destinataire, $sujet, $corps_message, $entete);
header("Location: confirmation.php");
exit;
}
?>
