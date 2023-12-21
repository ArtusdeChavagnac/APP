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



function newUser() {
	$db = 'sonotech';

	if (isset($_POST["email"]) and isset($_POST["motDePasse"]) and isset($_POST["nom"]) and isset($_POST["prenom"])){
			if (!estUneChaine($_POST["nom"]) or !estUneChaine($_POST["prenom"])) {
				echo "<script>alert('Votre nom et prénom doivent être une chaîne de charactère')</script>";
			}
			else if (!estUnMotDePasse($_POST["motDePasse"])){
				echo "<script>alert('Le mot de passe est incorrecte')</script>";

			}
			else {
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
		}

	
}

?>