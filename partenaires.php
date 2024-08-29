<?php
require("connexion-bdd.php");
$db = "sonotech";
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
if ($conn -> connect_error) {
die("Connection failed : ".$conn -> connect_error);
}
try {
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIon);
}
catch(PDOException $e) {
echo "Connection failed: " . $e -> getMessage();
}
?>
<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel = "stylesheet" href = "css.css">
<link rel = "shortcut icon" href = "images/shortcut icon.png">
<script src = js.js></script>
<title>Nos partenaires — SonoTech</title>
</head>
<body>
<header><iframe src = "commun/header.php"></iframe></header>
<div id = "div-contenu">
<h1>Nos partenaires</h1>
<p>Voilà une liste des entreprises qui ont choisi de nous accompagner dans ce projet. C'est grâce à leur soutien que nous pouvons vous offrir une meilleure expérience auditive.</p>
<ul>
<?php
$query = "select nom from $db.partenaires";
$stmt = $conn -> prepare($query);
$stmt -> execute();
$partenaires = $stmt -> fetchAll(PDO::FETCH_asSOC);
foreach ($partenaires as $row) {
$nom = $row['nom'];
echo "<li>$nom</li>";
}
?>
</ul>
</div>
<footer><iframe src = "commun/footer.php"></iframe></footer>
</body>
</html>