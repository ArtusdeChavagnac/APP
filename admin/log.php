<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="shortcut icon" href="../images/shortcut icon.png"> 
    <script src="../script.js"></script> 
    <title>Gestion FAQ — SonoTech</title>
</head>
<body>
    <header>
        <iframe src="../communs/header.php"></iframe>
    </header>
    <div id="div-contenu">
    <h1>Logs de la passerelle</h1>

    <?php
    // Récupération des données
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G05E");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);
    curl_close($ch);

    // Mise en forme des données sous forme de tableau
    $data_tab = str_split($data, 33);

    // Affichage des données sous forme de tableau HTML
    echo '<table>';
    echo '<tr><th>TRA</th><th>OBJ</th><th>REQ</th><th>TYP</th><th>NUM</th><th>VAL</th><th>TIM</th><th>CHK</th><th>Timestamp</th></tr>';
    foreach ($data_tab as $trame) {
        // Découpage de la trame en tenant compte de l'espace avant CHK
        $tra = substr($trame, 0, 1);
        $obj = substr($trame, 1, 4);
        $req = substr($trame, 5, 1);
        $typ = substr($trame, 6, 1);
        $num = substr($trame, 7, 2);
        $val = substr($trame, 9, 4);
        $tim = substr($trame, 13, 4);
        $chk = trim(substr($trame, 17, 2)); // Utilisation de trim pour supprimer les espaces
        $year = substr($trame, 19, 4);
        $month = substr($trame, 23, 2);
        $day = substr($trame, 25, 2);
        $hour = substr($trame, 27, 2);
        $min = substr($trame, 29, 2);
        $sec = substr($trame, 31, 2);

        // Construction du timestamp
        $timestamp = sprintf("%04d/%02d/%02d %02d:%02d:%02d", $year, $month, $day, $hour, $min, $sec);

        // Vérification si le timestamp est valide
        if (checkdate((int)$month, (int)$day, (int)$year) && $hour < 24 && $min < 60 && $sec < 60) {
            echo "<tr><td>$tra</td><td>$obj</td><td>$req</td><td>$typ</td><td>$num</td><td>$val</td><td>$tim</td><td>$chk</td><td>$timestamp</td></tr>";
        } else {
            echo "<tr><td>$tra</td><td>$obj</td><td>$req</td><td>$typ</td><td>$num</td><td>$val</td><td>$tim</td><td>$chk</td><td>Invalid Timestamp</td></tr>";
        }
    }
    echo '</table>';
    ?>

</div>
<footer>
        <iframe src="../communs/footer.php"></iframe> 
</footer>
</body>
</html>
