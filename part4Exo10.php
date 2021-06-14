<?php

declare(strict_types=1);

function Calculfactoriel(int $number)
{
    return gmp_fact($number);
}

$result = Calculfactoriel(3);


function computeFactorial(int $number)
{
    $product = 1;
    for ($i = 1; $i <= $number; $i++) {
        $product *= $i;
    }
    return $product;
}


function facto(int $numberBis)
{
    if ($numberBis === 0) {
        return 1;
    } else {
        return $numberBis * facto($numberBis - 1);
    }
}
$resultRecursive = facto(5);



?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 4 - Exercice 10</title>
</head>

<body>
    <div class="container">
        <h1>Exercice 10</h1>

        <p text-center> Faire une fonction qui prend en paramètre : un nombre. Elle doit renvoyer le factoriel de ce nombre.

            Bonus : faire une fonction recursive</p>

        <p><?= $result ?></p>

        <hr>

        <p>La factorielle via la Récursive est donc : <?= $resultRecursive ?></p>
    </div>
    <div class="container text-center mt-4">


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>


<!------------------------------------------------------->
<!--                  Correction                       -->
<!------------------------------------------------------->

<!--

Une factorielle est représenté par n!
et cela reeprésente mathématiquement 5*4*3*2*1 pour le 5!


Une récursive est utilisée pour éliminer les bouts de fonction qui se répètent.
C'est rarement utilisé, mais ça peut servir.

Une fonction récursive est donc une fonction qui s'appelle elle-même.

->