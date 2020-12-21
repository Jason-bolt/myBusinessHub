<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	define('KB', 1024);
	define('MB', 1048576);
	define('GB', 1073741824);
	define('TB', 1099511627776);

	if (isset($_POST['submit_business_update'])) {
		// Form submitted

		$business_name = mysql_prep(trim($_POST['business_name']));
		$business_description = mysql_prep(trim($_POST['business_description']));
		$business_brief = mysql_prep(trim($_POST['business_brief']));
		$business_industry = mysql_prep(trim($_POST['business_industry']));
		$business_location = mysql_prep(trim($_POST['business_location']));


		$owner_id = $_SESSION['owner_id'];
		$id = $_GET['business_id'];

		// Get image file
		$business_image_file = $_FILES['business_image'];

		// Database query to uplaod info except image
		$query = "UPDATE businesses set business_name = '{$business_name}', ";
		$query .= "business_industry = '{$business_industry}', business_location = '{$business_location}', business_description = '{$business_description}', business_brief = '{$business_brief}' ";
		$query .= "WHERE business_id = {$id} AND owner_id = {$owner_id}";
		mysqli_query($connection, $query);


		// No picture has been submitted
		if ($business_image_file['name'] == null) {
			$_SESSION['edit_business_status'] = "Business editted successful";
			redirect_to('../../business_profile.php?business_id=' . $id);
		}else{

			// Get details of image file
			$business_image_fileName = $business_image_file['name'];
			$business_image_fileTmpName = $business_image_file['tmp_name'];
			$business_image_fileSize = $business_image_file['size'];
			$business_image_fileError = $business_image_file['error'];
			$business_image_fileType = $business_image_file['type'];

			// Breaking the image file name
			$business_image_fileNameBreak = explode('.', $business_image_fileName);
			// Get file extension
			$business_image_fileExt = strtolower(end($business_image_fileNameBreak));

			// Allowed extensions
			$allowed = array('jpeg', 'jpg', 'png');

			// Check if the extension is allowed
			if (in_array($business_image_fileExt, $allowed)) { // Good extension
				// Checking for errors
				if ($business_image_fileError === 0) { // No error found
					// Checking file size
					if ($business_image_fileSize < (3*MB)) { // Image of good size
						// Giving each business image a unique name
						$business_image_fileNameNew = 'business_image' . $id . '.' . $business_image_fileExt;
						// New image location
						$business_image_fileDestination = '../../img/' . $business_image_fileNameNew;
						// move file into location
						move_uploaded_file($business_image_fileTmpName, $business_image_fileDestination);

						// Updating the database
						$sql = "UPDATE businesses SET business_image = '{$business_image_fileName}', ";
						$sql .= "business_image_location = '{$business_image_fileNameNew}' ";
						$sql .= "WHERE business_id = {$id}";
						mysqli_query($connection, $sql);
						$_SESSION['edit_business_status'] = "Business editted successful";
						redirect_to('../../business_profile.php?business_id=' . $id);

					}else{
						$_SESSION['edit_business_status'] = "Image size is too big!";
						redirect_to('../../business_profile.php?business_id=' . $id);
					}
				}else{
					// Error found
					$_SESSION['edit_business_status'] = "Sorry an error occured when uploading file!";
					redirect_to('../../business_profile.php?business_id=' . $id);
				}
			}else{
				// Image not allowed delete previous information submitted
				$_SESSION['edit_business_status'] = "You can not upload files of this type";
				redirect_to('../../business_profile.php?business_id=' . $id);
			}

		}

		
	}else{
		// Probably the GET request
		redirect_to('../../business_profile.php');
	}


	


?>