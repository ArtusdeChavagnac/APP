<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sonotech";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Exemple de requête pour récupérer des données (à adapter selon vos besoins)
$query = "SELECT * FROM concert WHERE date >= NOW()";

$result = $conn->query($query);

// Vérifier si la requête a renvoyé des résultats
if ($result->num_rows > 0) {
    // Afficher les données
    while ($row = $result->fetch_assoc()) {
        echo "ID du concert : " . $row["idConcert"] . "<br>";
        echo "Image : " . $row["image"] . "<br>";
        echo "Date : " . $row["date"] . "<br>";
        // Ajoutez d'autres champs selon vos besoins
        echo "<hr>";
    }
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
