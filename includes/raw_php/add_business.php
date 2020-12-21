<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	// Get owner id
	$owner_id = $_SESSION['owner_id'];

	define('KB', 1024);
	define('MB', 1048576);
	define('GB', 1073741824);
	define('TB', 1099511627776);

	if (!isset($_POST['submit_business'])) {
		redirect_to('../../my_businesses.php');
	}

	$business_name = mysql_prep(trim($_POST['business_name']));
	$business_description = mysql_prep(trim($_POST['business_description']));
	$business_brief = mysql_prep(trim($_POST['business_brief']));
	$business_industry = mysql_prep(trim($_POST['business_industry']));
	$business_location = mysql_prep(trim($_POST['business_location']));

	if (trim($business_name) == '' || trim($business_description) == '' || trim($business_brief) == '') {
		$_SESSION['add_business_message'] = "Fields with * are required!";
		redirect_to('../../create_business.php');
	}


	// Checking if owner already existsowner_email
	$business_exists =  get_business_by_name($business_name);
	if ($business_exists) {
		$_SESSION['add_business_message'] = "Business already exists!";
		redirect_to('../../create_business.php');
	}

	// Get image file
	$business_image_file = $_FILES['business_image'];

	// No picture has been subitted
	if ($business_image_file['name'] == null) {
		$_SESSION['add_business_message'] = "Business creation failed, please add an image!";
		redirect_to('../../create_business.php');
	}else{

		// Database query to uplaod info except image
		$query = "INSERT INTO businesses (";
		$query .= "business_name, business_industry, business_location, business_description, ";
		$query .= "business_brief, owner_id";
		$query .= ") VALUES (";
		$query .= "'{$business_name}', '{$business_industry}', '{$business_location}', ";
		$query .= "'{$business_description}', '{$business_brief}', {$owner_id})";
		mysqli_query($connection, $query);

		// Get business and id of business
		$business = get_business_by_name($business_name);
		$id = $business['business_id'];

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

					// Database query to uplaod info except image
					$query = "UPDATE businesses SET business_image = '{$business_image_fileName}', ";
					$query .= "business_image_location = '{$business_image_fileNameNew}' ";
					$query .= "WHERE business_id = {$id}";
					if (mysqli_query($connection, $query)){
						$_SESSION['add_business_message'] = "Business created successfully!";
						redirect_to('../../my_businesses.php');
					}

				}else{
					// Image size is too big
					$_SESSION['add_business_message'] = "Image size is too big!";
					redirect_to('../../create_business.php');
				}
			}else{
				// Error found
				$_SESSION['add_business_message'] = "Sorry an error occured when uploading file!";
				redirect_to('../../create_business.php');
			}
		}else{
			// Image not allowed delete previous information submitted
			$_SESSION['add_business_message'] = "You can not upload files of this type";
			redirect_to('../../create_business.php');
		}

	}



?>