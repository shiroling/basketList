<?php


    require(../fonctionsPhp/conx.php);
    
    
    function getJoueurs() {
        $bd = new connexionBase();
        $pdo = $bd->getDB();
        $st = $pdo->query("Select * from Joueurs");   
        return $st 
    }

    function afficherListeJoueurs() {
        $st = getJoueurs();
        print_r($st);
    } 

?>
<!--
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

    <table>
        <th>
            Nom
        </th>
        <th>
            Prenom
            
        </th>
        <th>
            Poste
            
        </th>
        <th>
            
            Supprimer
            
        </th>
        <th>
           
            Modifier
            
        </th>
        <th>
           
           Voir details
            
        </th>
         un tr par joueur 
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
                <input type="button" value="Supprimer" />
            </td>
            <td>
                <input type="button" value="Modifier" />
            </td>
            <td>
                Ouvre la page Joueur
                <input type="button" value="details" />
            </td>
        </tr>
        
    </table>
</body>
</html>
-->
