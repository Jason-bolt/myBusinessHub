<?php
  
  session_start();
  include('includes/db/db.php');
  include('includes/functions/functions.php');

  $page = 'faq';
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

      <div class="container">
        <h1 class="my-4">FAQ</h1>

        <div class="container mb-5">
          
          <h4>How do I add my business?</h4>
          <p>
            Click on the Register button, fill the form and add your business. 
          </p>

        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>