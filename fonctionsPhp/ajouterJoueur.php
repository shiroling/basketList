
<html>
<?php 
// le but du fichier est de faire le formulaire et ensuite  
	require("../pagesPhp/head.php") ?>

<body>
<main>
	<form method="POST" action="validerCreerJoueur.php"  >
		<fieldset>
			<legend>Nouveau joueur</legend>
			<label for="licence">Numéro de licence</label>
			<input type="text" name="licence" id="licence" maxlength="8" minlength="8" placeholder="VT000000" required>
			<br>
			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom" maxlength="50" minlength="3" placeholder="ross" required>
			<br>
			<label for="prenom">Prenom</label>
			<input type="text" name="prenom" id="prenom" maxlength="50" minlength="3" placeholder="Bob" required>
			<br>
			<label for="numero">Numéro de maillot</label>
			<input type="number" name="numero" id="numero" min="0" max="100" placeholder="9" required>
			<br>
			<label for="dateNaissance">Date de naissance</label>
			<input type="date" name="dateNaissance" id="dateNaissance" placeholder="01/02/2003" required>
			<br>
			<label for="taille">Taille (en cm)</label>
			<input type="number" name="taille" id="taille" min="50" max="300" placeholder="123" required>
			<br>
			<label for="poid">Poid (en kg)</label>
			<input type="number" name="poid"  id="poid" min="50" max="250" placeholder="123.45" required>
			<br>
			<label for="poste">Poste</label>
			<select name="poste"  id="poste" required>
					<option value="MENEUR">Meneur</option>
                    <option value="AILIER">Ailier</option>
                    <option value="PIVOT">Pivot</option>
            </select>
			<br>
			<label for="statut">Statut</label>
			<select name="statut"  id="statut" required>
                    <option value="ACTIF"> ACTIF </option>
                    <option value="BLESSE">BLESSE</option>
                    <option value="SUSPENDU">SUSPENDU</option>
                    <option value="ABSENT">ABSENT</option>
            </select>
			<br>
			<label for="commentaire">Commentaire</label>
			<textarea name="commentaire"  id="commentaire" cols="40" rows="5" placeholder="Un commentaire ?" required></textarea>
			<br>
			<input type="submit" value="Valider">


		</fieldset>
	</form>
</main>
	

</body>

</html>