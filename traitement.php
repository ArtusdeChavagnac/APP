<?php
function crypterMdp($password) {
// return sha1($password);
return password_hash($password, PasSWORD_BCRYPT);
}
function estUneChaine($chaine): bool{
if (empty($chaine)) {
return false;
} else {
return is_string($chaine);
}
}
function estUnMotDePasse($chaine): bool{
if (empty($chaine) || strlen($chaine) < 8) {
return false;
} else {
return is_string($chaine);
}
}
$db = 'sonotech';
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername,$username,$password);
if ($conn -> connect_error) {
die("Connection failed : ".$conn -> connect_error);
}
try {
$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIon);
}
catch(PDOException $e)
{
echo "Connection failed: " . $e -> getMessage();
}
if (isset($_POST["email"]) and isset($_POST["motDePasse"]) and isset($_POST["nom"]) and isset($_POST["prenom"])){
if (!estUneChaine($_POST["nom"]) or !estUneChaine($_POST["prenom"])) {
echo "<script>alert('Votre nom et prénom doivent être une chaîne de charactère')
window.location.href = 'inscription.php';</script>";
}
else if (!estUnMotDePasse($_POST["motDePasse"])){
echo "<script>alert('Le mot de passe est incorrecte')
window.location.href = 'inscription.php';</script>";
}
else {
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$naissance = $_POST["dateNaissance"];
$mail = $_POST["email"];
$telephone = $_POST["telephone"];
$mdp = crypterMdp($_POST["motDePasse"]);
$abonnement_idAbonnement = 1;
$stmt = $conn -> prepare("select COUNT(*) from $db.utilisateur where adresse_email = :addresse_email");
$stmt -> bindParam(':addresse_email', $mail, PDO::PARAM_STR);
$stmt -> execute();
$nombre_de_lignes = $stmt -> fetchColumn();
if ($nombre_de_lignes > 0) {
echo "<script>alert('Cette adresse e-mail est déjà utilisé')
window.location.href = 'inscription.php';</script>";
} else {
$stmt = $conn -> prepare("INSERT INTO $db.utilisateur(nom,prenom,date_de_naissance,adresse_email, numero_de_telephone, mot_de_passe,abonnement_idAbonnement) VALUES (:nom, :prenom, :date_de_naissance, :adresse_email, :numero_de_telephone, :mot_de_passe, :abonnement_idAbonnement)");
$nom = htmlspecialchars($nom);
$prenom = htmlspecialchars($prenom);
$mail = htmlspecialchars($mail);
$stmt -> bindParam(':nom',$nom);
$stmt -> bindParam(':prenom',$prenom);
$stmt -> bindParam(':date_de_naissance',$naissance);
$stmt -> bindParam(':adresse_email',$mail);
$stmt -> bindParam(':numero_de_telephone',$telephone);
$stmt -> bindParam(':mot_de_passe',$mdp);
$stmt -> bindParam(':abonnement_idAbonnement',$abonnement_idAbonnement);
$stmt -> execute();
header("Location: connexion.php");
exit();
}
}
}
?>