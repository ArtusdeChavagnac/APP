<?php

session_start();
if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])) {
    if ($_SESSION['utilisateur_abonnement_idAbonnement'] != 2) {
        echo "<script>window.location.href = '../index.php'</script> " ;
    } 
} else {
    echo "<script>window.location.href = '../index.php'</script> " ;
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
    <title>Modifier FAQ — SonoTech</title>
</head>
<body>
    <header>
        <iframe src="../communs/header.php"></iframe>
    </header>
    <div id="div-contenu">

        <h1>Modifier FAQ</h1>

        <?php 
        require("../connexion_bdd.php");

        // Vérifiez si un identifiant est passé via la requête GET
        if(isset($_GET['id'])) {
            $faqId = $_GET['id'];
            $sql = "SELECT * FROM faq WHERE idFaq = $faqId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $idFaq = $row["idfaq"];
                $sql = "SELECT texte FROM reponse_faq WHERE $idFaq = faq_idFaq ";
                $reponses = $conn->query($sql);
                $reponse = $reponses->fetch_assoc();
                ?>
                <h1>Modifier une Question/Réponse</h1>

                <!-- Formulaire pour modifier une question/réponse -->
                <form action="traitementmodificationfaq.php" method="post">
                    <input type="hidden" name="idfaq" value="<?php echo $row['idfaq']; ?>">

                    <label for="question">Question :</label>
                    <input type="text" name="texte" value="<?php echo $row['texte']; ?>" required>

                    <label for="reponse">Réponse :</label>
                    <textarea name="reponse" required><?php echo $reponse['texte']; ?></textarea>

                    <button type="submit">Modifier</button>
                </form>
                <?php
            } else {
                echo "Question/réponse non trouvée.";
            }

            $conn->close();
        } else {
            echo "Identifiant de la question/réponse non spécifié.";
        }
        ?>
    </div>
    <footer>
        <iframe src="../communs/footer.php"></iframe> 
    </footer>
</body>
</html>