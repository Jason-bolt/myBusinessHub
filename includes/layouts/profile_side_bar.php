<div class="col-md-4">

<!-- Categories Widget -->
<div class="card my-4">
  <!-- <h5 class="card-header">Categories</h5> -->
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">
      
        <!-- Owner Image -->
        <div class="container text-center mb-3">
          <?php
            if (isset($owner['owner_image_location'])) {
          ?>
            <img src="img/<?php echo($owner['owner_image_location']); ?>" style="border-radius: 100%;" alt="Avatar" class="avatar">
          <?php
            }else{
          ?>
            <img src="img/default_image.png" style="border-radius: 100%;" alt="Avatar" class="avatar">
          <?php
            }
          ?><!-- 
          <img src="img/<?php echo($owner['owner_image_location']); ?>" style="border-radius: 100%;" alt="Avatar" class="avatar"> -->
        </div>

        <!-- Owner name -->
        <h4>
          <?php echo($owner_name); ?>
        </h4>

        <small><?php echo($owner['owner_email']); ?></small>

        <button id="edit_profile_button" class="btn my-4 pull-right" style="border-color: rgb(75,0,130); color: rgb(75,0,130);">Edit <i class="fa fa-edit"></i></button>

          <div style="clear: both;"></div>

          <!-- Edit Owner profile form -->
          <div id="edit_profile">
            <form onsubmit="return validate_edit_profile()" action="includes/raw_php/edit_profile.php?id=<?php echo($owner_id); ?>" class="form" method="POST" enctype="multipart/form-data">
              
              <div class="form-group">
                <label>Profile picture</label>
                <input type="file" class="form-control" accept="image/*" name="profile_image" id="profile_image">
              </div>

              <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo($owner_fname); ?>">
              </div>

              <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo($owner_lname); ?>">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo($owner_email); ?>">
              </div>

              <div class="form-group">
                <input type="submit" name="edit_profile_submit" class="btn" style="background-color: rgb(75,0,130); color: #fff;" value="Save">
              </div>
            
            </form>

            <div class="form-group">
              <button class="btn btn-danger" id="close_edit_form">Cancel</button>
            </div>
          </div>

          <hr />

          <!-- Owner skills -->
          <h5 class="mt-4">Owner skills</h5>
          <button id="add_skills_button" class="btn my-1 mb-2" style="border-color: rgb(75,0,130); color: rgb(75,0,130);">Add skill <i class="fa fa-plus"></i></button>

          <!-- Skills form -->
          <div id="skills_form">
            <form class="form" action="includes/raw_php/add_skill.php" method="POST">
              <div class="form-group">
                <label>Skill</label>
                <input type="text" name="skill" id="skill" class="form-control" placeholder="Baking, french language, fine art,...">
              </div>

              <div class="form-group">
                <input type="submit" name="submit_skill" id="submit_skill" value="Add skill" style="background-color: rgb(75,0,130); color: #fff;" class="btn pull-right mb-2">
              </div>
            </form>
              <button class="btn btn-danger" id="cancel_skills_form">Cancel</button>
          </div>

          <div style="clear: both;"></div>
          
          <?php
            if (mysqli_num_rows($skills) > 0) {
              while ($skill = mysqli_fetch_assoc($skills)) {
          ?>
            <div class="row">
              <p class="my-0 col"><?php echo $skill['skill']; ?></p>
              <a href="includes/raw_php/delete_skill.php?skill_id=<?php echo($skill['skill_id']); ?>" onclick="return confirm('Delete skill')"><i class="fa fa-trash text-danger col"></i></a>  
            </div>
          <?php
              }
            }
          ?>

      </div>
    </div>
  
  </div>
</div>

<!-- Side Widget -->
<!-- <div class="card my-4">
  <h5 class="card-header">Side Widget</h5>
  <div class="card-body">
    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
  </div>
</div> -->

</div>

<script type="text/javascript">
  
  function validate_edit_profile(){
    var first_name = document.getElementById('first_name').value;
    var last_name = document.getElementById('last_name').value;
    var email = document.getElementById('email').value;

    if (first_name.trim() == '' || last_name.trim() == '' || email.trim() == '') {
      alert('Profile information can not be blank!');
      return false;
    }
    return true;
  }

  // Edit profile message
  <?php
    if (isset($_SESSION['edit_profile_status'])) {
  ?>
    alert('<?php echo($_SESSION['edit_profile_status']); ?>');
  <?php
    }
    $_SESSION['edit_profile_status'] = null;
  ?>

  // Add skill message
  <?php
    if (isset($_SESSION['skill_add_failure'])) {
  ?>
    alert('<?php echo($_SESSION['skill_add_failure']); ?>');
  <?php
    }
    $_SESSION['skill_add_failure'] = null;
  ?>


</script>