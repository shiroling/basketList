<?php
	require("../fonctionsPhp/common.php");

	$id_rencontre = $_GET['id_rencontre'];
	$nomOpposant = $_POST['nomOpposant'];
	$debut = $_POST['debut'];
	$fin = $_POST['fin'];
	$dateRencontre = $_POST['date'];
	$lieu = $_POST['lieu'];
	$scoreLocaux = $_POST['scoreLocaux'];
	$scoreVisiteurs = $_POST['scoreVisiteurs'];

	$pdo = getPDOConnection();

	$sql = "UPDATE Rencontre SET NomOpposant = ?, HeureDebut = ?, HeureFin = ?, DateMatch = ?, Lieu_de_rencontre = ?, ScoreLocaux = ?, ScoreVisiteurs = ? WHERE Id_Rencontre = ?";
	
	$stmt = $pdo->prepare($sql);
	
	$stmt->execute([$nomOpposant, $debut, $fin, $dateRencontre, $lieu, $scoreLocaux, $scoreVisiteurs, $id_rencontre]);

	header("Location: ../pagesPhp/modifierRencontre.php?id=$id_rencontre");

?>