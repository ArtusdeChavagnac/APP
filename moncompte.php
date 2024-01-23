

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
        function modifierInformations() {
            var profilForm = document.getElementById('profilForm');
            profilForm.style.display = 'block';
        }

        function enregistrerInformations() {
            var nom = document.getElementById('nom').value;
            var prenom = document.getElementById('prenom').value;
            var adresse_email = document.getElementById('adresse_email').value;
            var numero_de_telephone = document.getElementById('numero_de_telephone').value;
            var date_de_naissance = document.getElementById('date_de_naissance').value;

            var data = {
                nom: nom,
                prenom: prenom,
                adresse_email: adresse_email,
                numero_de_telephone: numero_de_telephone,
                date_de_naissance: date_de_naissance
            };

            $.ajax({
                type: 'POST',
                url: 'enregistrer_informations.php', 
                data: data,
                success: function (response) {
                    alert("Informations enregistrées avec succès!");
                    var profilForm = document.getElementById('profilForm');
                    profilForm.style.display = 'none';
                },
                error: function (error) {
                    alert("Une erreur s'est produite lors de l'enregistrement des informations.");
                    console.error(error);
                }
            });

            alert("Voulez-vous vraiment enregistrer ces informations?");
            
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
        
        function modifierMotDePasse() {
            var motDePasseForm = document.getElementById('motDePasseForm');
            motDePasseForm.style.display = 'block';
        }

        function enregistrerMotDePasse() {
            // Récupérer les valeurs des champs du formulaire
            var ancienMotDePasse = document.getElementById('ancienMotDePasse').value;
            var nouveauMotDePasse = document.getElementById('nouveauMotDePasse').value;
            var confirmationMotDePasse = document.getElementById('confirmationMotDePasse').value;

            // Vérifier si les champs sont vides
            if (!ancienMotDePasse || !nouveauMotDePasse || !confirmationMotDePasse) {
                alert("Veuillez remplir tous les champs.");
                return;
            }

            // Vérifier si les nouveaux mots de passe correspondent
            if (nouveauMotDePasse !== confirmationMotDePasse) {
                alert("Les nouveaux mots de passe ne correspondent pas.");
                return;
            }

            // Construire l'objet avec les données à envoyer
            var data = {
                ancienMotDePasse: ancienMotDePasse,
                nouveauMotDePasse: nouveauMotDePasse
            };

            // Envoyer les données au serveur via une requête AJAX
            $.ajax({
                type: 'POST',
                url: 'modifier_mot_de_passe.php', // Remplacez par le chemin de votre script serveur
                data: data,
                success: function (response) {
                    alert(response);
                    var motDePasseForm = document.getElementById('motDePasseForm');
                    motDePasseForm.style.display = 'none';
                },
                error: function (error) {
                    alert("Une erreur s'est produite lors de la modification du mot de passe.");
                    console.error(error);
                }
            });
    
        }
    </script>
</body>
</html>

