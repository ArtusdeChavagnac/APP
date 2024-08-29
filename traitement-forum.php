<?php
include 'connexion-bdd.php';
session_start();
echo "<p>Vous êtes connecté en tant que " . $_SESSION['utilisateur_id'] . "</p>";
$question = $_POST['question'];
$user_id = $_SESSION['utilisateur_id']; 
$sql = "INSERT INTO forum (question, user_id) VALUES ('$question', '$user_id')";
if ($conn->query($sql) === TRUE) {
echo "<script>alert('Question ajoutée avec succès.')
window.location.href = 'forum.php';</script>";
} else {
echo "Erreur: " . $sql . "<br>" . $conn->error;
echo "<script>window.location.href = 'forum.php';</script>";
}
$conn->close();
?>