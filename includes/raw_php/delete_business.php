<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	if (!isset($_GET['business_id'])) {
		redirect_to('../../business_profile.php');
	}

	$business_id = $_GET['business_id'];
	$owner_id = $_SESSION['owner_id'];

	// Query to delete skill
	$query = "DELETE FROM businesses WHERE business_id = {$business_id} AND owner_id = {$owner_id}";
	$result = mysqli_query($connection, $query);
	if ($result) {
		redirect_to('../../my_businesses.php');
	}else{
		redirect_to('../../my_businesses.php');
	}


?>