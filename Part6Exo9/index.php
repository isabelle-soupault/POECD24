        <?php if (empty($lastname)) : ?>
            <p>Le nom n'a pas été saisi.</p>
        <?php else :
            return $_POST($lastname);
        endif ?>

        <?php if (empty($firstname)) : ?>
            <p>Le prénom n'a pas été saisi.</p>
        <?php else :
            return $_POST($firstname);
        endif ?>

        <?php if (empty($birthDate)) : ?>
            <p>La date de naissance n'a pas été sélectionnée.</p>
        <?php else :
            return $_POST($birthdate);
        endif ?>

        <?php if (!empty($file) && $fileType == 'image/jpeg') : ?>
            <p>Nom du fichier : <?= $fileName ?></p>
            <p>Type de fichier : <?= $fileType ?></p>
            <?php if (move_uploaded_file($_FILES['myFile']['tmp_name'], $uploadfile)) : ?>
                <p>Fichier téléchargé avec succès !</p>
            <?php else : ?>
                <p>Fichier non téléchargé !</p>
            <?php endif ?>
        <?php else : ?>
            <p>Pas de fichier chargé ou fichier qui n'est pas une image jpeg !</p>

        <?php endif ?>


        <!DOCTYPE html>
        <html lang="fr" dir="ltr">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Partie 6 - Exercice 9</title>
        </head>

        <body>
            <h1>PHP - PART 6 - EXO 9</h1>
            <p>Créer un formulaire de création de profil sur la page index.php avec :
            <ul>
                <li>Des bouton radio pour civilité (Mr ou Mme)</li>
                <li>Un champ texte pour le nom</li>
                <li>Un champ texte pour le prénom</li>
                <li>Un champ date pour la date de naissance</li>
                <li>Un champ d'envoi de fichier pour l'image de profil.</li>
            </ul>
            A la soumission du formulaire, si tous les champs sont correctement renseignés, uploadez l'image de profil dans un dossier image que vous auriez créé en amont. Afficher le profil de l'utilisateur dans une page profile.php</p>
            <hr>
            <?php if (empty($_POST['nom']) || empty($_POST['prenom']) || $_FILES['file']['type'] != 'application/pdf'  || empty($_POST['civilite'])) : ?>
                <form action="profile.php" method="POST" enctype="multipart/form-data">
                    <label for="title">Civilité : </label>
                    <div>
                        <input type="radio" id="monsieur" name="title" value="Monsieur">
                        <label for="monsieur">Monsieur</label>
                    </div>
                    <div>
                        <input type="radio" id="madame" name="title" value="Madame">
                        <label for="madame">Madame</label>
                    </div>
                    <label for="lastname">Nom : </label>
                    <input type="text" id="lastname" name="lastname" value="<?= $_POST($lastname) ?>">
                    <label for="firstname">Prénom : </label>
                    <input type="text" id="firstname" name="firstname" value="<?= $_POST($firstname) ?>">
                    <label for="birthDate">Date de naissance : </label>
                    <input type="date" id="birthDate" name="birthDate" value="<?= $_POST($birthDate)  ?>">
                    <label for="files">Fichier : </label>
                    <input type="file" id="myFile" name="myFile">
                    <input type="submit" name="submit" value="valider">
                    <p>
                    <ul style="list-style-type: none;">
                        <li><?= $civilError ?> </li>
                        <li><?= $nameError ?> </li>
                        <li><?= $surnameError ?></li>
                        <li><?= $formatError ?></li>

                    </ul>
                <?php else : ?>
                    <p> La civilité de notre utilisateur est : <?= $civil ?> <br>
                        Le prénom de notre utilisateur est : <?= $surname ?> <br>
                        et le nom de famille de notre utilisateur est <?= $name ?> <br>
                        Le fichier mis à disposition se nomme <?= $format ?> <br>
                        Et son extansion est de type <?= $_FILES['file']['type'] ?> <br>
                    <?php endif ?>

                    </p>
                </form>
        </body>

        </html>