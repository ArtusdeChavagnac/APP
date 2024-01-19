<?php

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

$query = "SELECT idFaq, texte, date FROM $db.faq";
$stmt = $conn->prepare($query);
$stmt-> execute();
$faqRawData = $stmt->fetchAll(PDO::FETCH_ASSOC);

$faqData = array();
foreach($faqRawData as $row) {
	$idFaq = $row["idFaq"];
	$faqData[$idFaq] = array($row['texte'], $row['date']);
}

?>

<!DOCTYPE html>
<html lang = "fr">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<link rel = "stylesheet" href = "stylesheet.css">
	<link rel = "shortcut icon" href = "images/shortcut icon.png">
	<script src = "script.js"></script>
	<title>FAQ — SonoTech</title>
	<style>
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
        }

        .question {
            float: left;
            width: 70%; /* Ajustez la largeur selon vos besoins */
        }

        .date {
            float: right;
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


<h1>FAQ</h1>

<?php

echo '<ul>';
foreach ($faqRawData as $faqRow) {
    $idFaq = $faqRow['idFaq'];

    // Récupération des données de la table reponse
    $queryReponse = "SELECT texte, date FROM $db.reponse WHERE faq_idFaq = :idFaq";
    $stmtReponse = $conn->prepare($queryReponse);
    $stmtReponse->bindParam(':idFaq', $idFaq, PDO::PARAM_INT);
    $stmtReponse->execute();
    $reponseData = $stmtReponse->fetch(PDO::FETCH_ASSOC);

    echo '<li class="clearfix">';
    echo '<div class="question">';
    echo "Question: {$faqRow['texte']}<br>";

    // Vérification si des données de réponse existent
    if ($reponseData) {
        echo "Réponse: {$reponseData['texte']}<br>";
    } else {
        echo "Pas de réponse disponible.<br><br>";
    }
    echo '</div>';

    // Aligner la date tout à droite
    echo '<div class="date">';
    echo "Date: {$faqRow['date']}<br>";
    if ($reponseData) {
    	echo "Date : {$reponseData['date']}<br><br>";
    }
    echo '</div>';
    
    echo '</li>';
}
echo '</ul>';

$pdo = null;
?>

</div>
<footer><iframe src = "communs/footer.php"></iframe></footer>
</body>
</html>
<<<<<<< Updated upstream
=======
<!DOCTYPE html>
<html lang = "fr">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<link rel = "stylesheet" href = "stylesheet.css">
	<link rel = "shortcut icon" href = "images/shortcut icon.png">
	<script src = "script.js"></script>
	<title>Événements — SonoTech</title>
</head>

</html>
>>>>>>> Stashed changes
