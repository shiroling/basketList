
<html>
<?php 
require("session.php");
require("../pagesPhp/head.php") ?>
<body>
<main>
	<form method="POST" action="validerCreerRencontre.php"  >
		<fieldset>
			<label for="finRencontre">Horaire de fin</label>
			<input type="time" name="finRencontre" id="finRencontre" min="080:0" max="22:00" required>
			<br>
			<legend>Cloture de match</legend>
			<label for="locScore">Score Locaux</label>
			<input type="number" name="locScore" id="locScore" min="0" max="250" required>
			<br>
			<label for="visitScore">Score Visiteurs</label>
			<input type="number" name="visitScore"  id="visitScore" min="0" max="250" required>
			<br>
		</fieldset>
		<fieldset>
			<legend>Rencontre</legend>
			<label for="typeMatch">Type de rencontre</label>
			<select name="typeMatch"  id="typeMatch" required>
	            <option value="LOCAL"> A domicile </option>
	            <option value="EXT2RIEUR"> En extérieur</option>
            </select>
            <br>
            <label for="dateRencontre">Date de la rencontre</label>
			<input type="date" name="dateRencontre" id="dateRencontre" placeholder="01/02/2003" required>
			<br>
			<label for="horaire">Horaire de la rencontre</label>
			<input type="time" name="horaire" id="horaire" min="08:00" max="23:59" required>
			<br>
		</fieldset>
	</form>
</main>


</body>

</html>