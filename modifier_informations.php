<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sonotech";

try{
	$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo "La connexion à la base de données a échoué : ". $e->getMessage();
}
// Récupérer les données de l'utilisateur
$userID = 5; // Vous devez remplacer ceci par l'ID de l'utilisateur dont vous souhaitez récupérer les informations
$query = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = ?");
$query->execute([$userID]);
$userData = $query->fetch(PDO::FETCH_ASSOC);

// Pré-remplir le formulaire avec les données de l'utilisateur
$nom = $userData['nom'];
$prenom = $userData['prenom'];
$email = $userData['adresse_email'];
$telephone = $userData['numero_de_telephone'];
$date_naissance = $userData['date_de_naissance'];
?> 

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" href="images/shortcut icon.png">
    <script src="../script.js"></script>
    <title>Mon compte SonoTech</title>

    <style>
        #photoProfil {
            position: fixed;
            top: 10px;
            right: 10px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: none; 
        }
    </style>
</head>
<body>
    <nav>
        <iframe src="communs/header.php"></iframe>
    </nav>

    <h1>Mon compte</h1>

    <div id="div-contenu">
        <div>
        <p>Modifier mes informations</p><br>
        <img id="photoProfil" src="#" alt="Photo de profil" style="display: none; max-width: 100px; float: right; margin: 10px;">

            <form id="profilForm" method="post" action="traitement_formulaire.php">
                <label for="nom" style="display: inline-block; width: 150px; text-align: left;">Nom:</label>
                <input type="text" name="nom" value=""/>
                <input type="submit" name="form1" value="Modifier"><br>

                <label for="prenom" style="display: inline-block; width: 150px; text-align: left; ">Prénom:</label>
                <input type="text" name="prenom" value="">
                <input type="submit" name="form2" value="Modifier"><br>

                <label for="adresse_email" style="display: inline-block; width: 150px; text-align: left;">Email:</label>
                <input type="email" name="mail" value="">
                <input type="submit" name="form3" value="Modifier"><br>

                <label for="numero_de_telephone" style="display: inline-block; width: 150px; text-align: left;">Numéro de téléphone:</label>
                <input type="text" name="numero_de_telephone" placeholder="Numéro de téléphone" value="" >
                <input type="submit" name="form4" value="Modifier"><br>

                <label for="date_de_naissance" style="display: inline-block; width: 150px; text-align: left;">Date de naissance:</label>
                <input type="date" name="date_de_naissance">
                <input type="submit" name="form5" value="Modifier"><br>
                
                
            </form>
        </div>
    </div>

    <footer>
        <iframe src="communs/footer.php"></iframe>
    </footer>

</body>
</html>
