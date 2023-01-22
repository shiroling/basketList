<?php
require("Joueur.php");

function getRencontre($idRencontre) {
    $pdo = getPDOConnection();
    $st = $pdo->prepare("Select * from Rencontre where id_rencontre = ?");
    $st->bindParam(1, $id);
    $id = $idRencontre;
    $st->execute();

    return $st->fetch();
}

function getRencontresAll() {
    $pdo = getPDOConnection();
    $st = $pdo->query("Select * from Rencontre");   
    return $st;
}

function isDomicile($r) {
    return $r['Lieu_de_rencontre'] == "LOCAL";
}

function isFinished($r) {
    return $r['ScoreLocaux'] != NULL && $r['ScoreVisiteurs'] != NULL;
}

function getNomRencontre($r) {
    if(isDomicile($r)) {
        return getClubName(). " -- " . $r['NomOpposant'];
    } else {
        return $r['NomOpposant']. " -- ". getClubName();
    }
}

function getLieuRencontre($r) {
    if(isDomicile($r)) {
        return getClubLocation();
    } else {
        return $r['Lieu_de_rencontre'];
    }
}

function getScoresRencontre($r) {
    if(isFinished($r)) {
        return $r['ScoreLocaux'] ." -- ". $r['ScoreVisiteurs'];
    } else {
        return ' -- ';
    }
}


function printRencontresAll() {
    $st = getRencontresAll();
    echo("
        <table>
        <tr>
            <th>Libellé</th>
            <th>Date et heure</th>
            <th>Lieu</th>
            <th>Score</th>
            <th>Modifier</th>
        </tr>"
        );

    foreach ($st as $r) {
        echo (
        "<tr>
            <td>" . getNomRencontre($r) . "</td>
            <td>" . $r['DateMatch'] . " à " . $r['HeureDebut'] . " </td>
            <td>" . getLieuRencontre($r) . "</td>
            <td>" . getScoresRencontre($r) . "</td>
            <td> <a href=\"visuRencontre.php?id=". $r['Id_Rencontre']."\" target=\"_blank\"> <input type=\"button\" value=\"details\" /></a> </td>
        </tr>"
        );
    }
    echo("</table>");
}

function printVisuRencontre($r)
{
    echo ("
        <div>
            <section class=\"LesPitiCarts\">" .
                printCarte("Equipe adverse", $r['NomOpposant']) .
                printCarte("Date", $r['DateMatch']) .
                printCarte("Lancement", $r['HeureDebut']) .
                printCarte("Lieu", getLieuRencontre($r)) .
                printCarte("Score", getScoresRencontre($r))."
            </section>
            <section class=\"laListe\">".
                printTableauJoueursRencontre($r).
            "</section>
            <a href=\"ModifierRencontre.php?id=". $r['Id_Rencontre']."\" target=\"_blank\"> <input type=\"button\" value=\"Modifier\" /></a>
        </div>"
    );
}
?>