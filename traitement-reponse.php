<?php
include 'connexion-bdd.php';
session_start();
$question_id = $_POST['question_id'];
$reponse = $_POST['reponse'];
$user_id = $_SESSION['utilisateur_id'];
$sql = "insert into reponses (question_id, reponse, user_id) values ('$question_id', '$reponse', '$user_id')";
if ($conn -> query($sql) === TRUE) {
echo "<script>alert('Réponse ajoutée avec succès.')
window.location.href = 'forum.php';</script>";
} else {
echo "Erreur: " . $sql . "<br>" . $conn -> error;
}
$conn -> close();
?>