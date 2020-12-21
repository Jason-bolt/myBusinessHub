<?php
  
  session_start();
  include('includes/db/db.php');
  include('includes/functions/functions.php');

  $page = 'contact';
  // Determining the header based on login status
  if (owner_logged_in()) {
    include('includes/layouts/business_header.php');
  }else{
    include('includes/layouts/header.php');
  }

?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

       <!-- Contact Form -->
        <div class="container my-5" id="contact">
          <h1 class="my-4">Send us a message</h1>

          <p class="text-center" id="required" style="color: rgb(200,30,30); font-size: 12px; display: none;">
            All fields are required
          </p>
          
          <form method="POST" action="assets/mail/contact_us_process.php" onsubmit="return validate()">
              <label style="color: #555;">Name *</label>
            <div class="form-row">
          
              <div class="form-group col-md-6">
                <!-- <label>Name</label> -->
                <input oninput="return clear_required();" onsuspend="return show_required();" type="text" class="form-control" id="firstName" name="firstName" placeholder="First name" required>
                <!-- <label id="required" style="color: rgb(200,30,30); font-size: 12px; margin-bottom: 10px; margin-top: 0; display: none; padding-left: 5px;">This field is required</label> -->
              </div>
          
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
              </div>
            </div>
          
          <!-- Email -->
            <div class="form-group">
              <label style="color: #555;">Email *</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
            </div>
          
          <!-- Phone number -->
            <div class="form-group">
              <label style="color: #555;">Phone *</label>
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone number" required>
            </div>
          
          <!-- Prayer request -->
            <div class="form-group">
              <label style="color: #555;">Message *</label>
              <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
            <br />

            <button type="submit" name="contact_submit" class="btn" style="background-color: rgb(75,0,130); color: #FFF;">SUBMIT</button>
          
          </form>

        </div>
       <!-- ./Contact Form -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>

<script type="text/javascript">

  function validate(){
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var subject = document.getElementById("phone").value;
    var message = document.getElementById("message").value;
    
    if (firstName.trim() == "" && lastName.trim() == "" && subject.trim() == "" && message.trim() == ""){
      var requiredLabel = document.getElementById("required");
      requiredLabel.style.display = "block";
      return false;
    }
    // var message = document.getElementById("complaint_message").value;
    // if (message.trim() == ""){
    //   alert("Message cannot be empty!");
    //   return false;
    // }

    return true;
  }
  
</script>

