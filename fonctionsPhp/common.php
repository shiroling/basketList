<?php
require("conx.php");


function getClubName() {
    return "Coquelicots lézaltois";
}

function getClubShortname() {
    return "CLT";
}

function getClubLocation() {
    return "75 rue de la championsLeague, KobeLand 97820";
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

?>