<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel = "stylesheet" href = "stylesheet.css">
<link rel = "shortcut icon" href = "images/shortcut icon.png">
<script src = "script.js"></script>
<title>Rediffusions — SonoTech</title>
</head>
<body>
<header><iframe src = "communs/header.php"></iframe></header>
<div id = "div-contenu">
<h1>Rediffusions de Concerts</h1>
<p>Bienvenue sur notre page de rediffusions de concerts. Découvrez ci-dessous les performances passées disponibles en rediffusion :</p>
<h2>Concerts disponibles</h2>
<table>
<tr>
<th>Date</th>
<th>Artiste</th>
<th>Titre du Concert</th> 
<th>Qualité sonore</th>
</tr>
<tr>
<td>08/04/2023</td>
<td>SDM</td>
<td><a href = "videos\Concert SDM.mp4">SDM à l'Olympia</a></td>
<td>
<select>
<option value = "haute">Haute</option>
<option value = "moyenne">Moyenne</option>
<option value = "basse">Basse</option>
</select>
</td> 
</tr>
<td>08/02/2019</td>
<td>Damso</td>
<td><a href = "videos\damso feu de bois.mp4">Victoire de la musique</a></td>
<td>
<select>
<option value = "haute">Haute</option>
<option value = "moyenne">Moyenne</option>
<option value = "basse">Basse</option>
</select>
</td> 
<tr>
<td>18/11/2012</td>
<td>Sexion d'assaut</td>
<td><a href = "videos\Sexion d'assaut.mp4">Sexion d'assaut - Bercy</a></td>
<td>
<select>
<option value = "haute">Haute</option>
<option value = "moyenne">Moyenne</option>
<option value = "basse">Basse</option>
</select>
</td>
</tr>
</table>
<h2>Regarder une rediffusion</h2>
<p>Sélectionnez un concert ci-dessus pour accéder à sa rediffusion.</p>
<div class = "contenu-video">
<video controls width = "500" height = "250">
<source src = "videos\Concert SDM.mp4" type = "video/mp4">
Votre navigateur ne supporte pas la lecture de vidéos.
</video>
<span class = "titre-video">SDM à l'Olympia</span>
</div>
<div class = "contenu-video">
<video controls width = "500" height = "250">
<source src = "videos\damso feu de bois.mp4" type = "video/mp4">
Votre navigateur ne supporte pas la lecture de vidéos.
</video>
<span class = "titre-video">Victoire de la musique</span>
</div>
<div class = "contenu-video">
<video controls width = "500" height = "250">
<source src = "videos\Sexion d'assaut.mp4" type = "video/mp4">
Votre navigateur ne supporte pas la lecture de vidéos.
</video>
<span class = "titre-video">Sexion d'assaut - Bercy</span>
</div>
</div>
<footer>
<p>&copy; 2023 Rediffusions de Concerts. Tous droits réservés.</p>
<br>
<iframe src = "communs/footer.php"></iframe>
</footer>
</body>
</html>
