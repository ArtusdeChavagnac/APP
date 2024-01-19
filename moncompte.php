<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" href="images/shortcut icon.png">
    <script src="../script.js"></script>
    <title>Mon compte SonoTech</title>
</head>
<body>
    <nav>
        <iframe src="communs/header.php"></iframe>
    </nav>

    <h1>Mon compte</h1>

    <div id="div-contenu">
        <div>
        <p>Bienvenue sur votre espace personnel.</p>
            <button onclick="modifierInformations()">Modifier mes informations</button>
        
                <form id="profilForm" style="display: none;">
                    <label for="nom" style="display: inline-block; width: 150px; text-align: left;">Nom:</label>
                    <input type="text" id="nom" name="nom" required><br>

                    <label for="prenom" style="display: inline-block; width: 150px; text-align: left; ">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" required><br>

                    <label for="email" style="display: inline-block; width: 150px; text-align: left;">Email:</label>
                    <input type="email" id="email" name="email" required><br>

                    <label for="telephone" style="display: inline-block; width: 150px; text-align: left;">Numéro de téléphone:</label>
                    <input type="text" name="telephone" placeholder="Numéro de téléphone" required><br>

                    <label for="dateNaissance" style="display: inline-block; width: 150px; text-align: left;">Date de naissance:</label>
                    <input type="date" id="dateNaissance" name="dateNaissance"><br>
                    
                    <button type="button" onclick="enregistrerInformations()">Enregistrer</button>
                </form>
        </div>

        <div>
            <label for="artistesFavoris">Choisis ton artiste préféré:</label>
            <select id="artistesFavoris">
                <option value="artiste1">BOOBA</option>
                <option value="artiste2">Travis Scott</option>
                <option value="artiste3">DJ Snake</option>
            
            </select><br>

        
            <label for="concertsFavoris">Choisis ta salle de concerts favorite:</label>
            <select id="concertsFavoris">
                <option value="concert1">Olympia-Paris</option>
                <option value="concert2">Zénith-Paris</option>
                <option value="concert3">Bercy-Paris</option>
            
            </select><br>
            </div>

        
                <button onclick="voirAnciensConcerts()">Voir mes anciens concerts</button>

        
                <button onclick="mettrePhotoProfil()">Ajouter une photo de profil</button>

                <button onclick="voirAbonnement()">Voir mon abonnement</button>
        
                <input type="file" id="inputPhoto" style="display: none;" accept="image/*" onchange="previewPhoto()">

                <button id="deconnexionBtn" onclick="demanderConfirmation()">
                    <span class="icon">🔒</span> Se déconnecter
                </button>       
        
                <img id="photoProfilPreview" src="#" alt="Photo de profil" style="display: none;position: fixed; top: 10px; right: 10px; width: 60px; height: 60px; border-radius: 50%;">
    </div>

    <footer>
        <iframe src="communs/footer.php"></iframe>
    </footer>
    <script>
        function modifierInformations() {
            var profilForm = document.getElementById('profilForm');
            profilForm.style.display = 'block';
        }

        function enregistrerInformations() {
            // Ajoutez ici le code pour enregistrer les informations du profil
            alert("Fonctionnalité à implémenter : Enregistrer les informations");
            
            // Après l'enregistrement, masquez le formulaire
            var profilForm = document.getElementById('profilForm');
            profilForm.style.display = 'none';
        }

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
            // Ajoutez ici le code pour voir les anciens concerts
            alert("Fonctionnalité à implémenter : Voir les anciens concerts");
        }

        function mettrePhotoProfil() {
            var inputPhoto = document.getElementById('inputPhoto');
            inputPhoto.click(); // Cliquez sur l'input file pour choisir une photo
        }
        function voirAbonnement() {
        
        alert("Fonctionnalité à implémenter : Voir mon abonnement");
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

        function previewPhoto() {
            var inputPhoto = document.getElementById('inputPhoto');
            var preview = document.getElementById('photoProfilPreview');
            
            var file = inputPhoto.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block';
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

