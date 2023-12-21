function seConnecter() {

	top.location.href = "../connexion.php";

}

function monCompte() {

	// 

}
function submitconfirm(){
                
    var mail = document.fcontact.email.value;
    //var mail = document.forms["fcontact"]["email"].value;
    var password = document.fcontact.password.value;
    if (password=="")
    {
        alert("Veuillez saisir votre mot de passe");
        document.fcontact.password.focus();
        return false;
    }
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