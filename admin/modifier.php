<?php

session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
    if ($_SESSION['utilisateur_abonnement_idAbonnement'] != 2) {
        echo "<script>window.location.href = '../index.php'</script> " ;
    } 
} else {
    echo "<script>window.location.href = '../index.php'</script> " ;
}


require("../connexion_bdd.php");

// Check if the user ID is set
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve updated values from the form
        $updatedName = $_POST['updated_name'];
        $updatedPrenom = $_POST['updated_prenom'];
        $updatedDate_de_naissance = $_POST['updated_date_de_naissance'];
        $updatedAdresseEmail = $_POST['updated_adresse_email'];
        $updatedTelephone= $_POST['updated_numero_de_telephone'];
        $updatedAbonnement= $_POST['updated_abonnement_idAbonnement'];
        $sqlUpdate = "UPDATE utilisateur SET
        nom='$updatedName',
        prenom='$updatedPrenom',
        date_de_naissance='$updatedDate_de_naissance',
        adresse_email='$updatedAdresseEmail',
        numero_de_telephone='$updatedTelephone',
        abonnement_idAbonnement='$updatedAbonnement'
        WHERE idUtilisateur=$userId";
        $conn->query($sqlUpdate);

        // Redirect back to the dashboard or any other appropriate page
        header("Location: dashboard.php");
        exit();
    }

    // Fetch user data for pre-filling the form
    $sqlSelect = "SELECT * FROM utilisateur WHERE idUtilisateur=$userId";
    $resultSelect = $conn->query($sqlSelect);

    if ($resultSelect->num_rows == 1) {
        $userData = $resultSelect->fetch_assoc();
        // Display the form for modifying user data
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "ID d'utilisateur non spécifié.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="shortcut icon" href="../images/shortcut icon.png"> 
    <script src="../script.js"></script> 
    <title>Page d'Administration_Modifier — SonoTech</title>
</head>
<body>

    <h2>Modifier Utilisateur</h2>
    
    <form method="post" action="">
        <input type="text" name="updated_name" value="<?php echo isset($userData['nom']) ? $userData['nom'] : ''; ?>" required><br>
        <input type="text" name="updated_prenom" value="<?php echo isset($userData['prenom']) ? $userData['prenom'] : ''; ?>" required><br>
        <input type="date" name="updated_date_de_naissance" value="<?php echo isset($userData['date_de_naissance']) ? $userData['date_de_naissance'] : ''; ?>" required><br>
        
        <input type="text" name="updated_adresse_email" value="<?php echo isset($userData['adresse_email']) ? $userData['adresse_email'] : ''; ?>" required><br>
        <input type="text" name="updated_numero_de_telephone" value="<?php echo isset($userData['numero_de_telephone']) ? $userData['numero_de_telephone'] : ''; ?>" required><br>
        <label for="updated_name">2 = Admin, 0/1 = Utilisateur:</label><br>
        <input type="text" name="updated_abonnement_idAbonnement" value="<?php echo isset($userData['abonnement_idAbonnement']) ? $userData['abonnement_idAbonnement'] : ''; ?>" required><br>
        <input type="submit" value="Enregistrer">
    </form>
    

</body>
</html>

