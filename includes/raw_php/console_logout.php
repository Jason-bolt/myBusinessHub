<?php

	session_start();

	unset ($_SESSION['admin_id']);
	unset ($_SESSION['admin_username']);
	unset ($_SESSION['admin_email']);

	header('Location: ../../login/console_login.php');

?>