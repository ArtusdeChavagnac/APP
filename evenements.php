<?php
session_start();
$db = 'sonotech';
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername,$username,$password);
if ($conn->connect_error) {
die("Connection failed : ".$conn->connect_error);
}
try {
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
$query = "SELECT idConcert FROM $db.concert";
$stmt = $conn->prepare($query);
$stmt->execute();
$idConcert = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel = "stylesheet" href = "stylesheet.css">
<link rel = "shortcut icon" href = "images/shortcut icon.png">
<script src = "script.js"></script>
<title>Événements — SonoTech</title>
</head>
<body>
<header><iframe src = "communs/header.php"></iframe></header>
<div id = "div-contenu">
<h1>Événements</h1>
<p>Voici les prochains événements auxquels nous participons.</p>
<p>Rechercher par date :</p>
<form action = "evenements.php" method = "get">
<input type = "date" name = "date">
<button>Rechercher</button>
</form>
<table>
<tr>
<th>Date</th>
<th>Heure début</th>
<th>Durée</th>
<th>Adresse</th>
<th>Artistes</th>
<th>Niveau sonore moyen</th>
</tr>
<?php
echo"<tr>";
foreach($idConcert as $idConcert){
$idConcert = $idConcert['idConcert'];
$query = "SELECT date, duree, heure_debut, salle_idSalle FROM $db.concert WHERE idConcert = $idConcert";
$stmt = $conn->prepare($query);
$stmt->execute();
$concertData = $stmt->fetch(PDO::FETCH_ASSOC);
$idSalle = $concertData['salle_idSalle'];
$query = "SELECT adresse,capteur_sonore_idCapteur_sonore FROM $db.salle WHERE idSalle = $idSalle";
$stmt = $conn->prepare($query);
$stmt->execute();
$salleData = $stmt->fetch(PDO::FETCH_ASSOC);
$idCapteur_sonore = $salleData['capteur_sonore_idCapteur_sonore'];
$query = "SELECT artiste_idArtiste FROM $db.concert_has_artiste WHERE concert_idConcert= $idConcert";
$stmt = $conn->prepare($query);
$stmt->execute();
$idArtiste = $stmt->fetchAll(PDO::FETCH_ASSOC);
$artisteData = array();
foreach($idArtiste as $artiste){
$artiste = $artiste['artiste_idArtiste'];
$query = "SELECT pseudo FROM $db.artiste WHERE idArtiste = $artiste";
$stmt = $conn->prepare($query);
$stmt->execute();
$artisteData[] = $stmt->fetch(PDO::FETCH_ASSOC);
}
$query = "SELECT niveau_sonore FROM $db.capteur_sonore WHERE idCapteur_sonore = $idCapteur_sonore";
$stmt = $conn->prepare($query);
$stmt->execute();
$niveau_sonore = $stmt->fetch(PDO::FETCH_ASSOC);
$date = $concertData["date"];
$heure_debutRaw = $concertData["heure_debut"];
$heure_debut = str_split($heure_debutRaw, strlen($heure_debutRaw) / 2);
$duree = $concertData["duree"];
$dureeH = substr($duree, 0, 1);
$dureeM = substr($duree, 1); 
$adresse = $salleData["adresse"];
$niveau_sonore = $niveau_sonore['niveau_sonore'];
echo "<td>$date</td>";
echo "<td>$heure_debut[0]H$heure_debut[1]</td>";
echo "<td>$dureeH H$dureeM</td>";
echo "<td>$adresse</td>";
echo "<td>";
foreach($artisteData as $artiste){
$artiste = $artiste['pseudo'];
echo "$artiste ";
}
echo "</td>";
echo "<td>$niveau_sonore </td>";
echo "</tr>";
}
?>
</tr>
</table>
</div>
<footer><iframe src = "communs/footer.php"></iframe></footer>
</body>
</html>