<?php

function redirect_to($website){
	header("Location: " . $website);
	exit;
}

function query_check($query){
	if (!$query) {
		die("Database query failed");
	}
}

function mysql_prep($string){
	global $connection;
	$escaped_string = mysqli_real_escape_string($connection, $string);
	return $escaped_string;
}


// PASSWORD FUNCTIONS
function password_encrypt($password){
	$hash_format = "$2y$10$"; // Tells PHP to use Blowfish with "cost" of 10
	$salt_length = 23; // Blowfish salts should be 22-characters or more
	$salt = generate_salt($salt_length);
	$format_and_salt = $hash_format . $salt;
	$hash = crypt($password, $format_and_salt);
	return $hash;
}

function generate_salt($length){
	// Not 100% unique or random
	// MD5 returns 32 characters
	$unique_random_string = md5(uniqid(mt_rand(), true));
	// Valid characters for salt ar [a-zA-Z0-9./]
	$base64_string = base64_encode($unique_random_string);
	// But not '+' which is valid in base64 encoding
	$modified_base64_string = str_replace('+', '.', $base64_string);
	// Truncate to the correct length
	$salt = substr($modified_base64_string, 0, $length);
	return $salt;
}

function password_check($password, $existing_hash){
	// Existing hash contains format and salt to start
	$hash = crypt($password, $existing_hash);
	if ($hash === $existing_hash) {
		return true;
	}else{
		return false;
	}
}

function get_owner_by_email($owner_email){
	global $connection;
	// peforming query for specific owner
	$query = "SELECT * FROM owners";
	$query .= " WHERE owner_email = '{$owner_email}'";
	$query .= " LIMIT 1";
	$results = mysqli_query($connection, $query);
	// Testing if there was a query error
	query_check($results);
	if ($owner = mysqli_fetch_assoc($results)) {
		return $owner;
	}else{
		return null;
	}
}

function get_owner_by_id($owner_id){
	global $connection;
	// peforming query for specific business
	$query = "SELECT * FROM owners";
	$query .= " WHERE owner_id = '{$owner_id}'";
	$query .= " LIMIT 1";
	$results = mysqli_query($connection, $query);
	// Testing if there was a query error
	query_check($results);
	if ($owner = mysqli_fetch_assoc($results)) {
		return $owner;
	}else{
		return null;
	}
}

function get_business_by_business_name($business_name){
	global $connection;
	// peforming query for specific business
	$safe_business_name = mysql_prep($business_name);
	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_name = '{$safe_business_name}'";
	$query .= " LIMIT 1";
	$results = mysqli_query($connection, $query);
	// Testing if there was a query error
	query_check($results);
	if ($business = mysqli_fetch_assoc($results)) {
		return $business;
	}else{
		return null;
	}
}

// Get specific owner's businesses
function get_owner_businesses($owner_id){
	global $connection;

	$query = "SELECT * FROM businesses";
	$query .= " WHERE owner_id = {$owner_id}";
	$businesses = mysqli_query($connection,  $query);
	// Testing if there was a query error
	query_check($businesses);
	return $businesses;
}

function get_business_by_id($id){
	global $connection;
	// peforming query for specific business
	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_id = '{$id}'";
	$query .= " LIMIT 1";
	$results = mysqli_query($connection, $query);
	// Testing if there was a query error
	query_check($results);
	if ($business = mysqli_fetch_assoc($results)) {
		return $business;
	}else{
		return null;
	}
}

function get_business_by_email($email){
	global $connection;
	// peforming query for specific business
	$safe_email = mysql_prep($email);
	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_email = '{$safe_email}'";
	$query .= " LIMIT 1";
	$results = mysqli_query($connection, $query);
	// Testing if there was a query error
	query_check($results);
	if ($business = mysqli_fetch_assoc($results)) {
		return $business;
	}else{
		return null;
	}
}

function get_business_by_name($name){
	global $connection;
	// peforming query for specific business
	$safe_name = mysql_prep($name);
	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_name = '{$safe_name}'";
	$query .= " LIMIT 1";
	$results = mysqli_query($connection, $query);
	// Testing if there was a query error
	query_check($results);
	if ($business = mysqli_fetch_assoc($results)) {
		return $business;
	}else{
		return null;
	}
}

function get_owner_skills($owner_id){
	global $connection;
	// Query for owner skills
	$query = "SELECT * FROM skills WHERE owner_id = '{$owner_id}' ORDER BY skill_id DESC";
	$results = mysqli_query($connection, $query);
	// Testing if there was a query error
	query_check($results);
	return $results;
}

function owner_logged_in(){
	return isset($_SESSION["owner_id"]);
}

function attempt_owner_login($email, $password){
	$owner = get_owner_by_email($email);
	if ($owner) {
		// Found owner, now check passord
		if (password_check($password, $owner["owner_password"])) {
			// Password matches
			return $owner;
		}else{
			// Password was not match
			return false;
		}
	}else{
		// owner not found
		return false;
	}
}

function admin_logged_in(){
	return isset($_SESSION["admin_id"]);
}

function attempt_admin_login($username, $password){
	$admin = get_admin_by_username($username);
	if ($admin) {
		// Found admin, now check passord
		if (password_check($password, $admin["admin_password"])) {
			// Password matches
			return $admin;
		}else{
			// Password was not match
			return false;
		}
	}else{
		// admin not found
		return false;
	}
}

function get_admin_by_username($username){
	global $connection;
	// peforming query for specific admin
	$safe_username = mysql_prep($username);
	$query = "SELECT * FROM admins";
	$query .= " WHERE admin_username = '{$safe_username}'";
	$query .= " LIMIT 1";
	$results = mysqli_query($connection, $query);
	// Testing if there was a query error
	query_check($results);
	if ($admin = mysqli_fetch_assoc($results)) {
		return $admin;
	}else{
		return null;
	}
}

function get_admin_by_email($email){
	global $connection;
	// peforming query for specific admin
	$query = "SELECT * FROM admins";
	$query .= " WHERE admin_email = '{$email}'";
	$query .= " LIMIT 1";
	$results = mysqli_query($connection, $query);
	// Testing if there was a query error
	query_check($results);
	if ($admin = mysqli_fetch_assoc($results)) {
		return $admin;
	}else{
		return null;
	}
}


// BUSINESS INDUSTRY QUERRIES

// all industries = 0
// food service = 1
// advertisement, media and communication = 2
// entertainment, events and sports = 3
// healthcare = 4
// hospitality, hostel and hotel = 5
// it and telecoms = 6
// retail, fashion and fmcg = 7
// education = 8
// Writing and translation = 9

function get_recently_added_businesses(){
	global $connection;

	$query = "SELECT * FROM businesses WHERE accepted = 1 ORDER BY business_id DESC LIMIT 6";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function get_recently_added_businesses_admin(){
	global $connection;

	$query = "SELECT * FROM businesses WHERE accepted is NULL OR accepted = '0'";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function all_industries(){
	global $connection;

	$query = "SELECT * FROM businesses WHERE accepted = 1";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function food_industry(){
	global $connection;

	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_industry = 1 AND accepted = 1";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function media_industry(){
	global $connection;

	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_industry = 2 AND accepted = 1";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function entertainment_industry(){
	global $connection;

	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_industry = 3 AND accepted = 1";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function healthcare_industry(){
	global $connection;

	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_industry = 4 AND accepted = 1";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function hospitality_industry(){
	global $connection;

	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_industry = 5 AND accepted = 1";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function IT_industry(){
	global $connection;

	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_industry = 6 AND accepted = 1";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function retail_industry(){
	global $connection;

	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_industry = 7 AND accepted = 1";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function education_industry(){
	global $connection;

	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_industry = 8 AND accepted = 1";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}

function writing_and_translation(){
	global $connection;

	$query = "SELECT * FROM businesses";
	$query .= " WHERE business_industry = 9 AND accepted = 1";
	$results = mysqli_query($connection, $query);
	// checking query for errors
	query_check($results);
	return $results;
}



?>