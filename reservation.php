<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" href="images/shortcut icon.png">
    <script src="script.js"></script>
    <title>Réservation de Billets — SonoTech</title>
</head>
<body>
    <header><iframe src="communs/header.html"></iframe></header>
    
    <div id="div-contenu">
        <h1>Réservation de Billets</h1>
        
        <img src="" id="displayedImage" alt="Displayed Image">
    <script>
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        // Récupère l'URL de l'image à afficher depuis les paramètres de l'URL
        var imageSrc = getParameterByName('src');

        // Affiche l'image
        if (imageSrc) {
            document.getElementById('displayedImage').src = imageSrc;
        } else {
            // Redirige vers la page d'accueil si l'URL de l'image n'est pas fournie
            window.location.href = 'index.html';
        }
    </script>
    <script type="text/javascript">
        function submitconfirm()
        {
    
        
        var result = confirm("Etes-vous sure de valider votre achat?");
        if (result == true) {
            alert("Merci pour votre achat");
        }
        else {
            alert("");
        }
        }
            
    </script>


        <!-- Formulaire de réservation -->
        <form id="reservation-form">
                
            </select>

            <label>Choisissez le type de place :</label>
            <div>
                <input type="radio" id="placeNormale" name="typePlace" value="normale" checked>
                <label for="placeNormale">Place Normale</label>
            </div>

            <div>
                <input type="radio" id="placeVIP" name="typePlace" value="VIP">
                <label for="placeVIP">Place VIP (plus cher)</label>
            </div>

            <label for="date">Choisissez une date :</label>
            <input type="date" id="date" name="date" required>

            <label for="heure">Choisissez une heure :</label>
            <input type="time" id="heure" name="heure" required>

            <label for="nombre-billets">Nombre de billets :</label>
            <input type="number" id="nombre-billets" name="nombre-billets" min="1" required> <br>

            <label for="prix-total">Prix total :</label>
            <span id="prix-total">0 €</span>

            <button type="submit" onclick= "submitconfirm()">Réserver</button>
        </form>
    </div>

    <footer><iframe src="communs/footer.html"></iframe></footer>

    <script>
        // JavaScript pour calculer le prix total en fonction du nombre de billets et du type de place
        document.getElementById('nombre-billets').addEventListener('input', function() {
            var nombreBillets = this.value;
            var prixUnitaire = 10; // Prix de billet pour une place normale
            var typePlace = document.querySelector('input[name="typePlace"]:checked').value;

            // Prix unitaire différent pour une place VIP
            if (typePlace === 'VIP') {
                prixUnitaire = 20; //  A Changer selon le prix du billet VIP
            }

            var prixTotal = nombreBillets * prixUnitaire;
            document.getElementById('prix-total').textContent = prixTotal + ' €';
        });
    </script>
</body>
</html>
