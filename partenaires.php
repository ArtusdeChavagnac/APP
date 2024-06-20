<?php

require("connexion_bdd.php");

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

<!DOCTYPE html>
<html lang = "fr">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<link rel = "stylesheet" href = "stylesheet.css">
	<link rel = "shortcut icon" href = "images/shortcut icon.png">
	<script src = script.js></script>
	<title>Nos partenaires — SonoTech</title>
</head>
<body>
<header><iframe src = "communs/header.php"></iframe></header>
<div id = "div-contenu">


<h1>Nos partenaires</h1>

<p>Voilà une liste des entreprises qui ont choisi de nous accompagner dans ce projet. C'est grâce à leur soutien que nous pouvons vous offrir une meilleure expérience auditive.</p>

<ul>
	<?php

	$query = "SELECT nom FROM $db.partenaires";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$partenaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($partenaires as $row) {
		$nom = $row['nom'];
		echo "<li>$nom</li>";
	}

	?>
</ul>


</div>
<footer><iframe src = "communs/footer.php"></iframe></footer>
</body>
</html>