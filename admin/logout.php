<?php
	session_start();

	if (isset($_SESSION['isLoggedIn'])) {
		session_destroy();

		header('Location: index.php');
	}
?>