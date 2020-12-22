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
        <div class="container my-5 text-center">

          <div class="container my-5">
          	<img src="img/404.png" alt="404" width="300">
            
			<h1>Page not Found!</h1>
			<p>The page you are looking for cannot be found. This could be due to an error in the URL or the page you are looking for has been removed.</p>
			<p>Click <a href="index.php" style="color: #999;"><u>here</u></a> to return to myBusinessHub.com</p>

          </div>

        </div>
       <!-- ./Contact Form -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>

