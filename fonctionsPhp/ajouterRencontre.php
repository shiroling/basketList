
<html>
	<?php 
	// le but du fichier est de faire le formulaire et ensuite  
	require("../pages.php/head.php") ?>
	<body>
		<main>
			<form method="POST" action="validerCreerRencontre.php"  >
				<fieldset>
					<legend>Nouvelle rencontre</legend>
					<label for="licence"> ### </label>
					<input type="text" name="licence" id="licence" maxlength="8" minlength="8" required>
					<br>
				</fieldset>
			</form>
		</main>
		

	</body>

</html>