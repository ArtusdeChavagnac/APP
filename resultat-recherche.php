<?php
// Connexion à la base de données (à remplacer par vos propres informations)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdd_sonotech";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupérer les mots-clés de recherche depuis l'URL
$keywords = isset($_GET['q']) ? $_GET['q'] : '';

// Échapper les caractères spéciaux pour éviter les injections SQL (méthode simplifiée)
$keywords = mysqli_real_escape_string($conn, $keywords);

// Requête de recherche
$sql = "SELECT * FROM concert WHERE date LIKE '%$keywords%' OR heure_debut LIKE '%$keywords%' OR salle_idSalle IN (SELECT idSalle FROM salle WHERE adresse LIKE '%$keywords%')";
$result = $conn->query($sql);

// Affichage des résultats
if ($result->num_rows > 0) {
    echo "<p>Résultats pour : <strong>$keywords</strong></p>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>Date : " . $row["date"] . " | Heure de début : " . $row["heure_debut"] . " | Salle : " . $row["salle_idSalle"] . "</p>";
    }
} else {
    echo "<p>Aucun résultat trouvé pour : <strong>$keywords</strong></p>";
}

// Fermer la connexion à la base de données
$conn->close();
?>
