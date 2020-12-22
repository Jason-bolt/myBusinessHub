<?php
  
  session_start();
  include('includes/db/db.php');
  include('includes/functions/functions.php');

  if (!isset($_GET['search_query']) || !isset($_GET['search_submit'])) {
    redirect_to('businesses.php');
  }

  $page = 'businesses';
  // Determining the header based on login status
  if (owner_logged_in()) {
    include('includes/layouts/business_header.php');
  }else{
    include('includes/layouts/header.php');
  }

  $search_query = $_GET['search_query'];
  $businesses = get_all_businesses_by_keyword($search_query);

?>

  <!-- Page Content -->
  
  <div class="container mt-3">

      <div class='row container'>

        <h2 class="mb-5">Search Results</h2>

        <div class='row text-center container-fluid'>
          <?php
            if (mysqli_num_rows($businesses) == 0) {
          ?>
            <div class='my-5'>
              <p> No businesses for the keyword <strong><?php echo $search_query; ?></strong> </p>
            </div>
          <?php
            }else{
              while ($business = mysqli_fetch_assoc($businesses)) {
          ?>

            <div class='col-lg-4 col-md-4 mb-4'>
              <div class='card h-100'>
                <div style="height: 220px; background-image: url('img/<?php echo($business['business_image_location']); ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                </div>

                <div class='card-body'>
                  <h4 class='card-title'><?php echo$business['business_name']; ?></h4>
                  <p class='card-text'><?php echo$business['business_brief']; ?></p>
                </div>

                <div class='card-footer' style='background-color: rgb(75,0,130);'>
                  <a href="businesses_details.php?business_id=<?php echo$business['business_id']; ?>&owner_id=<?php echo$business['owner_id']; ?>" style='color: #FFF;'>Read More &rarr;</a>
                </div>
              </div>
            </div>

          <?php
              }
            }
          ?>
          
        </div>
      </div>

        <hr />

    </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>
