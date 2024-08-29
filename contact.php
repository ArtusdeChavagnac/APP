<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$prenom = htmlspecialchars($_POST["prenom"]);
$email = htmlspecialchars($_POST["email"]);
$message = htmlspecialchars($_POST["message"]);
$destinataire = "sonotech.entreprise@outlook.fr";
$sujet = "Nouveau message de contact de $prenom";
$corps_message = "Nom: $prenom\n";
$corps_message .= "Adresse e-mail: $email\n";
$corps_message .= "Message:\n$message";
mail($destinataire, $sujet, $corps_message);
header("Location: contacter.php");
exit();
}
?>
