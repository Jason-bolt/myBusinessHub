<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	define('KB', 1024);
	define('MB', 1048576);
	define('GB', 1073741824);
	define('TB', 1099511627776);

	if (isset($_POST['edit_profile_submit'])) {
		// Form submitted

		$first_name = mysql_prep(trim($_POST['first_name']));
		$last_name = mysql_prep(trim($_POST['last_name']));
		$email = mysql_prep(trim($_POST['email']));

		echo $first_name;
		echo $last_name;
		echo $email;

		$id = $_GET['id'];

		// Get image file
		$owner_image_file = $_FILES['profile_image'];

		// Database query to uplaod info except image
		$query = "UPDATE owners set owner_fname = '{$first_name}', ";
		$query .= "owner_lname = '{$last_name}', owner_email = '{$email}' ";
		$query .= "WHERE owner_id = {$id}";
		if (mysqli_query($connection, $query)) {
			$_SESSION['owner_fname'] = $first_name;
			$_SESSION['owner_lname'] = $last_name;
			$_SESSION['owner_email'] = $email;
		}
		


		// No picture has been submitted
		if ($owner_image_file['name'] == null) {
			$_SESSION['edit_profile_status'] = "Profile editted successful";
			redirect_to('../../my_businesses.php');
		}else{

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
					if ($owner_image_fileSize < (10*MB)) { // Image of good size
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
						$_SESSION['edit_profile_status'] = "Profile editted successful";
						redirect_to('../../my_businesses.php');

					}else{
						// Image size is too big
						$_SESSION['edit_profile_status'] = "Image size is too big!";
						redirect_to('../../my_businesses.php');
					}
				}else{
					// Error found
					$_SESSION['edit_profile_status'] = "Sorry an error occured when uploading file!";
					redirect_to('../../my_businesses.php');
				}
			}else{
				// Image not allowed delete previous information submitted
				$_SESSION['edit_profile_status'] = "You can not upload files of this type";
				redirect_to('../../my_businesses.php');
			}

		}

		
	}else{
		// Probably the GET request
		redirect_to('../../my_businesses.php');
	}


	


?>