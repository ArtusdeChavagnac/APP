<?php
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
session_start();
if (isset($_SESSIon['utilisateur_connecte'])== false){
echo "<script>alert('Vous devez d\'abord vous connecter')</script>";
echo "<script>window.location.href = 'connexion.php'</script>";
} else {
$nombre_de_places = $_POST['nombre_billets'];
$type = $_POST["typePlace"];
if ($type == "normale"){
$idTicket = intval(1);
} else {
$idTicket = intval(2);
}
$values = array_fill(0, $nombre_de_places,$type);
$idConcert = intval($_SESSIon['idConcert']);
$idUtilisateur = intval($_SESSIon['utilisateur_id']);
echo $idUtilisateur;
$query = "INSERT INTO $db.utilisateur_has_concert (`idUtilisateur_has_concert`, `utilisateur_idUtilisateur`, `concert_idConcert`, `ticket_idTicket`) VALUES (NULL, $idUtilisateur, $idConcert, $idTicket)";
foreach ($values as $row) {
$stmt = $conn -> prepare($query);
$stmt -> execute();
}
if ($nombre_de_places == 1) {
echo "<script>alert('Votre place a été réservé')
window.location.href = 'index.php';</script>";
} else {
echo "<script>alert('Vos places ont été enregistré')
window.location.href = 'index.php';</script>";
}
}
?>