<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="shortcut icon" href="../images/shortcut icon.png"> 
    <script src="../script.js"></script> 
    <title>Ajouter FAQ — SonoTech</title>
</head>
<body>
    <header>
        <iframe src="communs/header.php"></iframe>
    </header>
    <div id="div-contenu">

        <h1>Ajouter FAQ</h1>

        <!-- Formulaire pour ajouter une FAQ -->
        <form action="traitementajoutfaq.php" method="post">
            <!-- Les champs du formulaire -->
            <label for="question">Question :</label>
            <input type="text" name="texte" required>

            <label for="reponse">Réponse :</label>
            <textarea name="reponse" required></textarea>

            <!-- Bouton de soumission -->
            <button type="submit">Ajouter</button>
        </form>

    </div>
    <footer>
        <iframe src="communs/footer.php"></iframe> 
    </footer>
</body>
</html>