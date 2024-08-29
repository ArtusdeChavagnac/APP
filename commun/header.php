<?php
session_start();
?>
<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel = "stylesheet" href = "../css.css">
<script src = "../js.js"></script>
<title>header</title>
</head>
<body id = "body-transparent">
<table>
<tr>
<td>
<a href = "../index.php" target = "_top">
<img src = "../images/logo.png" id = "img-logo" alt = "SonoTech">
</a>
</td>
<td><a href = "../index.php" target = "_top">Accueil</a></td>
<td><a href = "../evenements.php" target = "_top">Événements</a></td>
<td><a href = "../lieux.php" target = "_top">Lieux</a></td>
<td><a href = "../a-propos.php" target = "_top">À propos</a>
<td><a href = "../rediffusions.php" target = "_top">Rediffusions</a></td>
<td><a href = "../faq.php" target = "_top">FAQ</a></td>
<td><a href = "../forum.php" target = "_top">Forum</a></td>
<td><?php
if (isset($_SESSIon['utilisateur_abonnement_idAbonnement'])){
if ($_SESSIon['utilisateur_abonnement_idAbonnement'] == 2) {
echo "<a href = '../administration/dashboard.php' target ='_top'>DashBoard</a>";
}
}
?></td>
<td>
<?php
if(isset($_SESSIon["utilisateur_connecte"])) {
echo "<a href ='../mon-compte.php' target ='_top'><button>Mon compte</button></span>";
echo "<a href ='../deconnection.php' target ='_top'><button>Déconnexion</button></span>";
} else {
echo "<a href ='../connexion.php' target ='_top'><button>Se connecter</button></span>";
}
?>
</td>
</tr>
</table>
</body>
</html>