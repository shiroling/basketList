<?php
    require("../fonctionsPhp/session.php");
    require("../fonctionsPhp/Rencontre.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/Style.css" rel="stylesheet">
    <title>Rencontre</title>
</head>
<body>
    <?php
        require("header.php");
    ?>
    <?php
        echo"<main>";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $r = getRencontre($id);
            echo printVisuRencontre($r);
            echo "<section class=\"laListe\">";
            printTableauJoueursRencontre($r);
            echo "</section>
                    <a target='_self' href=\"ModifierRencontre.php?id=". $r['Id_Rencontre']."\" target=\"_blank\"> <input type=\"button\" value=\"Modifier\" /></a>
                </div>";
        } else {
            echo ("<h3> Aucun joueur à afficher</h3>");
        }
        echo"</main>";
    ?>

</body>
</html>