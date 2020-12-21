<?php

	session_start();
	include('../db/db.php');
	include('../functions/functions.php');

	if (!isset($_POST['submit_skill'])) {
		redirect_to('../../my_businesses.php');
	}

	$skill = mysql_prep(trim($_POST['skill']));
	$owner_id = $_SESSION['owner_id'];

	// Query to add skill
	$query = "INSERT INTO skills (skill, owner_id) VALUES ('{$skill}', {$owner_id})";
	$result = mysqli_query($connection, $query);
	if ($result) {
		redirect_to('../../my_businesses.php');
	}else{
		$_SESSION['skill_add_failure'] = "An error occured while adding skill, please try again!";
		redirect_to('../../my_businesses.php');
	}


?>