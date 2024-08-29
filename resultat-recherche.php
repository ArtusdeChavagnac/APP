<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sonotech";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("La connexion à la base de données a échoué : " . $conn->connect_error);
}
$query = "SELECT * FROM concert WHERE date >= NOW()";
$result = $conn->query($query);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "ID du concert : " . $row["idConcert"] . "<br>";
echo "Image : " . $row["image"] . "<br>";
echo "Date : " . $row["date"] . "<br>";
echo "<hr>";
}
} else {
echo "Aucun résultat trouvé.";
}
$conn->close();
?>
