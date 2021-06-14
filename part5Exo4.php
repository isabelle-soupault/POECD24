<?php
$months[0] = 'janvier';
$months[1] = 'février';
$months[2] = 'mars';
$months[3] = 'avril';
$months[4] = 'mai';
$months[5] = 'juin';
$months[6] = 'juillet';
$months[7] = 'aout';
$months[8] = 'septembre';
$months[9] = 'octobre';
$months[10] = 'novembre';
$months[11] = 'décembre';

$textOrigin = array('aout');
$textReplace =array ('août');
$textFinal = str_replace ($textOrigin, $textReplace, $months[7]);
?> 
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 5 - Exercice 4</title>
</head>
<body>
<div class="container">
    <h1>Exercice 4</h1>

    <p text-center> Avec le tableau de l'exercice 1, modifier le mois de aout pour lui ajouter l'accent manquant.</p>

</div>
<div class="container text-center mt-4">
 <p> Remplacement du mot aout par  <?= $textFinal ?></p>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
