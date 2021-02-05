<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	// Check if admin is logged in


	if (!isset($_GET['business_id']) || !isset($_GET['owner_id']) || $_GET['business_id'] == '' || $_GET['owner_id'] == '') {
		redirect_to('../../my_businesses.php');
	}

	$business_id = $_GET['business_id'];
	$owner_id = $_GET['owner_id'];


	// QUERY TO UPDATE BUSINESS AND DECLINE
	$query = "UPDATE businesses SET accepted = '0' WHERE business_id = {$business_id} AND owner_id = {$owner_id}";
	$result = mysqli_query($connection, $query);

	if ($result) {
		$_SESSION['business_status'] = "Business has been declined!";
		redirect_to('../../admin/businesses_details.php?business_id=' . $business_id . '&owner_id=' . $owner_id);
	}else{
		$_SESSION['business_status'] = "Could not decline business!";
		redirect_to('../../admin/businesses_details.php?business_id=' . $business_id . '&owner_id=' . $owner_id);
	}

	

?>