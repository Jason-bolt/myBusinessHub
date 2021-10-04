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
    <title>MyBusinessHub - Login</title>

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


            <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if (empty($selector) || empty($validator)) {
                    echo "Could not validate your request";
                }else{
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>

                <div class="card card-4">
                    <div class="card-body">
                        
                        <div class="title">
                            <h2>
                                GotSkillsHub -
                                <small>Reset Password</small>
                            </h2>
                        </div>
                        <form method="POST" action="../includes/raw_php/reset_password.php" onsubmit="return validate_form()">
                            
                            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                            <input type="hidden" name="validator" value="<?php echo $validator; ?>">

                            <!-- Password Field -->
                            <div class="form-group">
                                <div class="form-control">
                                    <div class="input-group">
                                        <label class="label">Password</label>
                                        <input class="input--style-4" type="password" name="password" placeholder="Enter a new password...">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-control">
                                    <div class="input-group">
                                        <label class="label">Confirm Password</label>
                                        <input class="input--style-4" type="password" name="password-repeat" placeholder="Repeat new password...">
                                    </div>
                                </div>
                            </div>

                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" name="reset_password_submit" type="submit">Reset Password</button>
                            </div>
                        </form>
                    </div> 
                </div>


            <?php
                    }
                }
            ?>


            <!-- DIsplay server information -->
                <?php
                    if (isset($_SESSION['password-reset-status'])) {
                ?>
                    <script type="text/javascript">
                        alert('<?php echo($_SESSION['password-reset-status']); ?>')
                    </script>
                <?php
                    }
                    $_SESSION['password-reset-status'] = null;
                ?>
            <!-- DIsplay server information -->


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

</body>

</html>
<!-- end document-->