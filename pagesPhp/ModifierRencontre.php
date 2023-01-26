<?php 
    require("../fonctionsPhp/session.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/Style.css" rel="stylesheet">
    <title>Modifier Rencontre</title>
</head>
<body>
<?php

    require("../fonctionsPhp/Rencontre.php");
    function printModifRencontre($id_rencontre) {
        $r = getRencontre($id_rencontre);
        echo "
        <main>
        <section class='LesPitiCarts'>
        <form action='../fonctionsPhp/changerParamRencontre.php?id_rencontre=".$id_rencontre."' method='POST'>
            <div class='LesPitiCarts'>
                <div class='pitiCarte'>
                    <table>
                    <tr>
                        <th>
                            Nom equipe adverse
                        </th>
                    </tr>
                    <tr>
                        <td>
                        <input type='text' name='nomOpposant' value='".$r['NomOpposant']."'>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class='pitiCarte'>
                    <table>
                    <tr>
                        <th>
                            Heure debut
                        </th>
                    </tr>
                    <tr>
                        <td>
                        <input type='time' name='debut' value='".$r['HeureDebut']."'>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class='pitiCarte'>
                    <table>
                    <tr>
                        <th>
                            Heure fin
                        </th>
                    </tr>
                    <tr>
                        <td>
                        <input type='time' name='fin' value='".$r['HeureFin']."'>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class='pitiCarte'>
                    <table>
                    <tr>
                        <th>
                            Date
                        </th>
                    </tr>
                    <tr>
                        <td>
                        <input type='date' name='date' value='".$r['DateMatch']."'>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class='pitiCarte'>
                    <table>
                    <tr>
                        <th>
                            Lieu
                        </th>
                    </tr>
                    <tr>
                        <td>
                        <input type='text' name='lieu' value='".$r['Lieu_de_rencontre']."'>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class='pitiCarte'>
                    <table>
                    <tr>
                        <th>
                            Score locaux
                        </th>
                    </tr>
                    <tr>
                        <td>
                        <input type='text' name='scoreLocaux' value='".$r['ScoreLocaux']."'>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class='pitiCarte'>
                    <table>
                    <tr>
                        <th>
                            Score Visiteur
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <input type='text' name='scoreVisiteurs' value='".$r['ScoreVisiteurs']."'> 
                        </td>
                    </tr>
                    </table>
                </div>
            </div>
            <input target='_self' type='submit' value='Mettre à jour'>
            <a target='_self' href=\"visuRencontre.php?id=". $r['Id_Rencontre']."\" target=\"_blank\"> <input type=\"button\" value=\"Annuler\" /></a>

        </form>
        </section>";

    echo printTableauJoueursActifsModif($r['Id_Rencontre']).
    "</main>";
    }
    require("header.php");
    if (!isset($_GET['id'])) {
        echo "<h2>Aucune rencontre à modifier</h2>";
    }else {
        $id_rencontre = $_GET['id'];
        printModifRencontre($id_rencontre); 
    }
?>
</body>
</html>