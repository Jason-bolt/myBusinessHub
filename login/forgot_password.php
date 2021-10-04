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
            <div class="card card-4">
                <div class="card-body">
                    <div id="required" style="text-align: center; color: red; display: none;">
                        Fields must be filled
                    </div>

                    <!-- DIsplay server information -->
                    <?php
                        if (isset($_SESSION['registration_success'])) {
                    ?>
                        <script type="text/javascript">
                            alert('<?php echo($_SESSION['registration_success']); ?>')
                        </script>
                    <?php
                        }
                        $_SESSION['registration_success'] = null;
                    ?>

                    <!-- DIsplay server information -->
                    <?php
                        if (isset($_SESSION['reset_notice'])) {
                    ?>
                        <script type="text/javascript">
                            alert('<?php echo($_SESSION['reset_notice']); ?>')
                        </script>
                    <?php
                        }
                        $_SESSION['reset_notice'] = null;
                    ?>
                    <!-- DIsplay server information -->

                    <div class="title">
                        <h2>
                            GotSkillsHub - 
                            <small>Recover Password</small>
                        </h2>
                        </div>
                    <form method="POST" action="../includes/raw_php/reset_request.php" onsubmit="return validate_form()">

                        <!-- Check if reset link has been sent -->
                        <?php
                            if (isset($_GET['reset'])) {
                                if ($_GET['reset'] == "success") {
                                    echo '<p style="color: #5cb85c; font-size: 20px; margin: auto; text-align: center;">Check your email!</p>';
                                }
                            }
                        ?>
                        
                        <!-- Email of Business Owner -->
                        <div class="form-group">
                            <div class="form-control">
                                <div class="input-group">
                                    <label class="label">Email *</label>
                                    <input class="input--style-4" type="email" id="email" name="owner_email" required>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row row-space">
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="label">Email *</label>
                                    <input class="input--style-4" type="email" id="email" name="owner_email" required>
                                </div>
                            </div>
                        </div> -->
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="reset_password" type="submit">Reset Password</button>
                        </div>
                    </form>
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

</body>

</html>
<!-- end document-->

<script type="text/javascript">
    function validate_form(){
        var email = document.getElementById('email').value;

        if (email.trim() == '') {
            alert("All fields are required");
            document.getElementById('required').style.display = 'block';
            return false;
        }

        return true;

    }
</script>