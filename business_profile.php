<?php
  
  session_start();
  include('includes/db/db.php');
  include('includes/functions/functions.php');

  $page = 'profile';

  // Determining the header based on login status
  if (owner_logged_in()) {
    include('includes/layouts/business_header.php');
  }else{
    redirect_to('login/login.php');
  }

  $owner = get_owner_by_email($owner_email);
  $skills = get_owner_skills($owner_id);

  if (!isset($_GET['business_id']) || $_GET['business_id'] == '') {
    redirect_to('my_businesses.php');
  }

  $business_id = $_GET['business_id'];

  $business = get_business_by_id($business_id);

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
  // switch ($location) {
  //   case '1':
  //     $business_location = 'old site';
  //     break;
  //   case '2':
  //     $business_location = 'apewusika';
  //     break;
  //   case '3':
  //     $business_location = 'amamoma';
  //     break;
  //   case '4':
  //     $business_location = 'ayensu';
  //     break;
  //   case '5':
  //     $business_location = 'new site';
  //     break;
  //   case '6':
  //     $business_location = 'kwapro';
  //     break;
  //   case '7':
  //     $business_location = 'around src';
  //     break;
  //   default:
  //     $business_location = 'none';
  //     break;
  // }

?>

  <!-- Page Content -->
  
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8 mb-5">

        <h1 class="my-4">Profile</h1>

        <div class="mb-4">
          <!-- <img src="http://placehold.it/750x300" alt="Business Image" class="card-img-top"> -->
          <img src="img/<?php echo($business['business_image_location']); ?>" alt="Business Image" class="card-img-top">
        </div>

        <!-- Business name -->
        <h2 class="mb-4"><?php echo $business['business_name']; ?></h2>

        <h5><u>Business description</u></h5>
        <p>
          <?php echo($business['business_description']); ?>
        </p>

        <br />

        <h5><u>Business brief</u></h5>
        <p>
          <?php echo($business['business_brief']); ?>
        </p>


        <div class="d-flex flex-row">
          <h5 style="padding-top: 2px;">Industry:</h5>
          &nbsp;
          <p class="pt-1 text-capitalize"><?php echo $business_industry; ?></p>
        </div>

        <div class="d-flex flex-row">
          <h5 style="padding-top: 2px;">Location:</h5>
          &nbsp;
          <p class="pt-1 text-capitalize"><?php echo $business['business_location']; ?></p>
        </div>

      
        <button id="update_business_button" class="btn my-1" style="border-color: rgb(75,0,130); color: rgb(75,0,130);">Change <i class="fa fa-edit"></i></button>


        <!-- Update Business Info -->
        <?php include('includes/layouts/update_business_form.php'); ?>
        <!-- /.Update Business Info -->

        <hr />
        <br />

        <h4>Additional Information <small>(Optional, will appear on all jobs)</small></h4>
        <div class="input_fields_wrap mb-5">

          <!-- How to update socail handles -->
          <small style="color: rgb(75,0,130);">To add/change social handles, type/edit information in the text box and click the 'Save' button below.</small>

          <form method="POST" action="includes/raw_php/add_social_media.php?business_id=<?php echo($business['business_id']); ?>">
            <div class="form my-1">
              <div class="my-2 py-0">
                <label class="my-0">Facebook: </label>
                <input type="text" name="facebook" class="form-control" placeholder="Facebook handle" value="<?php echo($owner['facebook']); ?>">
              </div>
              <div class="my-2 py-0">
                <label class="my-0">Instagram: </label>
                <input type="text" name="instagram" class="form-control" placeholder="Instagram handle" value="<?php echo($owner['instagram']); ?>">
              </div>
              <div class="my-2 py-0">
                <label class="my-0">Youtube: </label>
                <input type="text" name="youtube" class="form-control" placeholder="Youtube channel" value="<?php echo($owner['youtube']); ?>">
              </div>
              <div class="my-2 py-0">
                <label class="my-0">Website: </label>
                <input type="text" name="website" class="form-control" placeholder="Website URL" value="<?php echo($owner['website']); ?>">
              </div>
            </div>

            <input type="submit" name="submit_social" value="Save" class="btn" style="background-color: rgb(75,0,130); color: #fff;">
          </form>

          <!-- <div><input type="text" name="mytext[]" class="form-control"></div> -->
        </div>


      <?php
        switch ($business['accepted']) {
          case '1':
            echo "<p class='text-success'><strong>Business has been accepted and is now published!</strong></p>";
            break;
          case '0':
            echo "<p class='text-danger'><strong>Business has been declined. Make sure all details are correct and appropriate!</strong></p>";
            break;

          default:
            echo "<p style='color:gold;'><strong>Business is pending acceptance before publishing.</strong></p>";
            break;
        }
      ?>

      <a onclick="return confirm('Delete this business!')" href="includes/raw_php/delete_business.php?business_id=<?php echo($business['business_id']); ?>" class="btn btn-danger">Delete this business <i class="fa fa-trash"></i></a>

      <hr />

      <a href="my_businesses.php" class="btn" style="border-color: rgb(75,0,130); color: rgb(75,0,130);"><i class="fa fa-arrow-left"></i> Back to businesses</a>

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include('includes/layouts/profile_side_bar.php'); ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>

<script type="text/javascript">
  $(document).ready(function() {
    // Business update status
    <?php
      if (isset($_SESSION['edit_business_status'])) {
    ?>
      alert('<?php echo($_SESSION['edit_business_status']); ?>');
    <?php
      }$_SESSION['edit_business_status'] = null;
    ?>

    // Display socail success
    <?php
      if (isset($_SESSION['social_update_status'])) {
    ?>
      alert('<?php echo($_SESSION['social_update_status']); ?>');
    <?php
      }$_SESSION['social_update_status'] = null;
    ?>

    // Edit profile
    document.getElementById('edit_profile_button').addEventListener('click', function(){
      document.getElementById('edit_profile').style.display = 'block';
    });
    document.getElementById('close_edit_form').addEventListener('click', function(){
      document.getElementById('edit_profile').style.display = 'none';
    });

    // Edit skills
    document.getElementById('add_skills_button').addEventListener('click', function(){
      document.getElementById('skills_form').style.display = 'block';
    });
    document.getElementById('cancel_skills_form').addEventListener('click', function(){
      document.getElementById('skills_form').style.display = 'none';
    });

    // Edit business
    document.getElementById('update_business_button').addEventListener('click', function(){
      document.getElementById('update_business_form').style.display = 'block';
    });
    document.getElementById('cancel_update_business').addEventListener('click', function(){
      document.getElementById('update_business_form').style.display = 'none';
    });


  });


  function openForm() {
    document.getElementById("popupForm").style.display = "block";
  }
  function closeForm() {
    document.getElementById("popupForm").style.display = "none";
  }

</script>

<?php
  $_SESSION['social_update_status'] = null;
?>

