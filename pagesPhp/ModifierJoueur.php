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
    function isMeneur($j) {
        if ($j['Poste'] == 'MENEUR') {
            return true;
        }
        return false;
    }

    function isAilier($j) {
        if ($j['Poste'] == 'AILIER') {
            return true;
        }
        return false;
    }

    function isPivot($j) {
        if ($j['Poste'] == 'PIVOT') {
            return true;
        }
        return false;
    }

    


    function printModifJoueur($j) {
        echo("
        <main>
            <img src=\"".getImageJoueur($j)."\" alt=\"image de ".$j['Nom']."\" width=\"30%\">
            <form action='../fonctionsPhp/changerParamJoueur.php?id_joueur=".$j['Id_Joueur']."' method='POST'>
            <section class=\"caracteristique\">
                <div class=\"pitiCarte\">
                    <table>
                        <th>
                            Nom
                        </th>
                        <tr>
                            <td>
                                <input type=\"text\" name='nom' value=\"".$j['Nom']."\">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class=\"pitiCarte\">
                <table>
                    <th>
                        Prenom
                    </th>
                    <tr>
                        <td>
                            <input type=\"text\" name='prenom' value=\"".$j['Prenom']."\">
                        </td>
                    </tr>
                </table>
            </div>
            <div class=\"pitiCarte\">
                <table>
                    <th>
                        Numero
                    </th>
                    <tr>
                        <td>
                            <input type=\"text\" name='numero' value=\"".$j['Numero']."\">
                        </td>
                    </tr>
                </table>
            </div>
            <div class=\"pitiCarte\">
                <table>
                    <th>
                        Poste
                    </th>
                    <tr>
                        <td>
                            <select name=\"poste\">
                                <option value=\"MENEUR\" " . (isMeneur($j) ? "selected" : "") . ">Meneur</option>
                                <option value=\"AILIER\" " . (isAilier($j) ? "selected" : "") . ">Ailier</option>
                                <option value=\"PIVOT\" " .  (isPivot($j) ? "selected" : "") . ">Pivot</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class=\"pitiCarte\">
                <table>
                    <th>
                        Date naissance
                    </th>
                    <tr>
                        <td>
                            <input type='date' name='dateNaissance' value='".$j['DateNaissance']."'>
                        </td>
                    </tr>
                </table>
            </div>
            <div class='pitiCarte'>
                <table>
                    <th>
                        Taille
                    </th>
                    <tr>
                        <td>
                            <input type='text' name='taille' value='".$j['Taille'])."cm'>
                        </td>
                    </tr>
                </table>
            </div>
            <div class='pitiCarte'>
                <table>
                    <th>
                        Poid
                    </th>
                    <tr>
                        <td>
                            <input type='text' name='poid' value='".$j['Poid']."cm'>
                        </td>
                    </tr>
                </table>
            </div>
            <div class='pitiCarte'>
                <table>
                    <th>
                        Status

                    </th>
                    <tr>
                        <td>
                            <select name='status'>
                                <option value='ACTIF'". ($j['Statut'] == 'ACTIF' ? "selected" : "") ." >ACTIF</option>
                                <option value='BLESSE'". ($j['Statut'] == 'BLESSE' ? "selected" : "") .">BLESSE</option>
                                <option value='SUSPENDU'" . ($j['Statut'] == 'SUSPENDU' ? "selected" : "") .">SUSPENDU</option>
                                <option value='ABSENT' " . ($j['Statut'] == 'ABSENT' ? "selected" : "") . ">ABSENT</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <input type='submit' value='Valider'>
                <a href=\"visuJoueur.php?id=". $j['Id_Joueur']."\" target=\"_blank\"> <input type=\"button\" value=\"Annuler\" /></a>
            </div>
            </form>
        </section>
        <br>
    </main>";
    }

    require("../fonctionsPhp/Joueur.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $j = getJoueur($id)->fetch();
        printModifJoueur($j);
    } else {
        echo ("<h3> Aucun joueur à afficher</h3>");
    }
    ?>
</body>
</html>