<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	$owner_id = $_SESSION['owner_id'];

	if (!isset($_POST['submit_social'])) {
		// Porbably a GET request
		redirect_to('../../business_profile.php');
	}else{
		// POST request
		$facebook = $_POST['facebook'];
		$instagram = $_POST['instagram'];
		$youtube = $_POST['youtube'];
		$website = $_POST['website'];
		$business_id = $_GET['business_id'];

		if (trim($facebook) == '') {
			$facebook = null;
		}

		if (trim($instagram) == '') {
			$instagram = null;
		}

		if (trim($youtube) == '') {
			$youtube = null;
		}

		if (trim($website) == '') {
			$website = null;
		}

		// Update query
		$query = "UPDATE owners SET facebook = '{$facebook}', instagram = '{$instagram}', ";
		$query .= "youtube = '{$youtube}', website = '{$website}' WHERE owner_id = {$owner_id}";
		$result = mysqli_query($connection, $query);

		if ($result) {
			// Update success
			$_SESSION['social_update_status'] = 'Socail handles updated!';
			redirect_to('../../business_profile.php?business_id=' . $business_id);
		}else{
			// Could not update
			$_SESSION['social_update_status'] = 'Could not update social handles, try again!';
			redirect_to('../../business_profile.php?business_id=' . $business_id);
		}


	}

?>