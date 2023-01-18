<?php
require("conx.php");
require("common.php");


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
        return getClubName(). " -- " . $r.["NomOpposant"];
    } else {
        return $r.["NomOpposant"]. " -- ".getClubName();
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
        return $r['ScoreLocaux'] ." -- ". $r['ScoreVisiteurs'] != NULL;
    } else {
        return $r[' -- '];
    }
}


function printRencontresAll() {
    $st = getRencontresAll();
    echo("
        <table>
        <tr>
            <th> Libellé </th>
            <th> Date et heure </th>
            <th> Lieu </th>
            <th> Score </th>
        </tr>"
        );

    foreach ($st as $r) {
        echo (" <tr>
                    <td>" . getNomRencontre($r) . "</td>
                    <td>" . $r['DateMatch'] . " à " . $r['HeureDebut'] . " </td>
                    <td>" . getLieuRencontre($r) . "</td>
                    <td>" . getScoresRencontre($r) . "</td>
                </tr>"
        );
    }
    echo("</table>");
}

?>