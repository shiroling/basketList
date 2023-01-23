<?php
    require("session.php");
    require 'common.php';
    $pdo = getPDOConnection();
    $id_joueur = $_GET['id_joueur'];

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numero = $_POST['numero'];
    $poste = $_POST['poste'];
    $dateNaissance = $_POST['dateNaissance'];
    $taille = $_POST['taille'];
    $poid = $_POST['poid'];
    $status = $_POST['status'];

    $st = $pdo->prepare("UPDATE Joueur SET Nom = ?, Prenom = ?, Numero = ?, Poste = ?, DateNaissance = ?, Taille = ?, Poid = ?, Statut = ? WHERE Id_Joueur = ?");

    $st->execute([$nom, $prenom, $numero, $poste, $dateNaissance, $taille, $poid, $status, $id_joueur]);

    header("Location: ../pagesPhp/visuJoueur.php?id=".$id_joueur);

?>