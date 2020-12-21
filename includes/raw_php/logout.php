<?php

	session_start();

	unset ($_SESSION['owner_id']);
	unset ($_SESSION['owner_fname']);
	unset ($_SESSION['owner_lname']);
	unset ($_SESSION['owner_email']);

	header('Location: ../../login/login.php');

?>