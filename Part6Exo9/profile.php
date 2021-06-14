<?php
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $lastname = $_POST['lastname'];
  $firstname = $_POST['firstname'];
  $birthDate = $_POST['birthDate'];
  $file = $_FILES['myFile'];
  $fileName = $_FILES['myFile']['name'];
  $fileType = $_FILES['myFile']['type'];
  $uploaddir = 'images/';
  $uploadfile = $uploaddir . basename($_FILES['myFile']['name']);
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP - PART 6 - EXO 9</title>
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
  <p>Civilité : <?= $title ?></p>


</body>

</html>