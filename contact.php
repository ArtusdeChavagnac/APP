<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Adresse e-mail de destination
    $destinataire = "sonotech.entreprise@outlook.fr";

    // Sujet du message
    $sujet = "Nouveau message de contact de $prenom";

    // Corps du message
    $corps_message = "Nom: $prenom\n";
    $corps_message .= "Adresse e-mail: $email\n";
    $corps_message .= "Message:\n$message";

    // Envoi du message par e-mail
    mail($destinataire, $sujet, $corps_message);

    // Redirection après l'envoi du formulaire (vous pouvez personnaliser l'URL)
    header("Location: contacter.php");
    exit();
}
?>

