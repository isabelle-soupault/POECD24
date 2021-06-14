<?php
$hautsDeFrance = [
    '02' => 'Aine',
    '59' => 'Nord',
    '60' => 'Oise',
    '62' => 'Pas-de-Calais',
    '80' => 'Somme',
];

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 5 - Exercice 6</title>
</head>

<body>
    <div class="container">
        <h1>Exercice 6</h1>

        <p text-center> Avec le tableau de l'exercice 5, afficher la valeur de l'index 59.</p>

    </div>
    <div class="container text-center mt-4">
        <p><?= $hautsDeFrance['59'] ?> </p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>

<!------------------------------------------------------->
<!--                  Correction                       -->
<!------------------------------------------------------->

<!--

Ne pas oublier si on met des chiffres en string dans l'index, de mettre dans l'appel de variable, de mettre également les quotes.
Cela va fonctionner sans, mais c'est parce que PHP va essayer de faire la conversion et dans ce sens là, ça fonctionne.


->