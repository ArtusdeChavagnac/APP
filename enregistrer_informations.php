<?php
include 'connexion_bdd.php';

session_start();
if (!isset($_SESSION['idUtilisateur'])) {
    header('Location: connexion.php');
    exit();
}

$idUtilisateur = $_SESSION['idUtilisateur'];

// Récupérer les données envoyées par la requête AJAX
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse_email = $_POST['adresse_email'];
$numero_de_telephone = $_POST['numero_de_telephone'];
$date_de_naissance = $_POST['date_de_naissance'];
$mot_de_passe = $_POST['mot_de_passe'];

// Mettre à jour la base de données
$query = "UPDATE utilisateur SET nom = '$nom', prenom = '$prenom', adresse_email = '$adresse_email', numero_de_telephone = '$numero_de_telephone', date_de_naissance = '$date_de_naissance', mot_de_passe = '$mot_de_passe' WHERE idUtilisateur = $idUtilisateur";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Succès";
} else {
    echo "Erreur : " . mysqli_error($conn);
}

mysqli_close($conn);
?>
