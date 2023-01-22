<?php
	require("../fonctionsPhp/common.php");
	$pdo = getPDOConnection();
	$licence = $_POST['licence'];

	$sql = "SELECT COUNT(*) FROM Joueur WHERE Licence = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$licence]);
	$count = $stmt->fetchColumn();

	if($count > 0){
	    // le numero de licence est deja utilisé
	    echo "Le numéro de licence est déjà utilisé, veuillez entrer un numéro de licence différent.";
	}else{
	    // Le numero de licence n'est pas utilisé, vous pouvez insérer le nouveau joueur
	    $nom = $_POST['nom'];
	    $prenom = $_POST['prenom'];
	    $numero = $_POST['numero'];
	    $dateNaissance = $_POST['dateNaissance'];
	    $taille = $_POST['taille'];
	    $poid = $_POST['poid'];
	    $poste = $_POST['poste'];
	    $statut = $_POST['statut'];
	    $commentaire = $_POST['commentaire'];

		$sql = "INSERT INTO Joueur (Licence, Nom, Prenom, Numero, DateNaissance, Taille, Poid, Poste, Statut, Commentaire) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$licence, $nom, $prenom, $numero, $dateNaissance, $taille, $poid, $poste, $statut, $commentaire]);
        $id = $pdo->lastInsertId();
	    header("Location: ../pagesPhp/visuJoueur.php?id=".$id);
	}
?>