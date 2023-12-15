<!DOCTYPE HTML>
<html>
	<head>
		<title>Liste des utilisateurs</title>
	</head>
	<body>


<h1>Exemple simple de site en PHP</h1>


<?php


require("modele/connexion.php");
require("modele/fonctions.php");

if(isset($_GET["action"]) && $_GET["action"]=="save") {
	if(isset($_GET["id"]) &&  $_GET["id"]!=null) {
		$reponse=updateUsers($db,$_GET["nom"],$_GET["prenom"],$_GET["ID"]);
		
	} else {
		$reponse=insertUsers($db,$_GET["nom"],$_GET["prenom"]);
	}
}


if(isset($_GET["action"]) && ($_GET["action"]=="ajouter" || $_GET["action"]=="modifier")) {
	$nom = "";
	$prenom = "";
	$id = "";
	
	if($_GET["action"]=="modifier") {
		$reponse=selectUser($db,$_GET["nom"],$_GET["prenom"],$_GET["ID"]);
		


    while($user = $reponse->fetch()){
		$nom = $user["nom"];		
		$prenom = $user["prenom"];		
		$id = $user["id"];
	}
}
include('view/list.php')
	?>	


<?php	
} else { 
	$reponse=selectAll($db);

include('view/edit.php')
?>



<?php } ?>	
	</body>
</html>


