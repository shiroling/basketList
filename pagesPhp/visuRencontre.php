<?php
    require("../fonctionsPhp/Rencontre.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/Rencontre.css" rel="stylesheet">
    <title>Rencontre</title>
</head>
<body>
    <?php
        require("header.php");
    ?>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $j = getRencontre($id);
            printVisuRencontre($j);
        } else {
            echo ("<h3> Aucun joueur à afficher</h3>");
        }
    ?>

</body>
</html>