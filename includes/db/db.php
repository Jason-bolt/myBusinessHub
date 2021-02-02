<?php

	// define("DB_HOST", "localhost");
	// define("DB_USER", "root");
	// define("DB_PASSWORD", "");
	// define("DB_NAME", "myBusinessHub");

	// $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// if (mysqli_connect_error()) {
	// 	die("Database connection failed "
	// 		.
	// 	 mysqli_connect_error()
	// 	);
	// }

	
	define("DB_HOST", "localhost");
	define("DB_USER", "gotskillsh_businessHub");
	define("DB_PASSWORD", "bus@sql19");
	define("DB_NAME", "gotskillsh_businessHub");

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (mysqli_connect_error()) {
		die("Database connection failed "
			.
		 mysqli_connect_error()
		);
	}

?>