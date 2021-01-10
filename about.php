<?php
  
  session_start();
  include('includes/db/db.php');
  include('includes/functions/functions.php');

  $page = 'about';
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
          <h1 class="my-4">About GoSH</h1>

          <div class="container mb-5">
            
            <p>
              Can you write, code, design a flier or a logo, teach, develop a website, cook, or have a transactable skill and want to get your business out there, then look no further than <strong>gotskillshub.com</strong>.
            </p>

            <p>
              <strong>GotSkillsHub</strong> is a platform that seeks to aid entrepreneurs, startups and already existing businesses reach potential customers by making their services or businesses known to the world through the internet. Registered members can upload their businesses to the platform which will then be made available to the general public upon review. 
            </p>

            <p>
              <strong><u>Disclaimer:</u></strong> At the moment GotSkillsHub is not an E-commerce platform and hence does not deal with or be held responsible for any form of monetary transaction. We only make businesses available to the public, therefore individuals interested in any business on this platform are to contact said business' owner directly.
            </p>

            <p>
              <strong><i>However, we may assist by mediating funds transfer between clients and service providers when trust is shaky. </i></strong>
              For assistance, please call the help lines available.
            </p>

            <h5 class="pt-2" id="terms"><strong>TERMS & CONDITIONS</strong></h5>
            <p>
              Please read through the terms and conditions thoroughly. By using gotskillshub.com, you are agreeing to be bound by these terms & conditions and that you will be held responsible for any breach. If you do not agree with these terms, you are not suppose to be on this platform.
            </p>

            <p>
              Terms & conditions may be changed over time without notice, so we encourage all users to frequent the <q>About</q> page to be updated on developments.
            </p>

            <h6><strong>TERMS</strong></h6>
            <ul>
              <li>
                gotskillshub.com is a platform that can be used by anyone of any age and gender wanting to get their business out there. Hence any content uploaded must be appropriate for all age groups and must refrain from any abusive or sexually enticing attribute.
              </li>
              <li>
                All registered businesses must be true to the services they offer. Lies and false advertisement will not be entertained.
              </li>
              <li>
                Only registered members may advertise their businesses to the general public.
              </li>
              <li>
                Purchases are to be made directly between service providers and clients. <strong>Clients who do not trust service providers can contact the help line in the "CONTACT INFO" column in the footer or right below the company name to have a personnel from GotSkillsHub to mediate the process. This however comes with a cost.</strong>
              </li>
              <li>
                gotskillshub.com has the right to use all published businesses for GotSkillsHub marketing and promotional purposes.
              </li>
              <li>
                gotskillshub.com will not be held responsible for any service offered by a business owner that does not meet satisfactory standards of the client.
              </li>
            </ul>

            <p style="color: rgb(75,0,130);">
              <strong>
                <i>
                  gotSkillsHub is currently running a free service but charges will come in the near future. All registered members will be notified a month before execution.
                </i>
              </strong>
            </p>

            <p>
              gotSkillsHub.com has the right to reject any business that does not conform to the stated terms above. All rejected businesses may be edited or updated in order to be published on review.
            </p>

            <h4><strong>PRIVACY POLICY</strong></h4>
            <p>
              Your continued use of gotskillshub.com, means you are accepting all policies regarding the collection and use of personal infomation. Please contact us for any clarifications.
            </p>

            <p>
              Here at gotskillshub.com, the privacy of the information of our users is very important to us. We do not sell or disclose any of the information collected from our users to any third parties.
            </p>

            <p>
              We only collect information we ask for and we do so with your consent and knowledge. All users' data is kept safe and secure. However published information will be available to the general public.
            </p>

            <p>
              Our website may link to external sites that are not operated by us. Please be aware that we have no control over the content and practices of these sites, and cannot accept responsibility or liability for their respective privacy policies.
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

