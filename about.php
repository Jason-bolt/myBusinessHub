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
        <div class="container">
          <h1 class="my-4">About MyBusinessHub</h1>

          <div class="container mb-5">
            
            <p>
              Can you write, code, design a flier or a logo, teach, develop a website, cook, or have a transactable skill and want to get your business out there, then look no further than <strong>MyBusinessHub</strong>.
            </p>

            <p>
              <strong>MyBusinessHub</strong> is a platform that seeks to aid entrepreneurs, startups and already existing businesses reach potential customers by making their services or businesses known to the world through the internet. Registered members can create upload businesses to the platform which will then be made available to the general public upon review. 
            </p>

            <p>
              <strong><u>Disclaimer:</u></strong> MyBusinessHub is not an E-commerce platform and hence does not deal with or be responsible for any form of monetary transaction. We only make businesses available to the public, therefore individuals interested in any business on this platform are to contact said business' owner directly. 
            </p>

          </div>

        </div>
       <!-- ./Contact Form -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>

