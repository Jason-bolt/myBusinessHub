<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	if (isset($_POST['admin_registration'])) {
		// Form submitted

		// Variables
		$username = mysql_prep(trim($_POST['username']));
		$admin_email = mysql_prep(trim($_POST['admin_email']));
		// $hashed_password = password_encrypt(trim($_POST['password']));
		$password = mysql_prep(trim($_POST['password']));


		if ($username == '' || $admin_email == '' || $password == '') {
			$_SESSION['registration_error'] = "Fields with * are required!";
			redirect_to('../../login/console_registration.php');
		}

		if (strlen($password) < 6) {
			$_SESSION['registration_error'] = "Pasword is too short, must be more than 6 characters!";
			redirect_to('../../login/console_registration.php');
		}	

		// Hashing the password
		$hashed_password = password_encrypt(trim($_POST['password']));


		// Checking if owner already exists
		$admin_exists =  get_admin_by_email($admin_email);
		if ($admin_exists) {
			$_SESSION['registration_error'] = "Admin already exists!";
			// redirect_to('../../login/console_registration.php');
		}

		// Database query to uplaod info except image
		$query = "INSERT INTO admins (";
		$query .= "admin_email, admin_username, admin_password";
		$query .= ") VALUES (";
		$query .= "'{$admin_email}', '{$username}', '{$hashed_password}')";

		$result = mysqli_query($connection, $query);
		if ($result) {
			// Query success
			$_SESSION['login_message'] = "Admin created successfully!";
			redirect_to('../../login/console_login.php');
		}else{
			// Query failed
			// echo "Registration Failed";
			$_SESSION['registration_error'] = "Registration failed, please try again.";
			redirect_to('../../login/console_registration.php');
			// echo $username;
			// echo "<br />";
			// echo $admin_email;
			// echo "<br />";
			// echo $hashed_password;
			// echo "<br />";
			// echo $query;
		}
		
	}else{
		// Probably the GET request
		redirect_to('../../login/console_registration.php');
	}

?>