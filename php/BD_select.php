<?php
use App\connexionBase;
require('connexionBase.php');
    function getJoueurs()
    {
        $bd = new connexionBase();
        $pdo = $bd->getDB();
        $st = $pdo->query("Select * from Joueurs");      
    }
?>