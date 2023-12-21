<!DOCTYPE html>
<html lang = "fr">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<link rel = "stylesheet" href = "stylesheet.css">
	<link rel = "shortcut icon" href = "images/shortcut icon.png">
	<script src = script.js>
		function submitconfirm(){
                
	        var mail = document.fcontact.email.value;
	        //var mail = document.forms["fcontact"]["email"].value;
	        atpos= mail.indexOf("@");
	        dotpos = mail.indexOf(".");
	        if (atpos<1 ||(dotpos - atpos<2))
	        {
	            alert("Entrez un mail valide svp")
	            document.fcontact.email.focus();
	            return false;
	        }

	        return true;
	    }
	</script>
	<title>Inscription — SonoTech</title>
</head>
<body>
<header><iframe src = "communs/header.html"></iframe></header>
<div id = "div-contenu">


<h1>Inscription</h1>

<form  action="index.html" method = "post" onsubmit="return submitconfirm()">
	<input type = "email" name = "email" placeholder = "Adresse email" required><br>
	<label>Date de naissance</label><br>
	<input type = "date" name = "dateNaissance" required><br>
	<input type = "password" name = "motDePasse" placeholder = "Mot de passe" required><br>
	<input type = "radio" name = "CGU" required>
	<label>J'accepte les Conditions Générales d'Utilisation de SonoTech, proposé par Event IT.</label>
	<br>
	<button>Inscription</button>
</form>

<a href = "connexion.php">J'ai déja un compte.</a>


</div>
<footer><iframe src = "communs/footer.html"></iframe></footer>
</body>
</html>