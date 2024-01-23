

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" href="images/shortcut icon.png">
    <script src="../script.js"></script>
    <title>Mon compte SonoTech</title>

    <style>
        #photoProfil {
            position: fixed;
            top: 10px;
            right: 10px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: none; 
        }
    </style>
</head>
<body>
    <nav>
        <iframe src="communs/header.php"></iframe>
    </nav>

    <h1>Mon compte</h1>

    <div id="div-contenu">
        <div>
        <p>Bienvenue sur votre espace personnel.</p><br>
        <img id="photoProfil" src="#" alt="Photo de profil" style="display: none; max-width: 100px; float: right; margin: 10px;">
            <a href="modifier_informations.php">Modifier mes informations</a>
            
            <a href="modifier_mdp.php">Modifier mon mot de passe</a>
        </div>
        <br>
        <div>
            <label for="artistesFavoris">Choisis ton artiste préféré:</label>
            <select id="artistesFavoris">
                <option value="artiste1">BOOBA</option>
                <option value="artiste2">Travis Scott</option>
                <option value="artiste3">DJ Snake</option>
                <option value="artiste4">Lartiste</option>
                <option value="artiste5">Madonna</option>
            
            </select><br>
        <br>
        
            <label for="concertsFavoris">Choisis ta salle de concerts favorite:</label>
            <select id="concertsFavoris">
                <option value="concert1">Olympia-Paris</option>
                <option value="concert2">Zénith-Paris</option>
                <option value="concert3">Bercy-Paris</option>
                <option value="concert4">Centre Bell-Montréal</option>
            
            </select><br>
            <br>
            </div>

        
                <button onclick="voirAnciensConcerts()">Voir mes anciens concerts</button>

                <button onclick="voirAbonnement()">Voir mon abonnement</button>

                <button onclick="mettrePhotoProfil()">Ajouter une photo de profil</button>
                <input type="file" id="inputPhoto" style="display: none;" accept="image/*" onchange="previewPhoto()">
                <img id="photoProfilPreview" src="#" alt="Photo de profil" style="display: none;position: fixed; top: 10px; right: 10px; width: 60px; height: 60px; border-radius: 50%;">

                <button onclick="modifierPhotoProfil()">Modifier la photo de profil</button>
                <button onclick="enregistrerPhotoProfil()">Enregistrer</button>

                <button id="deconnexionBtn" onclick="demanderConfirmation()">
                    <span class="icon">🔒</span> Se déconnecter
                </button> 
    </div>

    <footer>
        <iframe src="communs/footer.php"></iframe>
    </footer>
    <script>
       

        function choisirArtistesFavoris() {
            var artistesFavoris = document.getElementById('artistesFavoris');
            var selectedArtists = [...artistesFavoris.selectedOptions].map(option => option.value);
            alert("Artistes favoris sélectionnés : " + selectedArtists.join(', '));
        }

        function choisirSallesFavorites() {
            var concertsFavoris = document.getElementById('concertsFavoris');
            var selectedConcerts = [...concertsFavoris.selectedOptions].map(option => option.value);
            alert("Concerts favoris sélectionnés : " + selectedConcerts.join(', '));
        }

        function voirAnciensConcerts() {
            
            alert("Voir mes anciens concerts");
            window.location.href = "anciens_concerts.php";
        }

        function mettrePhotoProfil() {
            var inputPhoto = document.getElementById('inputPhoto');
            inputPhoto.click(); // Cliquez sur l'input file pour choisir une photo
        }
        function voirAbonnement() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // Afficher le résultat dans une boîte de dialogue, une zone sur la page, etc.
                    alert("Informations d'abonnement : 1");
                }
            };
            xhttp.open("GET", "abonnement.php", true);
            xhttp.send();
        
        }
        function demanderConfirmation() {
            var confirmation = window.confirm("Voulez-vous vraiment vous déconnecter?");

            if (confirmation) {
                seDeconnecter(); 
            }
        }
        function seDeconnecter() {
        alert("Nous ésperons vous revoir bientôt!");

        window.location.href = "deconnection.php"; 
        }

        // Fonction pour récupérer la photo de profil depuis le stockage local
        function getStoredPhoto() {
            var storedPhoto = localStorage.getItem('userPhoto');
            if (storedPhoto) {
                var photoProfil = document.getElementById('photoProfil');
                photoProfil.src = storedPhoto;
                photoProfil.style.display = 'block';
            }
        }

        
        window.onload = getStoredPhoto;

        function modifierPhotoProfil() {
            var inputPhoto = document.getElementById('inputPhoto');
            inputPhoto.click(); // Cliquez sur l'input file pour choisir une photo
        }

        // Fonction pour enregistrer la nouvelle photo de profil dans le stockage local
        function enregistrerPhotoProfil() {
            var inputPhoto = document.getElementById('inputPhoto');
            var preview = document.getElementById('photoProfil');

            // Vérifier si une nouvelle photo a été choisie
            if (inputPhoto.files.length > 0) {
                var file = inputPhoto.files[0];
                var reader = new FileReader();

                reader.onloadend = function () {
                    preview.src = reader.result;
                    preview.style.display = 'block';

                    // Stocker la nouvelle photo dans le stockage local
                    localStorage.setItem('userPhoto', reader.result);

                    // Cacher l'input de prévisualisation
                    inputPhoto.style.display = 'none';
                };

                reader.readAsDataURL(file);
            }
        }

        function mettrePhotoProfil() {
            var inputPhoto = document.getElementById('inputPhoto');
            inputPhoto.click(); // Cliquez sur l'input file pour choisir une photo
        }

        function previewPhoto() {
            var inputPhoto = document.getElementById('inputPhoto');
            var preview = document.getElementById('photoProfilPreview');

            var file = inputPhoto.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block';

                // Stocker la photo dans le stockage local
                localStorage.setItem('userPhoto', reader.result);

                // Cacher l'input de prévisualisation
                inputPhoto.style.display = 'ight; margin: 10px;';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
                preview.style.display = 'none';
            }
        }
    </script>
</body>
</html>

