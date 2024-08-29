<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "../css.css">
<link rel = "shortcut icon" href = "../images/shortcut icon.png"> 
<script src = "../js.js"></script> 
<title>Gestion FAQ — SonoTech</title>
</head>
<body>
<header>
<iframe src = "../commun/header.php"></iframe>
</header>
<div id = "div-contenu">
<h1>Logs de la passerelle</h1>
<?php
require("../connexion-bdd.php");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G05E");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);
$data_tab = str_split($data, 33);
$data_tab = array_slice($data_tab, -10);
echo '<table>';
echo '<tr><th>TRA</th><th>OBJ</th><th>REQ</th><th>TYP</th><th>NUM</th><th>VAL</th><th>TIM</th><th>CHK</th><th>Timestamp</th></tr>';
foreach ($data_tab as $trame) {
$tra = substr($trame, 0, 1);
$obj = substr($trame, 1, 4);
$req = substr($trame, 5, 1);
$typ = substr($trame, 6, 1);
$num = substr($trame, 7, 2);
$val = substr($trame, 9, 4);
$tim = substr($trame, 13, 4);
$chk = trim(substr($trame, 17, 2));
$year = substr($trame, 19, 4);
$month = substr($trame, 23, 2);
$day = substr($trame, 25, 2);
$hour = substr($trame, 27, 2);
$min = substr($trame, 29, 2);
$sec = substr($trame, 31, 2);
$timestamp = sprintf("%04d-%02d-%02d %02d:%02d:%02d", $year, $month, $day, $hour, $min, $sec);
if (checkdate((int)$month, (int)$day, (int)$year) && $hour < 24 && $min < 60 && $sec < 60) {
echo "<tr><td>$tra</td><td>$obj</td><td>$req</td><td>$typ</td><td>$num</td><td>$val</td><td>$tim</td><td>$chk</td><td>$timestamp</td></tr>";
$stmt = $conn -> prepare("select idCapteur_sonore from capteur_sonore where idCapteur_sonore = ?");
if ($stmt === false) {
die('Erreur de préparation de la requête: ' . $conn -> error);
}
$stmt -> bind_param("s", $num);
$stmt -> execute();
$stmt -> store_result();
if ($stmt -> num_rows > 0) {
$stmt -> bind_result($idCapteur_sonore);
$stmt -> fetch();
$stmt_update = $conn -> prepare("update capteur_sonore set niveau_sonore = ?, date = ?, position = ? where idCapteur_sonore = ?");
if ($stmt_update === false) {
die('Erreur de préparation de la requête: ' . $conn -> error);
}
$position = '';
$stmt_update -> bind_param("ssss", $val, $timestamp, $position, $num);
if ($stmt_update -> execute()) {
echo "Données mises à jour avec succès.";
} else {
echo "Erreur lors de la mise à jour des données: " . $stmt_update -> error;
}
$stmt_update -> close();
} else {
$stmt_insert = $conn -> prepare("insert into capteur_sonore (idCapteur_sonore, niveau_sonore, date, position) values (?, ?, ?, ?)");
if ($stmt_insert === false) {
die('Erreur de préparation de la requête: ' . $conn -> error);
}
$position = '';
$stmt_insert -> bind_param("ssss", $num, $val, $timestamp, $position);
if ($stmt_insert -> execute()) {
echo "Données insérées avec succès.";
} else {
echo "Erreur lors de l'insertion des données: " . $stmt_insert -> error;
}
$stmt_insert -> close();
}
$stmt -> close();
} else {
echo "<tr><td>$tra</td><td>$obj</td><td>$req</td><td>$typ</td><td>$num</td><td>$val</td><td>$tim</td><td>$chk</td><td>Invalid Timestamp</td></tr>";
}
}
echo '</table>';
$conn -> close();
?>
</div>
<footer>
<iframe src = "../commun/footer.php"></iframe> 
</footer>
</body>
</html>