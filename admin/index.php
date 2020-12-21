<?php

  session_start();
  include('../includes/db/db.php');
  include('../includes/functions/functions.php');

  $page = 'home';
  
  if (admin_logged_in()) {
    include('includes/layouts/header.php');
  }else{
    redirect_to('../login/console_login.php');
  }

  $businesses = get_recently_added_businesses_admin();

?>

  <!-- Page Content -->

  <div class="container">

    <div class="row">

      <h3 class="my-5">Pending businesses</h3>

        <div class="row text-center container-fluid">

          <?php
            if (mysqli_num_rows($businesses) == 0) {
          ?>
            <div class="my-5">
              <p class="my-5">
                There are no pending businesses now.
              </p>
            </div>
          <?php
            }else{
              while ($business = mysqli_fetch_assoc($businesses)) {
          ?>
            <div class="col-lg-4 col-md-4 mb-2">
              <div class="card h-100">
                <div style="height: 220px; background-image: url('../img/<?php echo($business['business_image_location']); ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                  <!-- <img class="card-img-top" src="img/sized1.png" alt=""> -->
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo($business['business_name']); ?></h4>
                  <p class="card-text">
                    <?php echo($business['business_brief']); ?>
                  </p>
                </div>
                <div class="card-footer" style="background-color: rgb(75,0,130);">
                  <a href="businesses_details.php?business_id=<?php echo($business['business_id']); ?>&owner_id=<?php echo($business['owner_id']); ?>" style="color: #FFF;">Read More &rarr;</a>
                </div>
              </div>
            </div>
          <?php
              }
            }
          ?>

        </div>

        <br />

        <a href="businesses.php" class="btn mt-5" style="border-color: rgb(75,0,130); color: rgb(75,0,130);">Browse through available businesses <i class="fa fa-arrow-right"></i></a>

        <hr class="my-5" />

      </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>