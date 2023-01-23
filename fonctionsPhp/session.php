<?php 
	ob_start();
	session_start();
	if (!isset($_SESSION['variable'])) {
		header('Location: ../index.php');
		exit();
	}
	ob_flush();

?>