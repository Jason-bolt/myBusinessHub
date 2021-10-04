<?php
	session_start();
	include("../../includes/functions/functions.php");
    include("../../includes/db/db.php");

	if (!isset($_POST['reset_password_submit'])) {
		redirect_to('../../index.php');	
	}else{

		$selector = $_POST["selector"];
		$validator = $_POST["validator"];
		$password = $_POST["password"];
		$passwordRepeat = $_POST["password-repeat"];

		if (empty($password) || empty($passwordRepeat)) {
            $_SESSION['password-reset-status'] = "Fields can not be left blank!";
            redirect_to('../../login/create_new_password.php');
        }else if ($password != $passwordRepeat) {
        	$_SESSION['password-reset-status'] = "Passwords do not match!";
            redirect_to('../../login/create_new_password.php');
        }

        $currentDate = date("U");

        // Check database for the date

        // Select user selector token
            $sql = "SELECT * FROM resetpwd WHERE resetPwdSelector=? AND resetPwdExpires >= '{$currentDate}'";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql)) { // If the prepared statement fails
                $_SESSION['reset_notice'] = "Something went wrong :/. Please try again!";
                redirect_to('../../login/forgot_password.php');
            }else{
                mysqli_stmt_bind_param($stmt, "s", $owner_email);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                if (!$row = mysqli_fetch_assoc($result)) {
                	$_SESSION['reset_notice'] = "Please re-submit your request.";
                	redirect_to('../../login/forgot_password.php');
                }else{

                	// Comparing the validator token from the url to the one in the database
                	$tokenBin = hex2bin($validator);
                	// Verify token with hash
                	$tokenCheck = password_verify($tokenBin, $row["resetPwdToken"]);

                	if ($tokenCheck === false) {
                		$_SESSION['reset_notice'] = "Please re-submit your request.";
                		redirect_to('../../login/forgot_password.php');
                	}elseif ($tokenCheck === false) {
                		// User has been authenticated. Now change the password

                		$tokenEmail = $row["resetPwdEmail"];

                		$sql = "SELECT * FROM owners WHERE owner_email = ?";

			            $stmt = mysqli_stmt_init($connection);
			            if (!mysqli_stmt_prepare($stmt, $sql)) { // If the prepared statement fails
			                $_SESSION['reset_notice'] = "Something went wrong :/. Please try again!";
			                redirect_to('../../login/forgot_password.php');
			            }else{
			                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
			                mysqli_stmt_execute($stmt);

			                $result = mysqli_stmt_get_result($stmt);
			                if (!$row = mysqli_fetch_assoc($result)) {
			                	$_SESSION['reset_notice'] = "There was an error! Please re-submit your request.";
			                	redirect_to('../../login/forgot_password.php');
			                }else{

			                	$sql = "UPDATE owners SET owner_password=? WHERE owner_email=?";
			                	$stmt = mysqli_stmt_init($connection);
					            if (!mysqli_stmt_prepare($stmt, $sql)) { // If the prepared statement fails
					                $_SESSION['reset_notice'] = "Something went wrong :/. Please try again!";
					                redirect_to('../../login/forgot_password.php');
					            }else{

					            	$new_hashed_password = password_encrypt(trim($password));
					            	mysqli_stmt_bind_param($stmt, "ss", $new_hashed_password, $tokenEmail);
			                		mysqli_stmt_execute($stmt);

			                		// Deleting user token from the reset database
						            $sql = "DELETE FROM resetpwd WHERE resetPwdEmail=?";
						            $stmt = mysqli_stmt_init($connection);
						            if (!mysqli_stmt_prepare($stmt, $sql)) { // If the prepared statement fails
						                $_SESSION['reset_notice'] = "Something went wrong :/. Please try again!";
						                redirect_to('../../login/forgot_password.php');
						            }else{
						                mysqli_stmt_bind_param($stmt, "s", $owner_email);
						                mysqli_stmt_execute($stmt);
						                $_SESSION['reset_notice'] = "Something went wrong :/. Please try again!";
						                redirect_to('../../login/login.php');
						            }
					            }

			                }
			            }

                	}

                }
            }


	}


?>