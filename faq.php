<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "stylesheet.css">
<link rel = "shortcut icon" href = "images/shortcut icon.png">
<script src = "script.js"></script>
<title>FAQ — SonoTech</title>
<style>
h1 {
color: black;
text-align: center;
}
ul {
list-style-type: none;
padding: 0;
}
li {
background-color: #blue;
padding: 20px;
margin-bottom: 20px;
border-radius: 8px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.question {
margin-bottom: 10px;
}
.reponse {
margin-bottom: 20px;
}
.date {
color: #888;
text-align: right;
}
</style>
</head>
<body>
<header><iframe src = "communs/header.php"></iframe></header>
<div id = "div-contenu">
<h1>FAQ</h1>
<?php
require("connexion-bdd.php");
$sql = "SELECT * FROM faq";
$result = $conn->query($sql);
echo '<ul>';
while ($row = $result->fetch_assoc()) {
echo '<li>';
echo '<div class = "question">';
echo "<strong>Question:</strong> {$row['texte']}<br>";
if (!empty($row['reponse'])) {
echo "<strong>Réponse:</strong> {$row['reponse']}<br>";
} else {
echo "<strong>Réponse:</strong> Pas de réponse disponible.<br>";
}
echo '</div>';
echo '<div class = "date">';
echo "<strong>Date de la réponse:</strong> {$row['date']}<br><br>";
echo '</div>';
echo '</li>';
}
echo '</ul>';
$conn->close();
?>
</div>
<footer><iframe src = "communs/footer.php"></iframe></footer>
</body>
</html>
