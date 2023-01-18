<?php
require("conx.php");

function getJoueur($idJoueur) {
    $pdo = getPDOConnection();
    $st = $pdo->prepare("Select * from Joueur where id_joueur = ?");
    $st->bindParam(1, $id);
    $id = $idJoueur;
    $st->execute();
    return $st;
    
}
function getJoueurs() {
    $pdo = getPDOConnection();
    $st = $pdo->query("Select * from Joueur");   
    return $st;
}

function getImageJoueur($j) {
    return "../img/" . $j['Photo'];
}

function getJoueursActifs() {
    $pdo = getPDOConnection();
    $st = $pdo->query("Select * from Joueur where statut = 'ACTIF'");   
    return $st;
}

function getPoste($poste) {
    if ($poste == "INTERIEUR") {
        return "pivot";
    }else
    if ($poste == "MENEUR") {
        return "meneur";
    }else
    if ($poste == "AILIER") {
        return "alier";
    }else {
        return "Poste non définit";
    }
}

function getStatut($poste) {
    if ($poste == "ACTIF") {
        return "Actif";
    }else
    if ($poste == "BLESSE") {
        return "Blessé";
    }else
    if ($poste == "SUSPENDU") {
        return "¨Suspendu";
    }else 
    if ($poste == "ABSENT") {
        return "Absent";
    }else {
        return "Statut non définit";
    }
}

function printTableauJoueursAll() {
    $st = getJoueurs();
    echo ("
        <table>
        <tr>
            <th> Licence </th>
            <th> Nom </th>
            <th> Prenom </th>
            <th> Poste </th>
            <th> Voir details</th>
        </tr>
    ");
    foreach ($st as $item) {
        echo("
        <tr>
            <td> " . $item['Licence'] . " </td>
            <td> " . $item['Nom'] . " </td>
            <td> " . $item['Prenom'] . "
            <td> " . getPoste($item['Poste']) . " </td>
            <td> <a href=\"visuJoueur.php?id=". $item['Id_Joueur']."\" target=\"_blank\"> <input type=\"button\" value=\"details\" /></a> </td>
        </tr>
        ");
    }
    echo ("</table>");
}

function printTableauJoueursActifs() {
    $st = getJoueursActifs();
    echo ("
        <table>
        <tr>
            <th> Licence </th>
            <th> Nom </th>
            <th> Prenom </th>
            <th> Poste </th>
            <th> Voir details</th>
        </tr>
    ");
    foreach ($st as $item) {
        echo("
        <tr>
            <td> " . $item['Licence'] . " </td>
            <td> " . $item['Nom'] . " </td>
            <td> " . $item['Prenom'] . "
            <td> " . getPoste($item['Poste']) . " </td>
            <td> <a href=\"visuJoueur.php?id=". $item['Id_Joueur']."\" target=\"_blank\"> <input type=\"button\" value=\"details\" /></a> </td>
        </tr>
        ");
    }
    echo ("</table>");
}

function printCarte($libele, $info) {
    echo ("
        <div class=\"pitiCarte\">
            <table>
            <tr>
                <th>
                    " . $libele . "
                </th>
            </tr>
            <tr>
                <td>
                    " . $info . "
                </td>
            </tr>
            </table>
        </div>
    ");
}

function printVisuJoueur($joueurs)
{
    foreach ($joueurs as $j) {
        echo ("
            <div>
                <div classe=\"imageJoueur\">
                    <img src=\"" . getImageJoueur($j) . "\" alt=\"image de " . $j['Nom'] . " " . $j['Prenom'] . "\" width=\"30%\">        
                </div>
                <div class=\"caracteristiques\">" .
                    printCarte("Nom", $j['Nom']) .
                    printCarte("Prenom", $j['Prenom']) .
                    printCarte("Numero", $j['Numero']) .
                    printCarte("Poste", getPoste($j)) .
                    printCarte("Date de naissance", $j['DateNaissance']) .
                    printCarte("Statut", getStatut($j)) . "
                </div>
            </div>"
        );
    }
}
    function printCartejoueur($idJoueur) {
    echo ("PrintCartejoueur() n'est pas encore implémenté !!!");
    }
?>