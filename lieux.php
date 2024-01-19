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
	<title>Lieux — SonoTech</title>
	<style>
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
        }

        .position {
            float: left;
            width: 70%; /* Ajustez la largeur selon vos besoins */
        }

        .niveau {
            float: right;
            padding-right: 500px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
<header><iframe src = "communs/header.php"></iframe></header>
<div id = "div-contenu">


<h1>Lieux</h1>

<p>Voilà les lieux que nous avons classifiés pour vous, vous y retouverez la qualité sonore moyenne et, pour les membres premium, la carte complète des niveaux sonores.</p>

<table>

<?php

$query = "SELECT * FROM $db.capteur_sonore";
$stmt = $conn->prepare($query);
$stmt->execute();

echo '<tr>';
echo '<th>Lieu</th>';
echo '<th>Qualité moyenne</th>';
echo '</tr>';

$lieuRawData = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($lieuRawData as $row){
	echo '<tr>';
	echo "<td>{$row['position']}</td>";
	echo "<td>{$row['niveau_sonore']}</td>";
	echo '</tr>';

}


?>

</table>
<img src = "images/carte_sonore_1.png"></img>

</div>
<footer><iframe src = "communs/footer.php"></iframe></footer>
</body>
</html>
