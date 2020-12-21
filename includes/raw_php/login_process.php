<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	if (!isset($_POST['submit_login'])) {
		// Probably a GET request
		redirect_to('../../login/login.php');
	}else{
		// POST request
		$owner_email = mysql_prep(trim($_POST['owner_email']));
		$password = (trim($_POST['password']));

		if (trim($owner_email) == '' || trim($password) == '') {
			$_SESSION['login_notice'] = "Fields can not be left blank!";
		}

		$owner = attempt_owner_login($owner_email, $password);

		if ($owner) {
			// print_r($owner);
			$_SESSION['owner_id'] = $owner['owner_id'];
			$_SESSION['owner_fname'] = $owner['owner_fname'];
			$_SESSION['owner_lname'] = $owner['owner_lname'];
			$_SESSION['owner_email'] = $owner['owner_email'];

			redirect_to('../../index.php');	
		}else{
			$_SESSION['login_notice'] = "Invalid email or password!";
			redirect_to('../../login/login.php');
		}
		
	}

?>