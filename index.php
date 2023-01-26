<?php 
	ob_start();
	//on ouvre la session et on redirige sur l'acceuil si on est déja co
	session_start();
	if(isset($_SESSION['variable'])) {
		header("Location: ./pagesPhp/ListeRencontre.php");
		exit();
	}
?>

<?php
	if (isset($_POST['username']) && isset($_POST['password']))
	{
		if (!empty($_POST['username']) && !empty($_POST['password']))
		{
			$USERNAME = $_POST['username'];
			$PASSWORD = $_POST['password'];

			if ($USERNAME == "admin" && password_verify($PASSWORD, '$2y$10$zcSpoVlLbIlVNRCSyfbuF.8qb9BEJp3jISi5viQZplMl5rbDpuJ1q'))
			{
				# définition des informations relatives à l’utilisateur
				$_SESSION['variable'] = true;

				header('Location: ./pagesPhp/ListeRencontre.php');
				exit();
			} else
			echo "<script>alert('Identifiant ou mot de passe incorrect');</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./css/login.css" rel="stylesheet">
	<title>Connectez vous !</title>
</head>
<body>
	<main class="center-block">
		<form class="" action="." method="post">
			<fieldset>
				<legend>Connection</legend>

				<label for="mail">Nom d’utilisateur (courriel)</label> <br>
				<input type="text" id="mail" name="username" required autofocus> <br>

				<label for="mdp">Mot de passe</label> <br>
				<input type="password" id="mdp" name="password" required> <br>

				<input type="submit" value="Valider">
			</fieldset>
		</form>
	</main>
</body>
</html>


<?php 
ob_flush();
 ?>