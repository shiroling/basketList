<?php
	require("../fonctionsPhp/common.php");
	$id = $_GET['id_rencontre'];
	$joueurs_selectionnes = $_POST['players'];
	$pdo = getPDOConnection();


	// Supprimer tous les joueurs liés à la rencontre
	$sql = "DELETE FROM participe WHERE Id_Rencontre = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	// Réinsérer les joueurs sélectionnés
	$sql = "INSERT INTO participe (Id_Joueur, Id_Rencontre, ApreciationCoatch, EstTitulaire, EstCapitaine, Tirs, Tirs_Reussis, Rebonds_Offencifs, Rebonds_Defensifs, Interceptions)
	    	VALUES (?, $id, '', 0, 0, 0, 0, 0, 0, 0)";
	$stmt = $pdo->prepare($sql);
	
	foreach($joueurs_selectionnes as $joueur) {
	    $stmt->execute([$joueur]);
	}

	header("Location: ../pagesPhp/modifierRencontre.php?id=$id");

?>