<?php
include 'connexion_bdd.php';

$sql = "SELECT forum.*, utilisateur.prenom AS user_prenom FROM forum INNER JOIN utilisateur ON forum.user_id = idUtilisateur";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["user_prenom"]. "</strong>: " . $row["question"] . "</p>";

        $sql_reponses = "SELECT reponses.*, utilisateur.prenom AS user_prenom FROM reponses INNER JOIN utilisateur ON reponses.user_id = idUtilisateur WHERE reponses.question_id = " . $row["id"];
        $result_reponses = $conn->query($sql_reponses);

        if ($result_reponses->num_rows > 0) {
            while($row_reponse = $result_reponses->fetch_assoc()) {
                echo "<p> - <strong>" . $row_reponse["user_prenom"]. "</strong>: " . $row_reponse["reponse"] . "</p>";
            }
        }

        echo "<form method='post' action='traitement_reponse.php'>
                <input type='hidden' name='question_id' value='" . $row["id"] . "'>
                <label for='reponse'>Votre réponse:</label>
                <textarea name='reponse' required></textarea>
                <input type='submit' value='Répondre'>
              </form>";
    }
} else {
    echo "Aucune question pour le moment.";
}

$conn->close();
?>