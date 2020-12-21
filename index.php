<?php
  
  session_start();
  include('includes/db/db.php');
  include('includes/functions/functions.php');

  $page = 'home';
  // Determining the header based on login status
  if (owner_logged_in()) {
    include('includes/layouts/business_header.php');
  }else{
    include('includes/layouts/header.php');
  }

  $businesses = get_recently_added_businesses();

?>

  <!-- Page Content -->
  <!-- Fixed banned -->
  <div style="height: 70vh; background-image: url('img/banner5.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
  </div>    
  <!-- ./Fixed banned -->

  <div class="container">

    

      <!-- Blog Entries Column -->
      <!-- <div class="col-md-8"> -->

        <h1 class="my-4">Welcome to MyBusinessHub</h1>
        <p>
          MyBusinessHub is an online business hub that allows individuals with businesses or skills of any kind to reach the large audience of possible customers on the internet. Using myBusinessHub website, exposes you to all businesses and entrepreneurs within the specified location.
        </p>    

        <hr class="my-5" />

        <h3 class="text-capitalize pb-2">recently added businesses</h3>
      <div class="row">
        <div class="row text-center container-fluid">

          <?php
            while ($business = mysqli_fetch_assoc($businesses)) {
          ?>
            <div class="col-lg-4 col-md-4 mb-2">
              <div class="card h-100">
                <div style="height: 220px; background-image: url('img/<?php echo($business['business_image_location']); ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;">
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
          ?>

        </div>

        <br />

        <a href="businesses.php" class="btn mt-5" style="border-color: rgb(75,0,130); color: rgb(75,0,130);">Browse through available businesses <i class="fa fa-arrow-right"></i></a>

        <hr class="my-5" />

      </div>
      <!-- /.row -->

      
      <!-- Sidebar Widgets Column -->
      <?php // include('includes/layouts/side_bar.php'); ?>

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>