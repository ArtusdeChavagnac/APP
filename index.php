<!DOCTYPE html>
<html lang = "fr">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<link rel = "stylesheet" href = "stylesheet.css">
	<link rel = "shortcut icon" href = "images/shortcut icon.png">
	<script src = script.js></script>
	<title>Accueil — SonoTech</title>
</head>
<body>
<header><iframe src = "communs/header.php"></iframe></header>
<div id = "div-contenu">


<h1>Bienvenue chez SonoTech</h1>

<p>Le son, c'est nous !</p>

<h2>Nos prochains événements</h2>
<img src="images/imgconcert/img1.jpg" onclick="openImage('imgconcert/img1.jpg')" alt="Concert 1">
<img src="images/imgconcert/img2.jpg" onclick="openImage('imgconcert/img2.jpg')" alt="Concert 2">
<script>
	function openImage(imageSrc) {
		// Redirige vers la page avec l'image en utilisant JavaScript
		window.location.href = 'reservation.php?src=images/' + encodeURIComponent(imageSrc);
	}
</script>




<h2>Notre projet</h2>

<p></p>

<script>
	function submitconfirm(){
		var result = confirm("Voulez-vous vraiment quitter cette page ?");
		if(result == true){
			alert("Merci de votre visite");
		}
		else{
			alert("Merci de rester avec nous");
		}
	}

</script>
<form action="" method="post" onsubmit="return submitconfirm()">
	<div><input type="text" name="email"></div>
	<div><input type="text" name="password"></div>
	<input type="submit" value ="Quitter">
</form>
</div>
<footer><iframe src = "communs/footer.html"></iframe></footer>
</body>
</html>
