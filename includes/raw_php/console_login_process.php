<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	if (!isset($_POST['submit_console_login'])) {
		// Probably a GET request
		redirect_to('../../login/console_login.php');
	}else{
		// POST request
		$username = mysql_prep(trim($_POST['username']));
		$password = (trim($_POST['password']));

		if (trim($username) == '' || trim($password) == '') {
			$_SESSION['login_message'] = "Fields can not be left blank";
			redirect_to('../../login/console_login.php');
		}

		$admin = attempt_admin_login($username, $password);

		if ($admin) { // Found admin
			$_SESSION['admin_id'] = $admin['admin_id'];
			$_SESSION['admin_username'] = $admin['admin_username'];
			$_SESSION['admin_email'] = $admin['admin_email'];

			redirect_to('../../admin/index.php');
		}else{ // Admin not found
			$_SESSION['login_message'] = "Username and password do not match!";
			redirect_to('../../login/console_login.php');
		}

		
	}

?>