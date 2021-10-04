<?php
	session_start();
	include("../../includes/functions/functions.php");
    include("../../includes/db/db.php");


    if (!isset($_POST['reset_password'])) {
    	redirect_to('../../index.php');
    }else{
    	$owner_email = mysql_prep(trim($_POST['owner_email']));

        $owner = get_owner_by_email($owner_email);
        // $owner = attempt_owner_login($owner_email, $password);

        if ($owner == null) {
        	$_SESSION['reset_notice'] = "Invalid email";
            redirect_to('../../login/forgot_password.php');

        }else{
            // print_r($owner);
            // $_SESSION['owner_id'] = $owner['owner_id'];
            $owner_id = $owner['owner_id'];

            $selector = bin2hex(random_bytes(8)); // Selector to get a unique user
            $token = random_bytes(32); // To compare with the user'svalue with the database

            $url = "www.gotskillshub.com/login/create_new_password.php?selector=" . $selector . "&validator=" . bin2hex($token);

            // Time for expiry
            $expires = date("U") + 1800;
            
            // ***** Make database query *****

            // Deleting user email from the reset database
            $sql = "DELETE FROM resetpwd WHERE resetPwdEmail=?";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql)) { // If the prepared statement fails
                $_SESSION['reset_notice'] = "Something went wrong :/. Please try again!";
                redirect_to('../../login/forgot_password.php');
            }else{
                mysqli_stmt_bind_param($stmt, "s", $owner_email);
                mysqli_stmt_execute($stmt);
            }

            // Inserting values into the resetPwd table
            $sql = "INSERT INTO resetpwd (resetPwdEmail, resetPwdSelector, resetPwdToken, resetPwdExpires) VALUES (?,?,?,?)";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql)) { // If the prepared statement fails
                $_SESSION['reset_notice'] = "Something went wrong :/. Please try again!";
                redirect_to('../../login/forgot_password.php');
            }else{
                // Hash token to keep it safe
                $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ssss", $owner_email, $selector, $hashedToken, $expires);
                mysqli_stmt_execute($stmt);
            }


            mysqli_stmt_close($stmt);
            mysqli_close();

            // Create the email and send the message
            $mailTo = $owner_email; 

            $subject = "Reset your password for GotSkillsHub";
            
            $body = "<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>";

            $body .= "<p>Here is your password reset link: </br>";
            $body .= "<a href='" . $url . "'>" . $url . "</a></p>";
            
            $header = "From: gotskillshub <gotskillsh@gotskillshub.com>\r\n";
            $header .= "Reply-To: gotskillsh@gotskillshub.com\r\n";
            $header .= "Content-type: text/html\r\n"; 

            if(!mail($mailTo, $subject, $body, $header)){
                // Failed
                $_SESSION['reset_notice'] = "Something went wrong :/. Please try again!";
                redirect_to('../../login/forgot_password.php');
            }else{
                // Success
                redirect_to('../../login/forgot_password.php?reset=success');
            }

        }
    }



?>