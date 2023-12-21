function seConnecter() {

	top.location.href = "../connexion.php";

}

function monCompte() {

	// 

}
function submitconfirm(motDePasse,email,form){
                
    var mail = email;
    //var mail = document.forms["fcontact"]["email"].value;
    var mdp = motDePasse;
    if (mdp.length < 8)
    {
        alert("Votre mot de passe est trop court");
        return false;
    }
    atpos= mail.indexOf("@");
    dotpos = mail.indexOf(".");
    else if (atpos<1 ||(dotpos - atpos<2))
    {
        alert("Entrez un mail valide svp");
        return false;
    }
    else{
    	form.submit();
    	return true;
    }
}

function executerFonctionPHP(nomFonction) {
    // Envoie une requête AJAX avec le nom de la fonction en tant que paramètre
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fonctions.php?nomFonction=' + nomFonction, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // La réponse de la requête peut être affichée si nécessaire
            console.log(xhr.responseText);
        }
    };
    xhr.send();
}