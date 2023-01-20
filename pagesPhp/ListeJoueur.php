<?php
    require("../fonctionsPhp/Joueur.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/Joueur.css" rel="stylesheet">
    <title>ListeJoueur </title>
</head>
<body>

    <header>
        <input type="button" value="Ajouter un nouveau joueur">
    </header>
    <?php
        printTableauJoueursAll();
    ?>

</body>
</html>