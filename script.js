function submitconfirm(motDePasse, email, form) {
var mail = email;
// var mail = document.forms["fcontact"]["email"].value;
var mdp = motDePasse;
if (mdp.length < 8) {
alert("Votre mot de passe est trop court");
return false;
}
atpos = mail.indexOf("@");
dotpos = mail.indexOf(".");
else if (atpos < 1 || (dotpos - atpos < 2)) {
alert("Entrez un mail valide svp");
return false;
} else {
form.submit();
return true;
}
}
