<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Business Hub">
    <meta name="author" content="Jason Kwame Appiatu">
    <meta name="keywords" content="Business Hub">

    <!-- Title -->
    <title>MyBusinessHub - Register</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">

                    <!-- Display Validation error from client -->
                    <div id="required" style="text-align: center; color: red; display: none;">
                        
                    </div>
                    <!-- ./Display Validation error from client -->

                    <!-- Display Validation error from server -->
                    <?php
                        if (isset($_SESSION['registration_error'])) {
                    ?>
                        <script type="text/javascript">
                            alert('<?php echo($_SESSION['registration_error']); ?>')
                        </script>
                        <div id="required" style="text-align: center; color: red;">
                        <?php
                            echo $_SESSION['registration_error'];
                        ?>
                        </div>
                    <?php
                        }
                        $_SESSION['registration_error'] = null;
                    ?>
                    <!-- Display Validation error from server -->

                    <div class="title">
                        <h2>
                            MyBusinessHub
                            <small>Registration Form</small>
                        </h2>
                        <p style="color: blue; font-size: 14px;">For businesses owners only</p>
                    </div>
                    <form method="POST" action="../includes/raw_php/registration_process.php" onsubmit="return validate_form()" enctype="multipart/form-data">
                        <!-- Name of Business Owner -->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Owner first name *</label>
                                    <input class="input--style-4" type="text" id="first_name" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Owner last name *</label>
                                    <input class="input--style-4" type="text" id="last_name" name="last_name" required>
                                </div>
                            </div>
                        </div>

                        <!-- Owner Email -->
                        <div class="input-group">
                            <label class="label">Email *</label>
                            <input class="input--style-4" id="owner_email" type="email" name="owner_email" required>
                        </div>

                        <!-- Password -->
                        <div class="input-group">
                            <label class="label">Password *</label>
                            <input class="input--style-4" type="password" id="password" name="password" required>
                        </div>

                        <!-- Confirm password -->
                        <div class="input-group">
                            <label class="label">Confirm password *</label>
                            <input class="input--style-4" type="password" id="password2" name="password2" required>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <!-- Owner Image -->
                                <div class="input-group">
                                    <label class="label">Owner image</label>
                                    <input class="input--style-4" type="file" id="owner_image" accept="image/*" name="owner_image">
                                </div>
                            </div>
                            <div class="col-2">
                                <!-- Owner number -->
                                <div class="input-group">
                                    <label class="label">Phone Number(s) *</label>
                                    <input class="input--style-4" id="owner_number" type="text" name="owner_number" placeholder="#1 / #2 / #.." required>
                                </div>
                            </div>
                        </div>

                        <small style="color: green;">By clicking "Submit" yoy are agreeing to the <a href="#">Terms and Conditions</a> of muBusinessHub.com</small>
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit_registration">Submit</button>
                        </div>
                    </form>
                    <small style="color: #6906ff;">Additional information such as website and social media handles can be added in admin portal.</small>
                    
                    <br />
                    <br />
                    <a href="../index.php"><button class="btn btn--radius-2" style="background-color: #d9534f ;">Cancel</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

<script type="text/javascript">
    function validate_form(){
        var first_name = document.getElementById('first_name').value;
        var last_name = document.getElementById('last_name').value;
        var password = document.getElementById('password').value;
        var password2 = document.getElementById('password2').value;
        var owner_number = document.getElementById('owner_number').value;

        // alert(industry == 'none');
        // return false;

        if (first_name.trim() == '' || last_name.trim() == '' || password.trim() == '' || owner_number.trim() == '') {
            alert("Please fill the required fields");
            var req = document.getElementById('required');
            req.style.display = 'block';
            req.innerHTML = "Fields with * are required!";
            return false;
        }

        // Check password length
        if (password.length < 6) {
            alert("Pasword is too short, must be more than 6 characters!");
            var req = document.getElementById('required');
            req.style.display = 'block';
            req.innerHTML = "Password is too short!";
            return false;
        }

        var matching_passwords = password == password2;

        if (!(matching_passwords)) {
            alert("Paswords do not match!");
            var req = document.getElementById('required');
            req.style.display = 'block';
            req.innerHTML = "Passwords do not match!";
            return false;
        }

        return true;
    }
</script>