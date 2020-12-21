<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Business Hub">
  <meta name="author" content="Jason Kwame Appiatu">
  <meta name="keywords" content="Business Hub">

  <title>MyBusinessHub - Admin</title>

   <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="css/mycss.css">


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0f0030;">
    <div class="container">
      <a class="navbar-brand" href="index.php">MyBusinessHub</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php
            if ($page == 'home') {
          ?>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Pending Businesses
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="businesses.php">Approved Businesses</a>
            </li>
            <li class="nav-item">
              <a onclick="return confirm('Confirm logout!')" class="nav-link" href="../includes/raw_php/console_logout.php">Logout</a>
            </li>
          <?php
            }else if ($page == 'businesses') {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Pending Businesses</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="businesses.php">Approved Businesses
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a onclick="return confirm('Confirm logout!')" class="nav-link" href="../includes/raw_php/console_logout.php">Logout</a>
            </li>
          <?php
            }
          ?>
          
        </ul>
      </div>
    </div>
  </nav>
