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


function newUser($mail,$naissance,$mdp,$nom,$prenom,$telephone) {

	$stmt = $conn->prepare("INSERT INTO $db.traitement VALUES (:nom, :prenom, :telephone, :naissance, :mail, :mdp)");
	$stmt->bindParam(':nom',$nom);
	$stmt->bindParam(':prenom',$prenom);
	$stmt->bindParam(':mail',$mail);
	$stmt->bindParam(':mdp',$mdp);
	$stmt->bindParam(':naissance',$naissance);
	$stmt->bindParam(':telephone',$telephone);

}
?>