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

  $created_businesses = get_owner_businesses($owner_id);
  $owner = get_owner_by_email($owner_email);
  $skills = get_owner_skills($owner_id);

?>

  <!-- Page Content -->
  
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8 mb-5">

        <h1 class="my-4">My businesses</h1>

        <div class="row text-center">

          <?php
            if (mysqli_num_rows($created_businesses) == 0) {
          ?>
            <p>No businesses have been created.</p>
          <?php
            }else{
              while ($created_business = mysqli_fetch_assoc($created_businesses)) {
          ?>
            <div class="col-lg-6 col-md-6 mb-4">
            <div class="card h-100">
              <div style="height: 220px; background-image: url('img/<?php echo($created_business['business_image_location']); ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                <!-- <img class="card-img-top" src="img/sized1.png" alt=""> -->
              </div>
              <div class="card-body">
                <h4 class="card-title"><?php echo $created_business['business_name']; ?></h4>
                <p class="card-text"><?php echo $created_business['business_brief']; ?></p>
              </div>
              <div class="card-footer" style="background-color: rgb(75,0,130);">
                <a href="business_profile.php?business_id=<?php echo($created_business['business_id']); ?>" style="color: #FFF;">View busness &rarr;</a>
              </div>
            </div>
          </div>
          <?php
              }
            }
          ?>
          

        </div>

        <a href="create_business.php" class="btn my-4" style="border-color: rgb(75,0,130); color: rgb(75,0,130);">Create business <i class="fa fa-plus"></i></a>
 
  
      <hr />

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

  // Add business message
  <?php
    if (isset($_SESSION['add_business_message'])) {
  ?>
    alert('<?php echo($_SESSION['add_business_message']); ?>');
  <?php
    }
    $_SESSION['add_business_message'] = null;
  ?>

  $(document).ready(function() {
    // Display socail success
    <?php
      if (isset($_SESSION['social_update_status'])) {
    ?>
      alert('<?php echo($_SESSION['social_update_status']); ?>');
    <?php
      }
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