<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	define('KB', 1024);
	define('MB', 1048576);
	define('GB', 1073741824);
	define('TB', 1099511627776);

	if (isset($_POST['submit_registration'])) {
		// Form submitted

		// Variables
		$first_name = mysql_prep(trim($_POST['first_name']));
		$last_name = mysql_prep(trim($_POST['last_name']));
		// $hashed_password = password_encrypt(trim($_POST['password']));
		$password = mysql_prep(trim($_POST['password']));
		$password2 = mysql_prep(trim($_POST['password2']));
		$owner_email = mysql_prep(trim($_POST['owner_email']));
		$owner_number = mysql_prep(trim($_POST['owner_number']));


		if ($first_name == '' || $last_name == '' || $password == '' || $owner_number == '') {
			$_SESSION['registration_error'] = "Fields with * are required!";
			redirect_to('../../login/register.php');
		}

		if (strlen($password) < 6) {
			$_SESSION['registration_error'] = "Pasword is too short, must be more than 6 characters!";
			redirect_to('../../login/register.php');
		}	

		if ($password != $password2) {
			$_SESSION['registration_error'] = "Passwords do not match!";
			redirect_to('../../login/register.php');
		}

		// Hashing the password
		$hashed_password = password_encrypt(trim($_POST['password']));


		// Checking if owner already exists
		$owner_exists =  get_owner_by_email($owner_email);
		if ($owner_exists) {
			$_SESSION['registration_error'] = "Owner already exists!";
			redirect_to('../../login/register.php');
		}

		// Database query to uplaod info except image
		$query = "INSERT INTO owners (";
		$query .= "owner_fname, owner_lname, owner_email, owner_password, ";
		$query .= "owner_phone_number";
		$query .= ") VALUES (";
		$query .= "'{$first_name}', '{$last_name}', '{$owner_email}', '{$hashed_password}', ";
		$query .= "'{$owner_number}')";

		$result = mysqli_query($connection, $query);
		if ($result) {
			// Query success
			// echo "Success";

			// Get image file
			$owner_image_file = $_FILES['owner_image'];

			// No picture has been subitted
			if ($owner_image_file['name'] == null) {
				$_SESSION['registration_success'] = "Registration successful";
				// Sending mail to owner
				// Create the email and send the message
				$mailTo = $owner_email; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
				$subject = "Your GoSH account has been created successfully!";
				$body = "Thank you for signing up with us. Feel free to create a business or service and reach multiple people at the same time.";
				 $header = "From:gotskillshubinfo@gmail.com \r\n";
		         $header .= "MIME-Version: 1.0\r\n";
		         $header .= "Content-type: text/html\r\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
				mail($mailTo, $subject, $body, $header);
				
				redirect_to('../../login/login.php');
			}

			// Get id of owner
			$owner = get_owner_by_email($owner_email);
			$id = $owner['owner_id'];

			// Get details of image file
			$owner_image_fileName = $owner_image_file['name'];
			$owner_image_fileTmpName = $owner_image_file['tmp_name'];
			$owner_image_fileSize = $owner_image_file['size'];
			$owner_image_fileError = $owner_image_file['error'];
			$owner_image_fileType = $owner_image_file['type'];

			// Breaking the image file name
			$owner_image_fileNameBreak = explode('.', $owner_image_fileName);
			// Get file extension
			$owner_image_fileExt = strtolower(end($owner_image_fileNameBreak));

			// Allowed extensions
			$allowed = array('jpeg', 'jpg', 'png');

			// Check if the extension is allowed
			if (in_array($owner_image_fileExt, $allowed)) { // Good extension
				// Checking for errors
				if ($owner_image_fileError === 0) { // No error found
					// Checking file size
					if ($owner_image_fileSize < (3*MB)) { // Image of good size
						// Giving each owner image a unique name
						$owner_image_fileNameNew = 'owner_image' . $id . '.' . $owner_image_fileExt;
						// New image location
						$owner_image_fileDestination = '../../img/' . $owner_image_fileNameNew;
						// move file into location
						move_uploaded_file($owner_image_fileTmpName, $owner_image_fileDestination);

						// Updating the database
						$sql = "UPDATE owners SET owner_image = '{$owner_image_fileName}', ";
						$sql .= "owner_image_location = '{$owner_image_fileNameNew}' ";
						$sql .= "WHERE owner_id = {$id}";
						mysqli_query($connection, $sql);
						$_SESSION['registration_success'] = "Registration successful";
						// Sending mail to owner
						// Create the email and send the message
						$mailTo = $owner_email; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
						$subject = "Your GoSH account has been created successfully!";
						$body = "Thank you for signing up with us. Feel free to create a business or service and reach multiple people at the same time.";
						 $header = "From:gotskillshubinfo@gmail.com \r\n";
				         $header .= "MIME-Version: 1.0\r\n";
				         $header .= "Content-type: text/html\r\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
						mail($mailTo, $subject, $body, $header);


						redirect_to('../../login/login.php');

					}else{
						// Image size is too big
						$delete_query = "DELETE FROM owners WHERE owner_id = {$id}";
						mysqli_query($connection, $delete_query);
						$_SESSION['registration_error'] = "Image size is too big!";
						redirect_to('../../login/register.php');
					}
				}else{
					// Error found
					$delete_query = "DELETE FROM owners WHERE owner_id = {$id}";
					mysqli_query($connection, $delete_query);
					$_SESSION['registration_error'] = "Sorry an error occured when uploading file!";
					redirect_to('../../login/register.php');
				}
			}else{
				// Image not allowed delete previous information submitted
				$delete_query = "DELETE FROM owners WHERE owner_id = {$id}";
				mysqli_query($connection, $delete_query);
				$_SESSION['registration_error'] = "You can not upload files of this type";
				redirect_to('../../login/register.php');
			}



		}else{
			// Query failed
			// echo "Registration Failed";
			$_SESSION['registration_error'] = "Registration failed, please try again.";
			redirect_to('../../login/register.php');
		}
		
	}else{
		// Probably the GET request
		redirect_to('../../login/register.php');
	}

?>