<?php
include 'connexion_bdd.php';
session_start();
echo "<p>Vous êtes connecté en tant que " . $_SESSION['utilisateur_id'] . "</p>";

$question = $_POST['question'];
$user_id = $_SESSION['utilisateur_id']; 

$sql = "INSERT INTO forum (question, user_id) VALUES ('$question', '$user_id')";

if ($conn->query($sql) === TRUE) {
    echo "Question ajoutée avec succès.";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>