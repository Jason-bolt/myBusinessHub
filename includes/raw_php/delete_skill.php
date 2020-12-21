<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	if (!isset($_GET['skill_id'])) {
		redirect_to('../../my_businesses.php');
	}

	$skill_id = $_GET['skill_id'];
	$owner_id = $_SESSION['owner_id'];

	// Query to delete skill
	$query = "DELETE FROM skills WHERE skill_id = {$skill_id} AND owner_id = {$owner_id}";
	$result = mysqli_query($connection, $query);
	if ($result) {
		redirect_to('../../my_businesses.php');
	}else{
		redirect_to('../../my_businesses.php');
	}


?>