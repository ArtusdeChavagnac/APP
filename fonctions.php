<?php
function connection($db){
try{
$bdd = new PDO('mysql:host=localhost;dbname=$db;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
}
?>