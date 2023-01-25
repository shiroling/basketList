<form method="post" action="../fonctionsPhp/validationupload.php" enctype="multipart/form-data">
	<fieldset>
		<legend>Upload photo de joueur</legend>
		
		<label for="photo">Photo</label>
		<input type="file" id="photo" name="photo" accept="image/png, image/jpeg" required>

		<input type="hidden" name="numlicence" value="<?php $NUMLICENCE = trim(htmlspecialchars($_GET['id'])); echo $NUMLICENCE; ?>">
		<input type="submit" name="uploadphoto">
	</fieldset>
</form>
