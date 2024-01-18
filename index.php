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

<!DOCTYPE html>
<html lang = "fr">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<link rel = "stylesheet" href = "stylesheet.css">
	<link rel = "shortcut icon" href = "images/shortcut icon.png">
	<script src = script.js></script>
	<title>Accueil — SonoTech</title>
	<script>
	function openImage(imageSrc) {
		// Redirige vers la page avec l'image en utilisant JavaScript
		window.location.href = 'reservation.php?src=' + encodeURIComponent(imageSrc);
	}
</script>
</head>
<body>
<header><iframe src = "communs/header.php"></iframe></header>
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
		$idConcert = $row["idConcert"];
		$concertData[$idConcert] = $row['image'];
	}

	foreach($concertData as $row){
		echo "<img src='$row' onclick='openImage(\"$row\")' alt='Concert 1'>";
	}
?>


<h2>Notre projet</h2>
<p>Grâce à nos technologies d'analyses sonores avancées, profitez des meilleures places au sein des concerts les plus inoubliables. Différentes options de placement sont disponibles selon votre budget ! Avec SonoTech finit les acouphènes en sortant des concerts, les places trop bruyantes ou avec une mauvaise qualité sonore ne seront jamais vendues sur ce site.</p>	
<h2>FAQ</h2>
        <div class="faq">
            <details>
                <summary>Quels sont vos modes de paiement acceptés ?</summary>
                <p>Nous acceptons les paiements par carte bancaire, virement et espèces.</p>
            </details>
            <details>
                <summary>Comment puis-je annuler ma réservation ?</summary>
                <p>Pour annuler votre réservation, veuillez nous contacter par téléphone ou par email au moins 48 heures à l'avance.</p>
            </details>
            <details>
				<summary>Proposez-vous des réductions pour les étudiants ?</summary>
				<p>Oui, nous offrons des réductions spéciales pour les étudiants sur présentation d'une carte étudiante valide.</p>
			</details>
        </div>	
<p></p>
</div>
<footer><iframe src = "communs/footer.php"></iframe></footer>
</body>
</html>
