<?php
require("../fonctionsPhp/Joueur.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Joueur</title>
        <link href="../css/Joueur.css" rel="stylesheet">

    </head>
    <body>

    <?php
        require("header.php");
    ?>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $joueurs = getJoueur($id);
            printVisuJoueur($joueurs);
        } else {
            echo ("<h3> Aucun joueur à afficher</h3>");
        }
    ?>
    </body>
</html>