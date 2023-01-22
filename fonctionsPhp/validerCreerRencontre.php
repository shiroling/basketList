<?php
    require("../fonctionsPhp/common.php");
    $pdo = getPDOConnection();
    $dateRencontre = $_POST['dateRencontre'];

    $sql = "SELECT COUNT(*) FROM Rencontre WHERE DateMatch = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$dateRencontre]);
    $count = $stmt->fetchColumn();

    if($count > 0){
        // une rencontre existe déjà à cette date
        echo "Une rencontre existe déjà à cette date, veuillez entrer une date différente.";
    }else{
        // Il n'y a pas de rencontre à cette date, vous pouvez insérer une nouvelle rencontre
        $adversaire = $_POST['adversaire'];
        if (strcmp($_POST['typeMatch'], "LOCAL")) {
            $adresseAvd = getClubLocation();
        }else {
            $adresseAvd = $_POST['adresseAvd'];
        }

        $typeMatch = $_POST['typeMatch'];
        $horaire = $_POST['horaire'];

        $sql = "INSERT INTO Rencontre (NomOpposant, Lieu_de_rencontre, DateMatch, HeureDebut) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$adversaire,$adresseAvd,$dateRencontre,$horaire]);
        $id = $pdo->lastInsertId();
        header("Location: ../pagesPhp/visuRencontre.php?id=".$id);
    }
?>