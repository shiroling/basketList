<?php
    include("../fonctionsPhp/Rencontre.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>ListeJoueur </title>
</head>
<body>

    <?php

        require("header.php")
    ?>

    <div>
        <input type="button" value="Ajouter">
    </div>
    <div>
    <?php
        printRencontresAll();
    ?>
        
    </div>

    <table>
        <th>
            Nom Equipe adverce
        </th>
        <th>
            Date
        </th>
        <th>
            Poste
            
        </th>
        <th>
           
            Status
            
        </th>
        <th>
            
            Supprimer
            
        </th>
        <th>
           
           Voir details
            
        </th>
        <!-- un tr par joueur -->
        <tr>
            <td>
                unNom
            </td>
            <td>
                unPrenom
            </td>
            <th>
                unPoste
            </th>
            <td>
                unStatus
            </td>
            <td>
                <input type="button" value="Supprimer" />
            </td>
        </tr>
        
    </table>
</body>
</html>