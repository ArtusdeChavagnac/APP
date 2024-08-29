<?php

include "connexion_bdd.php";
$result = $conn -> query(
	"select forum.*, utilisateur.prenom as user_prenom from forum inner join utilisateur on forum.user_id = idUtilisateur"
);
if ($result -> num_rows > 0) {
	while($row = $result -> fetch_assoc()) {
		echo "<p><strong>" . $row["user_prenom"] . "</strong>: " . $row["question"] . "</p>";
		$result_reponses = $conn -> query(
			"select reponses.*, utilisateur.prenom as user_prenom from reponses inner join utilisateur on reponses.user_id = idUtilisateur where reponses.question_id = " . $row["id"]
		);
		if ($result_reponses -> num_rows > 0) {
			while($row_reponse = $result_reponses -> fetch_assoc()) {
				echo "<p> - <strong>" . $row_reponse["user_prenom"] . "</strong>: " . $row_reponse["reponse"] . "</p>";
			}
		}
		echo "<form method='post' action='traitement-reponse.php'>
		<input type='hidden' name='question_id' value='" . $row["id"] . "'>
		<label for='reponse'>Votre réponse:</label>
		<textarea name='reponse' required></textarea>
		<input type='submit' value='Répondre'>
		</form>";
	}
} else {echo "Aucune question pour le moment.";}
$conn -> close();

?>