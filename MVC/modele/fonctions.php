<?php
function updateUsers($db, $nom, $prenom, $id) {
$reponse = $db->prepare("update users set nom = ?, prenom = ? where id = ?");
$reponse->execute(array($nom, $prenom, $id));
return $reponse;
}
function insertUsers($db, $nom, $prenom) {
$reponse = $db->prepare("INSERT INTO users (nom, prenom) VALUES (?, ?)");
$reponse->execute(array($nom, $prenom));
return $reponse;
}
function selectUser($db, $id) {
$reponse = $db->prepare("select * from users where id = ?");
$reponse->execute(array($id));
return $reponse;
}
function selectAll($db) {
$reponse = $db->prepare("select * from users");
$reponse->execute();
return $reponse;
}
?>
