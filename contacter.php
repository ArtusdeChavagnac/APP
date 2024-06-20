<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" href="images/shortcut icon.png">
    <title>Nous contacter — SonoTech</title>
</head>
<body>
    <header><iframe src="communs/header.php"></iframe></header>
    <div id="div-contenu">

        <h1>Nous contacter</h1>

        <form action="contact.php" method="post">
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" required><br>

            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="message">Message :</label><br>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea><br>

            <input type="submit" value="Envoyer">
        </form>

    </div>
    <footer><iframe src="communs/footer.php"></iframe></footer>
</body>
</html>



