<?php

	include('../db/db.php');
	include('../functions/functions.php');

	$business_industry = $_GET['business_industry'];

	switch ($business_industry) {
		case '1':
			$businesses = food_industry();
			$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
      		echo json_encode($business);
			break;
		case '2':
			$businesses = media_industry();
			$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
      		echo json_encode($business);
			break;
		case '3':
			$businesses = entertainment_industry();
			$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
      		echo json_encode($business);
			break;
		case '4':
			$businesses = healthcare_industry();
			$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
      		echo json_encode($business);
			break;
		case '5':
			$businesses = hospitality_industry();
			$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
      		echo json_encode($business);
			break;
		case '6':
			$businesses = IT_industry();
			$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
      		echo json_encode($business);
			break;
		case '7':
			$businesses = retail_industry();
			$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
      		echo json_encode($business);
			break;
		case '8':
			$businesses = education_industry();
			$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
      		echo json_encode($business);
			break;
		case '9':
			$businesses = writing_and_translation();
			$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
      		echo json_encode($business);
			break;
		
		default:
			$businesses = all_industries();
			$business = mysqli_fetch_all($businesses, MYSQLI_ASSOC);
      		echo json_encode($business);
			break;
	}

?>