<?php
require("common.php");

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

function getJoueursRencontre($r) {
    $pdo = getPDOConnection();
    $st = $pdo->query("Select * from Joueur");   
    return $st;
}

function getImageJoueur($j) {
    return "../photo/" . $j['Photo'];
}

function getJoueursActifs() {
    $pdo = getPDOConnection();
    $st = $pdo->query("Select * from Joueur where statut = 'ACTIF'");   
    return $st;
}

function getPoste($poste) {
    return $poste;
}

function getStatut($statut) {
    return $statut;
}

function printTableauJoueursAll() {
    $st = getJoueurs();
    echo ("
        <main>
        <table>
        <tr>
            <th> Licence </th>
            <th> Nom </th>
            <th> Prenom </th>
            <th> Poste </th>
            <th> Voir details</th>
        </tr>
        </main>
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

function printTableauJoueursActifsModif($id_rencontre) {
    $st = getJoueursActifs();
    echo ("
        <section class='tableauJoueursActifs'>
        <form action='../fonctionsPhp/changerJoueursRencontre.php?id_rencontre=".$id_rencontre."' method='POST'>
        <table>
        <tr>
            <th>Licence </th>
            <th>Nom </th>
            <th>Prenom </th>
            <th>Poste </th>
            <th>Selectionner</th> 
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
            <td> <input type='checkbox' name='players[]' value='" . $item['Id_Joueur'] . "'> </td>
            <td> <a href=\"visuJoueur.php?id=". $item['Id_Joueur']."\" target=\"_blank\"> <input type=\"button\" value=\"details\" /></a> </td>
        </tr>
        ");
    }
    echo ("
        </table>
        <input type='submit' value='Valider'>
        </form>
        </section>
        ");
}



function printTableauJoueursRencontre($r) {
    $st = getJoueursRencontre($r);
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



function printVisuJoueur($j)
{
    return ("
        <div class='caracteristiques'>
            <div classe=\"imageJoueur\">
                <img src=\"" . getImageJoueur($j) . "\" alt=\"image de " . $j['Nom'] . " " . $j['Prenom'] . "\" width=\"30%\">        
            </div>
            <div class='caracteristiques'>
            " .
                printCarte("Nom", $j['Nom']) .
                printCarte("Prenom", $j['Prenom']) .
                printCarte("Numero", $j['Numero']) .
                printCarte("Poste", getPoste($j['Poste'])) .
                printCarte("Date de naissance", $j['DateNaissance']) .
                printCarte("Statut", getStatut($j['Statut'])) . 
            "</div>
            <div classe=\"boutons\">
                <td> <a href=\"ModifierJoueur.php?id=". $j['Id_Joueur']."\" target=\"_blank\"> <input type=\"button\" value=\"Modifier\" /></a> </td>
            </div>
        </div>"
    );
}
?>