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

$mot_de_passe = $userData['mot_de_passe']
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
        <p>Modifier mon mot de passe</p><br>
        <img id="photoProfil" src="#" alt="Photo de profil" style="display: none; max-width: 100px; float: right; margin: 10px;">
            <form method="post" action="traitement_mdp.php">
                <label for="motdepasse" style="display: inline-block; width: 150px; text-align: left;">Mot de passe:</label>
                <input type="password" name="oldpsd" value="" placeholder="Mot de passe actuel"/>
                <input type="password" name="psd" value="" placeholder="Nouveau mot de passe"/>
                <input type="password" name="confpsd" value="" placeholder="Confirmation du mot de passe"/>
                <input type="submit" name="form6" value="Modifier">
            </form>
            </div>
    </div>

    <footer>
        <iframe src="communs/footer.php"></iframe>
    </footer>

</body>
</html> 