<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Jason Kwame Appiatu">
  <meta name="keywords" content="Business Hub">
  <link rel="icon" type="image/png" href="img/brand/brand_logo1.png">

  <?php
    if (isset($page) && $page == "businesses") {
  ?>
    <meta name="description" content="View the abundance of skilled personnel and businesses of all kind available on Gotskillshub.">

    <title>GoSH - Businesses</title>
  <?php
    }else if (isset($page) && $page == "contact") {
  ?>
    <meta name="description" content="Contact Gotskillshub if you have any issues or concerns.">

    <title>GoSH - Contact Us</title>
  <?php
    }else if (isset($page) && $page == "about") {
  ?>
    <meta name="description" content="Find out what Gotskillshub is all about including all terms of service.">

    <title>GoSH - About</title>
  <?php
    }else if (isset($page) && $page == "profile") {
  ?>
    <meta name="description" content="Create an account Gotskillshub.com and get a profile page where you can create your business cards as well as edit your personal information.">

    <title>GoSH - Profile</title>
  <?php
    }else{
  ?>
    <meta name="description" content="Gotskillshub is an online notice board or business hub that helps individuals with marketable skills as well as both small and large businesses market themselves on a larger scale using the power of the internet.">
    
    <title>GoSH</title>
  <?php
    }
  ?>

  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

  <!-- My CSS -->
  <style type="text/css">

  .avatar {
    vertical-align: middle;
    width: 200px;
    height: 200px;
    border-radius: 50%;
  }

  #edit_profile, #skills_form, #update_business_form{
    display: none;
  }

  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0f0030;">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/brand/brand_logo1.png" width="25" class="mb-1">
        GotSkillsHub
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php
            if ($page == 'home') {
          ?>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Businesses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_businesses.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'about') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="about.php">About
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Businesses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_businesses.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'businesses') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="businesses.php">Businesses
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_businesses.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'faq') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Businesses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_businesses.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'contact') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Businesses</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_businesses.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'profile') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Businesses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="my_businesses.php">Profile</a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }
          ?>
          ?>
          
        </ul>
      </div>
    </div>
  </nav>

  <section class="container pt-2">
    <form class="form-inline justify-content-center">
      <div class="mr-5" style="padding-right: 30%;">
        <i class="fa fa-phone" style="color: rgb(75,0,130);"> +233209544918</i>
        &emsp;
        <i class="fa fa-envelope" style="color: rgb(75,0,130);"> gotskillshubinfo@gmail.com</i>
      </div>
      <div class="form-group mx-sm-3 mt-2">
        <input type="text" class="form-control" id="search_query" name="search_query" placeholder="Search business">
      </div>
      <button type="submit" class="btn mt-2" style="background-color: rgb(75,0,130); color: #fff;">Search</button>
    </form>
  </section>

<hr class="mb-0" />


<?php
  $owner_id = $_SESSION['owner_id'];
  $owner_fname = $_SESSION['owner_fname'];
  $owner_lname = $_SESSION['owner_lname'];
  $owner_email = $_SESSION['owner_email'];
  $owner_name = $owner_fname . ' ' . $owner_lname;
=======
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Jason Kwame Appiatu">
  <meta name="keywords" content="Business Hub">
  <link rel="icon" type="image/png" href="img/brand/brand_logo1.png">

  <?php
    if (isset($page) && $page == "businesses") {
  ?>
    <meta name="description" content="View the abundance of skilled personnel and businesses of all kind available on Gotskillshub.">

    <title>GoSH - Businesses</title>
  <?php
    }else if (isset($page) && $page == "contact") {
  ?>
    <meta name="description" content="Contact Gotskillshub if you have any issues or concerns.">

    <title>GoSH - Contact Us</title>
  <?php
    }else if (isset($page) && $page == "about") {
  ?>
    <meta name="description" content="Find out what Gotskillshub is all about including all terms of service.">

    <title>GoSH - About</title>
  <?php
    }else if (isset($page) && $page == "profile") {
  ?>
    <meta name="description" content="Create an account Gotskillshub.com and get a profile page where you can create your business cards as well as edit your personal information.">

    <title>GoSH - Profile</title>
  <?php
    }else{
  ?>
    <meta name="description" content="Gotskillshub is an online notice board or business hub that helps individuals with marketable skills as well as both small and large businesses market themselves on a larger scale using the power of the internet.">
    
    <title>GoSH</title>
  <?php
    }
  ?>

  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

  <!-- My CSS -->
  <style type="text/css">

  .avatar {
    vertical-align: middle;
    width: 200px;
    height: 200px;
    border-radius: 50%;
  }

  #edit_profile, #skills_form, #update_business_form{
    display: none;
  }

  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0f0030;">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/brand/brand_logo1.png" width="25" class="mb-1">
        GotSkillsHub
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php
            if ($page == 'home') {
          ?>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Businesses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_businesses.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'about') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="about.php">About
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Businesses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_businesses.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'businesses') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="businesses.php">Businesses
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_businesses.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'faq') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Businesses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_businesses.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'contact') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Businesses</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_businesses.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'profile') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Businesses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="my_businesses.php">Profile</a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Confirm logout!')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }
          ?>
          ?>
          
        </ul>
      </div>
    </div>
  </nav>

  <section class="container pt-2">
    <form class="form-inline justify-content-center">
      <div class="mr-5" style="padding-right: 30%;">
        <i class="fa fa-phone" style="color: rgb(75,0,130);"> +233209544918</i>
        &emsp;
        <i class="fa fa-envelope" style="color: rgb(75,0,130);"> gotskillshubinfo@gmail.com</i>
      </div>
      <div class="form-group mx-sm-3 mt-2">
        <input type="text" class="form-control" id="search_query" name="search_query" placeholder="Search business">
      </div>
      <button type="submit" class="btn mt-2" style="background-color: rgb(75,0,130); color: #fff;">Search</button>
    </form>
  </section>

<hr class="mb-0" />


<?php
  $owner_id = $_SESSION['owner_id'];
  $owner_fname = $_SESSION['owner_fname'];
  $owner_lname = $_SESSION['owner_lname'];
  $owner_email = $_SESSION['owner_email'];
  $owner_name = $owner_fname . ' ' . $owner_lname;
>>>>>>> a7ea17d60a9102a76dced3747699985352fc6fbd
?>