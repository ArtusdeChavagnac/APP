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

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve updated values from the form
        $updatedName = $_POST['updated_name'];
        $updatedSurname = $_POST['updated_surname'];
        $updatedBirth = $_POST['updated_birth'];
        // Add other fields as needed

        // Update the user data in the database
        $sqlUpdate = "UPDATE utilisateur SET nom='$updatedName',prenom='$updatedSurname',date_de_naissance='$updatedBirth' WHERE idUtilisateur=$userId";
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
        <label for="updated_name">Nouveau Nom:</label>
        <input type="text" name="updated_name" value="<?php  echo isset($userData['nom']) ? $userData['nom'] : ''; ?>" required><br>
        <label for="updated_name">Nouveau Prénom:</label>
        <input type="text" name="updated_surname" value="<?php echo isset($userData['prenom']) ? $userData['prenom'] : ''; ?>" required><br>
        <label for="updated_name">Nouvelle date de Naissance:</label>
        <input type="date" name="updated_birth" value="<?php echo isset($userData['date_de_naissance']) ? $userData['date_de_naissance'] : ''; ?>" required><br>


        <!-- Add other form fields as needed -->

        <input type="submit" value="Enregistrer">
    </form>

</body>
</html>
