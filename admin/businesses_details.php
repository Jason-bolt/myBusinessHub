<?php

  session_start();
  include('../includes/db/db.php');
  include('../includes/functions/functions.php');

  $page = 'businesses';
  // include('includes/layouts/header.php');
  // Determining the header based on login status
  if (admin_logged_in()) {
    include('includes/layouts/header.php');
  }else{
    redirect_to('../login/console_login.php');
  }

  if (!isset($_GET['business_id']) || !isset($_GET['owner_id']) || $_GET['business_id'] == '' || $_GET['owner_id'] == '') {
    redirect_to('businesses.php');
  }

  $business_id = $_GET['business_id'];
  $owner_id = $_GET['owner_id'];

  $business = get_business_by_id($business_id);
  $owner = get_owner_by_id($owner_id);
  $skills = get_skills_by_id($owner_id);

  if (!$owner || !$business) {
    redirect_to('businesses.php');
  }

  $owner_name = $owner['owner_fname'] . ' ' . $owner['owner_lname'];

  $industry = $business['business_industry'];
  $location = $business['business_location'];


  // INDUSTRY
  switch ($industry) {
    case '1':
      $business_industry = "food service";
      break;
    case '2':
      $business_industry = "advertisement, media and communication";
      break;
    case '3':
      $business_industry = "entertainment, events and sports";
      break;
    case '4':
      $business_industry = "healthcare";
      break;
    case '5':
      $business_industry = "hospitality, hostel and hotel";
      break;
    case '6':
      $business_industry = "IT and telecoms";
      break;
    case '7':
      $business_industry = "retail, fashion and FMCG";
      break;
    case '8':
      $business_industry = "education";
      break;
    case '9':
      $business_industry = "writing and translation";
      break;    
    default:
      $business_industry = 'none';
      break;
  }

// LOCATION
  switch ($location) {
    case '1':
      $business_location = 'old site';
      break;
    case '2':
      $business_location = 'apewusika';
      break;
    case '3':
      $business_location = 'amamoma';
      break;
    case '4':
      $business_location = 'ayensu';
      break;
    case '5':
      $business_location = 'new site';
      break;
    case '6':
      $business_location = 'kwapro';
      break;
    case '7':
      $business_location = 'around src';
      break;
    default:
      $business_location = 'none';
      break;
  }



?>

  <!-- Page Content -->
  
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8 mb-5">

        <h1 class="my-4"><?php echo $business['business_name']; ?></h1>

        <img src="../img/<?php echo $business['business_image_location']; ?>" alt="Business Image" class="card-img-top mb-4">

        <p>
          <?php echo $business['business_description']; ?>
        </p>

        <div class="d-flex flex-row">
          <h4>Industry:</h4>
          &nbsp;
          <p class="pt-1"><?php echo ucfirst($business_industry); ?></p>
        </div>

        <div class="d-flex flex-row">
          <h4>Location:</h4>
          &nbsp;
          <p class="pt-1"><?php echo ucfirst($business_location); ?></p>
        </div>

        <hr />

        <h4><u>Owner details</u></h4>

        <!-- Owner Image -->
        <div class="container mt-4">
          <img src="../img/<?php echo $owner['owner_image_location']; ?>" style="border-radius: 100%;" width="200" alt="Avatar" class="avatar">
          <h5 class="mt-2"><?php echo $owner_name; ?></h5>
        </div>

        <!-- Display skills -->
        <div class="container my-4">
          <h6><u>Skills</u></h6>
          <?php
            if (mysqli_num_rows($skills) != 0) {
              while ($skill = mysqli_fetch_assoc($skills)) {
          ?>
            <p class="my-0 py-0"><?php echo $skill['skill']; ?></p>
          <?php
              }
            }
          ?>
        </div>

        <!-- Social Media Handles -->
        <?php
          if ($owner['facebook'] != null) {
        ?>
          <div class="d-flex flex-row">
            <i class="fa fa-facebook-square m-0" style="font-size: 30px; text-decoration: none; color: #3B5998; text-align: center;"></i>
            &nbsp;
            <span class="py-1"><?php echo $owner['facebook']; ?></span>
          </div>
        <?php
          }
        ?>

        <?php
          if ($owner['instagram'] != null) {
        ?>
          <div class="d-flex flex-row">
            <i class="fa fa-instagram m-0" style="font-size: 30px; text-decoration: none; color: #125688; text-align: center;"></i>
            &nbsp;
            <span class="py-1"><?php echo $owner['instagram']; ?></span>
          </div>
        <?php
          }
        ?>

        <?php
          if ($owner['youtube'] != null) {
        ?>
          <div class="d-flex flex-row">
            <i class="fa fa-youtube-play m-0" style="font-size: 30px; text-decoration: none; color: #bb0000; text-align: center;"></i>
            &nbsp;
            <span class="py-1"><?php echo $owner['youtube']; ?></span>
          </div>
        <?php
          }
        ?>

        <?php
          if ($owner['website'] != null) {
        ?>
          <div class="d-flex flex-row">
            <i class="fa fa-globe m-0" style="font-size: 30px; text-decoration: none; text-align: center;"></i>
            &nbsp;
            <span class="py-1"><?php echo $owner['website']; ?></span>
          </div>
        <?php
          }
        ?>  

        <div class="d-flex flex-row">
          <div class="p-2 mr-auto text-primary col"><?php echo $owner['owner_email']; ?></div>
          <div class="p-2 text-primary col"><?php echo $owner['owner_phone_number']; ?></div>
        </div>

        <hr class="pb-3" />

      <?php
        if ($business['accepted'] != '1') {
      ?>
        <!-- Approve button -->
        <a href="../includes/raw_php/approve_business.php?business_id=<?php echo($business_id); ?>&owner_id=<?php echo($owner_id); ?>" class="btn btn-success">Approve</a>
      <?php
        }
      ?>

      <?php
        if ($business['accepted'] != '0') {
      ?>
        <!-- Decline button -->
        <a href="../includes/raw_php/decline_business.php?business_id=<?php echo($business_id); ?>&owner_id=<?php echo($owner_id); ?>" class="btn btn-danger">Decline</a>
      <?php
        }
      ?>   

      <br />
      <br />

      <a href="businesses.php" class="btn" style="border-color: rgb(75,0,130); color: rgb(75,0,130);"><i class="fa fa-arrow-left"></i> Back to businesses</a>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>

<script type="text/javascript">
  <?php
    if (isset($_SESSION['business_status'])) {
  ?>
    alert("<?php echo($_SESSION['business_status']); ?>");
  <?php
    }$_SESSION['business_status'] = null;
  ?>
</script>