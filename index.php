<?php

//le tableau $errors est initialisé
$errors = [];

/* 
on vérifie si la supergloabale $_POST n'est pas vide,
c'est à dire si une soumission de formulaire a eu lieu 
*/
if (!empty($_POST)) {
    // nettoyage des espaces
    $data = array_map('trim', $_POST);
    //protection contre les attaques XSS
    $data = array_map('htmlentities', $data);

    // on contrôle si le champ "firstname" n'est pas vide
    if (empty($data["firstname"])) {
        //sinon on ajoute une entrée au tableau $errors
        $errors[] = "The Firstname is mandatory";
    }

    // on contrôle si le champ "firstname" a une longueur de caractère inférieure à 10
    if (strlen($data['firstname']) > 10) {
        //sinon on ajoute une entrée au tableau $errors
        $errors[] = 'The firstname length should be less than 10 characters';
    }
    //... d'autres vérifications peuvent être effectuées
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul.form-errors {
            list-style: none;
            color: red;
        }
    </style>
</head>

<body>
    <!-- afficher les erreurs le cas échéant -->
    <?php if (!empty($errors)) : ?>
        <ul class="form-errors">
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- possible de soumettre le formualaire à une autre page
    via l'attribut action (ex: action="form.php") -->
    <form action="" method="post">
        <div>
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname">
        </div>

        <div>
            <label for="age">Age</label>
            <input type="number" name="age" id="age">
        </div>
        <button>Send</button>
    </form>
</body>

</html>