<?php

declare(strict_types=1);

function compareNumber(float $number1, float $number2)
{
    if ($number1 > $number2) {
        return $number1;
    } else {
        return $number2;
    }
}
try { ?>
    <p><?php echo compareNumber(-2, -200) ?></p>
    <p><?php echo compareNumber('ioehzroieh', 'jpzeifpifj') ?></p>
<?php
} catch (TypeError $error) { ?>
    <p>Une erreur est survenue : <?php echo $error->getMessage() ?>. Veuillez contacter le Webmaîstre. </p>
<?php } ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 4 - Exercice 9</title>
</head>

<body>
    <div class="container">
        <h1>Exercice 9</h1>

        <p text-center> Faire une fonction qui prend deux paramètres : nombre 1 et nombre 2. Elle doit renvoyer le plus grand des deux.

        </p>

    </div>
    <div class="container text-center mt-4">

        <p><?php echo comparTwoNumbers('text', djpppd); ?></p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>


<!------------------------------------------------------->
<!--                  Correction                       -->
<!------------------------------------------------------->

<!--

Depuis le début de ces fonctions, on type strict les fonctions mais on ne fait rien de plus.
Néanmoins en faisant ça, parfois on peut avoir des exceptions. Et il faut les voir....

Avant, on faisait une vérification du typage, mais maintenant on ne le pratique plus car fastidieux.

En marquant $result = compreTwoNumbers('text', djpppd); on obtient une fatale error.
Pour éviter cela, on va
utiliser try





->