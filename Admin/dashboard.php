<?php
// Assurez-vous que l'utilisateur est authentifié en tant qu'administrateur
// Vous pouvez implémenter une fonction de vérification d'authentification ici

// Incluez votre code de connexion à la base de données ici

// Exemple de code pour afficher la liste des utilisateurs
$query = "SELECT * FROM utilisateurs";
$result = mysqli_query($conn, $query);

// ... Autres fonctionnalités à ajouter selon vos besoins ...

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" href="images/shortcut icon.png">
    <script src="script.js"></script>
    <title>Page d'Administration — SonoTech</title>
</head>
<body>
    <header>
        <iframe src="communs/header.html"></iframe>
    </header>
    <div id="div-contenu">

        <h1>Page d'Administration</h1>

        <!-- Afficher la liste des utilisateurs -->
        <h2>Liste des Utilisateurs</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <!-- Ajoutez d'autres colonnes si nécessaire -->
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                // Ajoutez d'autres colonnes si nécessaire
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Autres fonctionnalités à ajouter selon vos besoins -->

    </div>
    <footer>
        <iframe src="communs/footer.html"></iframe>
    </footer>
</body>
</html>