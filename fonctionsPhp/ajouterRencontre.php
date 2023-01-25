
<html>
	
<?php 
require("session.php");

// le but du fichier est de faire le formulaire et ensuite  
require("../pagesPhp/header.php");
require("../pagesPhp/head.php") ?>
<body>
<main>
	<form method="POST" action="../fonctionsPhp/validerCreerRencontre.php"  >
		<fieldset>
			<legend>Adversaire</legend>
			<label for="adversaire">Equipe adverse</label>
			<input type="text" name="adversaire" id="adversaire" maxlength="50" minlength="1" required>
			<br>
			<label for="adresseAvd">Adresse adversaires</label>
			<input type="text" name="adresseAvd" id="adresseAvd" maxlength="50" minlength="1" required>
			<br>
		</fieldset>
		<fieldset>
			<legend>Calendrier</legend>
			<label for="typeMatch">Type de rencontre</label>
			<select name="typeMatch"  id="typeMatch" required>
	            <option value="LOCAL"> A domicile </option>
	            <option value="EXTERIEUR"> En extérieur</option>
            </select>
            <br>
            <label for="dateRencontre">Date de la rencontre</label>
			<input type="date" name="dateRencontre" id="dateRencontre" placeholder="01/02/2003" required>
			<br>
			<label for="horaire">Horaire de la rencontre</label>
			<input type="time" name="horaire" id="horaire" min="08:00" max="21:30" required>
			<br>
		</fieldset>
		<input type='submit' value='Ajouter la rencontre'>
	</form>
</main>


</body>

</html>