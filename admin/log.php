<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../stylesheet.css">
<link rel="shortcut icon" href="../images/shortcut icon.png"> 
<script src="../script.js"></script> 
<title>Gestion FAQ — SonoTech</title>
</head>
<body>
<header>
<iframe src="../communs/header.php"></iframe>
</header>
<div id="div-contenu">
<h1>Logs de la passerelle</h1>
<?php
require("../connexion_bdd.php");
// Récupération des données
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G05E");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);
// Mise en forme des données sous forme de tableau
$data_tab = str_split($data, 33);
// Sélection des 10 dernières trames
$data_tab = array_slice($data_tab, -10);
// Affichage des données sous forme de tableau HTML
echo '<table>';
echo '<tr><th>TRA</th><th>OBJ</th><th>REQ</th><th>TYP</th><th>NUM</th><th>VAL</th><th>TIM</th><th>CHK</th><th>Timestamp</th></tr>';
foreach ($data_tab as $trame) {
// Découpage de la trame en tenant compte de l'espace avant CHK
$tra = substr($trame, 0, 1);
$obj = substr($trame, 1, 4);
$req = substr($trame, 5, 1);
$typ = substr($trame, 6, 1);
$num = substr($trame, 7, 2);
$val = substr($trame, 9, 4);
$tim = substr($trame, 13, 4);
$chk = trim(substr($trame, 17, 2)); // Utilisation de trim pour supprimer les espaces
$year = substr($trame, 19, 4);
$month = substr($trame, 23, 2);
$day = substr($trame, 25, 2);
$hour = substr($trame, 27, 2);
$min = substr($trame, 29, 2);
$sec = substr($trame, 31, 2);
$timestamp = sprintf("%04d-%02d-%02d %02d:%02d:%02d", $year, $month, $day, $hour, $min, $sec);
// Construction du timestamp
if (checkdate((int)$month, (int)$day, (int)$year) && $hour < 24 && $min < 60 && $sec < 60) {
echo "<tr><td>$tra</td><td>$obj</td><td>$req</td><td>$typ</td><td>$num</td><td>$val</td><td>$tim</td><td>$chk</td><td>$timestamp</td></tr>";
// Vérification de l'existence de NUM dans la base de données
$stmt = $conn->prepare("SELECT idCapteur_sonore FROM capteur_sonore WHERE idCapteur_sonore = ?");
if ($stmt === false) {
die('Erreur de préparation de la requête: ' . $conn->error);
}
$stmt->bind_param("s", $num);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
// Si NUM existe, mise à jour des données
$stmt->bind_result($idCapteur_sonore);
$stmt->fetch();
$stmt_update = $conn->prepare("UPDATE capteur_sonore SET niveau_sonore = ?, date = ?, position = ? WHERE idCapteur_sonore = ?");
if ($stmt_update === false) {
die('Erreur de préparation de la requête: ' . $conn->error);
}
$position = ''; // Ajouter une position par défaut ou vide
$stmt_update->bind_param("ssss", $val, $timestamp, $position, $num);
if ($stmt_update->execute()) {
echo "Données mises à jour avec succès.";
} else {
echo "Erreur lors de la mise à jour des données: " . $stmt_update->error;
}
$stmt_update->close();
} else {
// Si NUM n'existe pas, insertion des données
$stmt_insert = $conn->prepare("INSERT INTO capteur_sonore (idCapteur_sonore, niveau_sonore, date, position) VALUES (?, ?, ?, ?)");
if ($stmt_insert === false) {
die('Erreur de préparation de la requête: ' . $conn->error);
}
$position = ''; // Ajouter une position par défaut ou vide
$stmt_insert->bind_param("ssss", $num, $val, $timestamp, $position);
if ($stmt_insert->execute()) {
echo "Données insérées avec succès.";
} else {
echo "Erreur lors de l'insertion des données: " . $stmt_insert->error;
}
$stmt_insert->close();
}
$stmt->close();
} else {
echo "<tr><td>$tra</td><td>$obj</td><td>$req</td><td>$typ</td><td>$num</td><td>$val</td><td>$tim</td><td>$chk</td><td>Invalid Timestamp</td></tr>";
}
}
echo '</table>';
// Fermeture de la connexion
$conn->close();
?>
</div>
<footer>
<iframe src="../communs/footer.php"></iframe> 
</footer>
</body>
</html>
