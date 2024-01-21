<?php

$idConcert = isset($_GET['idConcert']) ? $_GET['idConcert'] : null;

session_start();
if (isset($_SESSION['utilisateur_connecte'])) {
    $statut = $_SESSION['utilisateur_connecte'];    
} else {
    $statut = false;
}


$db = "sonotech";
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Connection failed : ".$conn->connect_error);
}


try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" href="images/shortcut icon.png">
    <script src="script.js"></script>
    <title>Réservation de Billets — SonoTech</title>
</head>
<body>
    <header><iframe src="communs/header.php"></iframe></header>
    
    <div id="div-contenu">
        <h1>Réservation de Billets</h1>
        
        <img src="" id="displayedImage" alt="Displayed Image">
        <?php

        if (isset($_POST["imageSrc"])) {
            $imageSrc = $_POST['imageSrc'];
            $idConcert = $_POST['idConcert'];
            echo "<script>document.getElementById('displayedImage').src= '$imageSrc'</script>";
        } else {
            echo "<script>window.loaction.href = 'index.php'</script>";
        }

        ?>
    <script type="text/javascript">
        function submitconfirm(statut)
        {
        
        if (statut== true){
             var result = confirm("Etes-vous sure de valider votre achat?");
            if (result == true) {
                alert("Merci pour votre achat");
            }
            else {
                alert("");
            }
        } else {
            alert("Vous devez d'abord vous connecter");
        }
        
       
        }
            
    </script>


        <!-- Formulaire de réservation -->
        <form id="reservation-form" action="traitement_reservation.php">
                
            </select>

            <label>Choisissez le type de place :</label>
            <div>
                <input type="radio" id="placeNormale" name="typePlace" value="normale" checked>
                <label for="placeNormale">Place Normale</label>
            </div>

            <div>
                <input type="radio" id="placeVIP" name="typePlace" value="VIP">
                <label for="placeVIP">Place VIP (plus cher)</label>
            </div>

            <label for="date">Choisissez une date :</label>
            <input type="date" id="date" name="date" required>

            <label for="heure">Choisissez une heure :</label>
            <input type="time" id="heure" name="heure" required>

            <label for="nombre-billets">Nombre de billets :</label>
            <input type="number" id="nombre-billets" name="nombre-billets" min="1" required> <br>

            <label for="prix-total">Prix total :</label>
            <span id="prix-total">0 €</span>

            <button type="submit" onclick= "submitconfirm($statut)">Réserver</button>

        </form>
    </div>

    <footer><iframe src="communs/footer.php"></iframe></footer>

    <script>
        // JavaScript pour calculer le prix total en fonction du nombre de billets et du type de place
        document.getElementById('nombre-billets').addEventListener('input', function() {
            var nombreBillets = this.value;
            var prixUnitaire = 10; // Prix de billet pour une place normale
            var typePlace = document.querySelector('input[name="typePlace"]:checked').value;

            // Prix unitaire différent pour une place VIP
            if (typePlace === 'VIP') {
                prixUnitaire = 20; //  A Changer selon le prix du billet VIP
            }

            var prixTotal = nombreBillets * prixUnitaire;
            document.getElementById('prix-total').textContent = prixTotal + ' €';
        });
    </script>
</body>
</html>

