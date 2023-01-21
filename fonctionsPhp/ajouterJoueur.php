
<html>
	<?php 
	// le but du fichier est de faire le formulaire et ensuite  
	require("../pages.php/head.php") ?>
	<body>
		<main>
			<form method="POST" action="validerCreerJoueur.php"  >
				<fieldset>
					<legend>Nouveau joueur</legend>
					<label for="licence">Numéro de licence</label>
					<input type="text" name="licence" id="licence" maxlength="8" minlength="8" required>
					<br>
				</fieldset>
			</form>
		</main>
		

	</body>

</html>