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

  // $business_email = $_SESSION['business_email'];
  // $business_id = $_SESSION['business_id'];
  // $business = get_business_by_id($business_id);
  // $name = $business['owner_fname'] . ' ' . $business['owner_lname'];
  // $industry = $business['business_industry'];
  // $location = $business['business_location'];

?>

  <!-- Page Content -->
  
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8 mb-5">

        <h1 class="my-4">My businesses</h1>

          <form class="form" onsubmit="return validate_form()" action="includes/raw_php/add_business.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Business image *</label>
              <small style="color: rgb(75,0,130);"> (This should represent your business)</small>
              <input type="file" accept="image/*" id="business_image" name="business_image" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Business name *</label>
              <input type="text" maxlength="50" name="business_name" id="business_name" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Business description *</label>
              <textarea name="business_description" id="business_description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
              <label>Business brief *</label>
              <small style="color: rgb(75,0,130);">(This will be the first thing a user sees on the business card)</small>
              <input type="text" maxlength="150" name="business_brief" id="business_brief" class="form-control" required>
              <small class="text-danger">Must not exceed 150 characters</small>
            </div>

            <div class="form-group">
              <label>Industry *</label>
              <select class="form-control" name="business_industry" id="business_industry" required>
                <option value="1">Food service</option>
                <option value="2">Advertisement, media and communication</option>
                <option value="3">Entertainment, events and sports</option>
                <option value="4">Healthcare</option>
                <option value="5">Hospitality, hostel and hotel</option>
                <option value="6">IT and telecoms</option>
                <option value="7">Retail, fashion and FMCG</option>
                <option value="8">Education</option>
                <option value="9">Writing and translation</option>
              </select>
            </div>

            <div class="form-group">
              <label>Location *</label>
              <input type="text" name="business_location" id="business_location" class="form-control" placeholder="Business location" required>
              <small style="color: #999;">e.g. Amamoma, Ghana; Cape coast, Ghana; Texas, USA; Lagos, Nigeria; etc (Try to be as specific as possible.)</small>
              <!-- <select name="business_location" id="business_location" class="form-control" required>
                <option value="1">Old site</option>
                <option value="2">Apewusika</option>
                <option value="3">Amamoma</option>
                <option value="4">Ayensu</option>
                <option value="5">New site</option>
                <option value="6">Kwapro</option>
                <option value="7">Around SRC</option>
              </select> -->
            </div>

            <div class="form-group">
              <input type="submit" name="submit_business" value="Create" class="btn mt-4" style="background-color: rgb(75,0,130); color: #fff;">
            </div>

          </form>

          <a href="my_businesses.php" class="btn btn-danger">Cancel</a>
  
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

  function validate_form(){
    var business_name = document.getElementById('business_name').value;
    var business_description = document.getElementById('business_description').value;
    var business_brief = document.getElementById('business_brief').value;
    var business_industry = document.getElementById('business_industry').value;
    var business_location = document.getElementById('business_location').value;


    if (business_name.trim() == '' || business_description.trim() == '' || business_brief.trim() == '') {
      alert("All fields must be filled!");
      return false;
    }
    return true;
  }


  $(document).ready(function() {


  });


</script>
