<?php

function crypterMdp($password) {
    //return sha1($password);
    return password_hash($password, PASSWORD_BCRYPT);
}


$db = "sonotech";
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername,$username,$password);


if ($conn->connect_error) {
	die("Connection failed : ".$conn->connect_error);
}


try {
$conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST["email"]) and isset($_POST["motDePasse"])) {
	$mail = $_POST["email"];
	$mdp = htmlspecialchars(($_POST["motDePasse"]));


	$stmt = $conn->prepare("SELECT idUtilisateur, mot_de_passe FROM $db.utilisateur WHERE adresse_email = :addresse_email");
	$stmt->bindParam(':addresse_email', $mail, PDO::PARAM_STR);
	$stmt->execute();

	$donnees = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($donnees) {
		$mdp_donnees = $donnees["mot_de_passe"];
		if (password_verify($mdp, $mdp_donnees)){
			echo "<script>alert('Vous êtes connectés')
			window.location.href = 'index.html';</script>";
		} else {
			echo "<script>alert('Le mot de passe est incorrecte')
			window.location.href = 'connexion.php';</script>";
		}

	} else {
		echo "<script>alert('L\'adresse mail n\'est pas valide')
		window.location.href = 'connexion.php';</script>";
	}
} 


?>