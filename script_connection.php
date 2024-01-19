<?php

session_start();

function crypterMdp($password) {
    //return sha1($password);
    return password_hash($password, PASSWORD_BCRYPT);
}


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

if (isset($_POST["email"]) and isset($_POST["motDePasse"])) {
	$mail = $_POST["email"];
	$mdp = htmlspecialchars(($_POST["motDePasse"]));
	$idUtilisateur = -1;


	$stmt = $conn->prepare("SELECT idUtilisateur, mot_de_passe FROM $db.utilisateur WHERE adresse_email = :addresse_email");
	$stmt->bindParam(':addresse_email', $mail, PDO::PARAM_STR);
	$stmt->execute();

	$donnees = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($donnees) {
		$mdp_donnees = $donnees["mot_de_passe"];
		if (password_verify($mdp, $mdp_donnees)) {
			echo "<script>alert('Vous êtes connecté')
			window.location.href = 'index.php';</script>";
			$query = "SELECT idUtilisateur, nom, prenom, adresse_email, numero_de_telephone, date_de_naissance, abonnement_idAbonnement FROM $db.utilisateur WHERE idUtilisateur = $idUtilisateur";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$utilisateurData = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$_SESSION['utilisateur_connecte'] = true;
			$_SESSION['utilisateur_nom'] = $utilisateurData['nom'];
			$_SESSION['utilisateur_prenom'] = $utilisateurData['prenom'];
			$_SESSION['utilisateur_adresse_email'] = $utilisateurData['adresse_email'];
			$_SESSION['utilisateur_numero_de_telephone'] = $utilisateurData['numero_de_telephone'];
			$_SESSION['utilisateur_date_de_naissance'] = $utilisateurData['date_de_naissance'];
			$_SESSION['utilisateur_abonnement_idAbonnement'] = $utilisateurData['abonnement_idAbonnement'];
		} else {
			echo "<script>alert('Le mot de passe est incorrect')
			window.location.href = 'connexion.php';</script>";
		}

	} else {
		echo "<script>alert('L\'adresse mail n\'est pas valide')
		window.location.href = 'connexion.php';</script>";
	}
} 


?>