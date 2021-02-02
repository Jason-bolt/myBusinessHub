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
        <h1 class="my-4">FAQs</h1>

        <div class="container mb-5">
          
          <h5><strong>How do I add my business?</strong></h5>
          <p>
            Click on the Register button and fill the form to become a member of GotSkillsHub. Then in your profile page, click the "Create business" button and fill the business form then <i>voila</i>, your business is ready and pending approval before publishing. 
          </p>

          <h5><strong>My business got denied, what do I do?</strong></h5>
          <p>
            As part of our <a href="about.php">Terms & Conditions</a>, GotSkillsHub has the right to withold any business from being published due to many factors. This can easily be fixed by changing inappropriate or copyrighted content on your business. If all details check out, your business should be online within 3 working days. Please refer to the <a href="about.php">Terms & Conditions</a> for more reasons why your business was denied.
          </p>

          <h5><strong>How do I view businesses offered by a particular owner?</strong></h5>
          <p>
            After searching or browsing through to find the business of an owner you are interested in, click on the business to see the details. Beneath the business details, you would see a list of all other businesses offered by that owner.
          </p>

          <h5><strong>Can payment be made through the site?</strong></h5>
          <p>
            Not at the moment. According to our current <a href="about.php">Terms & Conditions</a>, we do not take in any form of payment. Hence payments for services rendered must be done directly between the provider and recipient.
          </p>

          <h5><strong>How do I report a foul play?</strong></h5>
          <p>
            We advice interested customers to be very cautious in making payments to any business owner. However, unforseen circumstances may occur. At the moment, only business owners can be held accountable since they are the only ones registered on this platform. As such customers can report businesses that take monies without delivering expected reuslts by sending us a message or calling so that the said business will be taking off.
          </p>

        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>