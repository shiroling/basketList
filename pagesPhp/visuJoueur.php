<?php
require("../fonctionsPhp/session.php");
require("../fonctionsPhp/Joueur.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Joueur</title>
        <link href="../css/Style.css" rel="stylesheet">

    </head>
    <body>

    <?php
        require("header.php");
    ?>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $j = getJoueur($id)->fetch();
            printVisuJoueur($j);
        } else {
            echo ("<h3> Aucun joueur à afficher</h3>");
        }
    ?>
    </body>
</html>