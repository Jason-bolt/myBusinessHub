<?php

	include('../db/db.php');
	include('../functions/functions.php');

	$key_words = $_GET['key_words'];


	$businesses = get_all_businesses_by_keyword($key_words);
	$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
	echo json_encode($business);

?>