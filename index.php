<?php
session_start();
$db = "sonotech";
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
die("Connection failed : ".$conn->connect_error);
}
try {
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
?>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sonotech";
try{
$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
echo "La connexion à la base de données a échoué : ". $e->getMessage();
}
$allartists = $bdd ->query('SELECT * FROM artiste');
if (isset($_GET['q']) AND !empty($_GET['q'])){
$recherche = htmlspecialchars($_GET['q']);
$allartists = $bdd -> query('SELECT * FROM artiste WHERE prenom LIKE"%'.$recherche.'%"');
}
$bdd = null ;
?>
<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel = "stylesheet" href = "stylesheet.css">
<link rel = "shortcut icon" href = "images/shortcut icon.png">
<script src = script.js></script>
<title>Accueil — SonoTech</title>
<script>
function openImage(imageSrc,idConcert) {
// Redirige vers la page avec l'image en utilisant JavaScript
var imageSrc = imageSrc;
var idConcert = idConcert;
var form = document.createElement('form');
form.method = 'POST';
form.action = 'reservation.php';
var inputIdConcert = document.createElement('input');
inputIdConcert.type = 'hidden';
inputIdConcert.name = 'idConcert';
inputIdConcert.value = idConcert;
var inputImageSrc = document.createElement('input');
inputImageSrc.type = 'hidden';
inputImageSrc.name = 'imageSrc';
inputImageSrc.value = imageSrc;
form.appendChild(inputIdConcert);
form.appendChild(inputImageSrc);
document.body.appendChild(form);
form.submit();
}
</script>
</head>
<body>
<header>
<iframe src = "communs/header.php"></iframe>
<div class="search-bar">
<form method="GET">
<input type="text" name="q" placeholder="Rechercher...">
<input type="submit" value="Rechercher">
</form> 
<section class="afficher_artiste">
<?php
if($allartists->rowCount() > 0){
while($artist = $allartists->fetch()){
?>
<p><?=$artist['prenom']; ?></p>
<?php
}
}else{
?>
<p>Aucun artiste trouvé</p>
<?php
}
?>
</section>
</div>
</header>
<div id = "div-contenu">
<h1>Bienvenue chez SonoTech</h1>
<p>Le son, c'est nous !</p>
<h2>Nos prochains événements</h2>
<?php
$query = "SELECT idConcert, image FROM $db.concert";
$stmt = $conn->prepare($query);
$stmt->execute();
$concertRawData = $stmt->fetchAll(PDO::FETCH_ASSOC);
$concertData = array();
foreach($concertRawData as $row) {
$image = $row['image'];
$idConcert = $row['idConcert'];
echo "<img src= '$image' onclick= 'openImage(\"$image\", \"$idConcert\")' alt='Concert 1'>";
}
?>
<h2>Notre projet</h2>
<p>Grâce à nos technologies d'analyses sonores avancées, profitez des meilleures places au sein des concerts les plus inoubliables. Différentes options de placement sont disponibles selon votre budget ! Avec SonoTech finit les acouphènes en sortant des concerts, les places trop bruyantes ou avec une mauvaise qualité sonore ne seront jamais vendues sur ce site.</p>
<p></p>
</div>
<footer><iframe src = "communs/footer.php"></iframe></footer>
</body>
</html>
