<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sonotech";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo "La connexion à la base de données a échoué : " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["numero_de_telephone"];
    $date_naissance = $_POST["date_de_naissance"];

    // Mettre à jour les informations dans la base de données
    $userID = 5; // Vous devez remplacer ceci par l'ID de l'utilisateur dont vous souhaitez mettre à jour les informations
    $query = $bdd->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, adresse_email = ?, numero_de_telephone = ?, date_de_naissance = ? WHERE idUtilisateur = ?");
    $query->execute([$nom, $prenom, $email, $telephone, $date_naissance, $userID]);

    // Rediriger l'utilisateur vers la page de profil ou une autre page appropriée
    header("Location: moncompte.php"); 
    exit();
}
?>
