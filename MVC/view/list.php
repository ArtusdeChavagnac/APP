<form action = "index.php" method = "get">
Nom : <input type = "text" name = "nom" value = "<?php echo $nom; ?>"/>
Prenom : <input type = "text" name = "prenom" value = "<?php echo $prenom; ?>"/>
<input type = "hidden" name = "id" value = "<?php echo $id; ?>"/>
<input type = "hidden" name = "action" value = "save"/>
<input type = "submit"/>
</form>