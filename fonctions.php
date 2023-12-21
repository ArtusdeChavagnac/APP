<?php
function connection($db){
	try{
	    $bdd = new PDO('mysql:host=localhost;dbname=$db;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
}


function crypterMdp($password) {
    //return sha1($password);
    return password_hash($password, PASSWORD_BCRYPT);
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


function newUser($db,$mail,$naissance,$mdp,$nom,$prenom,$telephone) {

	$stmt = $conn->prepare("INSERT INTO $db.utilisateur VALUES (:nom, :prenom, :telephone, :naissance, :mail, :mdp)");
	$stmt->bindParam(':nom',$nom);
	$stmt->bindParam(':prenom',$prenom);
	$stmt->bindParam(':mail',$mail);
	$stmt->bindParam(':mdp',$mdp);
	$stmt->bindParam(':naissance',$naissance);
	$stmt->bindParam(':telephone',$telephone);


	$nom = htmlspecialchars($nom);
	$prenom = htmlspecialchars($prenom);
	$mdp = crypterMdp($mdp);
	$mail = htmlspecialchars($mail);
	$telephone = htmlspecialchars($telephone);
	$naissance = htmlspecialchars($naissance);

	$stmt->execute();
}



switch ($function){
	case 'inscription':
		$vue = "inscription";
		$alerte = false;

		if (isset($_POST["email"]) and isset($_POST["motDePasse"]) and isset($_POST["nom"]) and isset($_POST["prenom"])){
			if (!estUneChaine($_POST["nom"]) or !estUneChaine($_POST["prenom"])) {
				$alerte = "Votre nom et prénom doivent être une chaîne de charactère";
			}
			else if (!estUnMotDePasse($_POST["motDePasse"])){
				$alerte = "Le mot de passe est incorrecte";
			}
			else {
				newUser($db,$_POST["email"],$_POST["dateNaissance"],$_POST["motDePasse"],$_POST["nom"],$_POST["prenom"],$_POST["telephone"]);
			}
		}

		$title = "Inscription";
		break;


}
?>