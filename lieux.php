<?php
session_start();

$db = "sonotech";
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" href="images/shortcut_icon.png">
    <script src="script.js" defer></script>
    <title>Lieux — SonoTech</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
        }

        .position {
            float: left;
            width: 70%;
        }

        .niveau {
            float: right;
            padding-right: 500px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        table {
            width: 50%; 
            border-collapse: collapse;
            background-color: transparent; 
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            width: 50%; 
            text-align: center; 
        }

        th {
            background-color: transparent; 
            color: #fff333; 
        }
    </style>
</head>
<body>
    <header>
        <iframe src="communs/header.php" style="width: 100%; height: 100px; border: none;"></iframe>
    </header>
    <div id="div-contenu">
        <h1>Lieux</h1>
        <p>Voici les lieux que nous avons classés pour vous, où vous pouvez consulter le niveau sonore des différentes salles de concert.</p>

        <table>
            <tr>
                <th>Lieu</th>
                <th>Niveau sonore</th>
            </tr>

            <?php
            $query = "SELECT * FROM capteur_sonore";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $lieuRawData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($lieuRawData as $row){
                echo '<tr>';
                echo "<td>{$row['position']}</td>";
                echo "<td>{$row['niveau_sonore']}</td>";
                echo '</tr>';
            }

            $conn = null;
            ?>
        </table>

        <img src="images/carte_sonore_1.png" alt="Carte sonore des lieux">
    </div>
    <footer>
        <iframe src="communs/footer.php" style="width: 100%; height: 100px; border: none;"></iframe>
    </footer>
</body>
</html>
