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
        <p>Modifier mes informations</p>
        <img id="photoProfil" src="#" alt="Photo de profil" style="display: none; max-width: 100px; float: right; margin: 10px;">

            <form id="profilForm" style="display: none;">
                <label for="nom" style="display: inline-block; width: 150px; text-align: left;">Nom:</label>
                <input type="text" name="nom" value=""/>
                <input type="submit" name="form1" value="Modifier"><br>

                <label for="prenom" style="display: inline-block; width: 150px; text-align: left; ">Prénom:</label>
                <input type="text" name="prenom" value="">
                <input type="submit" name="form1" value="Modifier"><br>

                <label for="adresse_email" style="display: inline-block; width: 150px; text-align: left;">Email:</label>
                <input type="email" name="mail" value="">
                <input type="submit" name="form1" value="Modifier"><br>

                <label for="numero_de_telephone" style="display: inline-block; width: 150px; text-align: left;">Numéro de téléphone:</label>
                <input type="text" name="numero_de_telephone" placeholder="Numéro de téléphone" value="" >
                <input type="submit" name="form1" value="Modifier"><br>

                <label for="date_de_naissance" style="display: inline-block; width: 150px; text-align: left;">Date de naissance:</label>
                <input type="date" name="date_de_naissance">
                <input type="submit" name="form1" value="Modifier"><br>
                
                
            </form>