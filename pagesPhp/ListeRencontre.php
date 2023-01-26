<?php 
    require("../fonctionsPhp/session.php");
 ?>
	<?php
	require("header.php")
	?>
	
	<?php
		require("../fonctionsPhp/Rencontre.php");
		printRencontresAll();
	?>
   	<a href="../fonctionsPhp/ajouterRencontre.php"><input type="button" value="Nouvelle rencontre"></a>

</body>
</html>