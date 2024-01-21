<?php

session_start();

?>

<!DOCTYPE html>
<html lang = "fr">
	<head>
		<meta charset = "utf-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
		<link rel = "stylesheet" href = "../stylesheet.css">
		<script src = "../script.js"></script>
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
				<td><a href ="../rediffusions.php" target = "_top">Rediffusions</a></td>
				<td><a href ="../faq.php" target ="_top">FAQ</a></td>
				<td><?php

					if (isset($_SESSION['utilisateur_abonnement_idAbonnement'])){
						if ($_SESSION['utilisateur_abonnement_idAbonnement'] == 2) {
							echo "<a href = '../admin/dashboard.php' target ='_top'>DashBoard</a>";
						}
					}

				?></td>
				<td>
					<?php
						if(isset($_SESSION["utilisateur_connecte"])) {
							echo "<a href ='../moncompte.php' target ='_top'><button>Mon compte</button></span>";
							echo "<a href ='../deconnection.php' target ='_top'><button>Déconnection</button></span> ";
						} else {
							echo "<a href ='../connexion.php' target ='_top'><button>Se connecter</button></span>";
						}
					?>
				</td>
			</tr>
		</table>
	</body>
</html>
