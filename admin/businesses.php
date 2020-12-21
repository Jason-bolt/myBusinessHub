<?php
  
  session_start();
  include('../includes/db/db.php');
  include('../includes/functions/functions.php');

  $page = 'businesses';
  // include('includes/layouts/header.php');
  // Determining the header based on login status
  if (admin_logged_in()) {
    include('includes/layouts/header.php');
  }else{
    redirect_to('../login/console_login.php');
  }


?>

  <!-- Page Content -->
  
  <div class="container mt-3">

        <h5>Select industry</h5>
        <form class="mb-4" style="width: 50%; min-width: 300px;">
          <select class="form-control" id="business_industry" onchange="otherBusinesses()">
            <option value="0">All Industries</option>
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
        </form>

      <h1 class='my-4' id="industry"></h1>

      <div class='row container'>
        <div class='row text-center container-fluid' id="businesses">
        </div>
      </div>

        <hr />


    </div>
  <!-- /.container -->

  <!-- Footer -->
<?php include('includes/layouts/footer.php'); ?>

<script type="text/javascript">
  
  window.onload = function (){

    var business_industry = '0';

    // create Ajax variable
    var xhr = new XMLHttpRequest();
    // Open file
    xhr.open('GET', '../includes/raw_php/load_businesses.php?business_industry='+business_industry, true);

    // Load contents of file
    xhr.onload = function(){
      if (this.status == 200) {
        // console.log(this);
        // console.log(this.responseText);
        var businesses = JSON.parse(this.responseText);

        var business_list = '';
        
        if (businesses == "") {
          business_list += "<div class='my-5'>" +
          "<p> No businesses for this industry </p>" +
          "</div>";
        }else{
          for(var i in businesses){
            business_list += "<div class='col-lg-4 col-md-4 mb-4'>" +
            "<div class='card h-100'>" +
            "<div style='height: 220px; background-image: url(../img/" + businesses[i].business_image_location + "); background-position: center; background-size: cover; background-repeat: no-repeat;'>" +
            "</div>" +
            "<div class='card-body'>" +
            "<h4 class='card-title'>" + businesses[i].business_name + "</h4>" +
            "<p class='card-text'>" + businesses[i].business_brief + "</p>" +
            "</div>" +
            "<div class='card-footer' style='background-color: rgb(75,0,130);'>" +
            "<a href='businesses_details.php?business_id=" + businesses[i].business_id + "&owner_id=" + businesses[i].owner_id + "' style='color: #FFF;'>Read More &rarr;</a>" +
            "</div>" +
            "</div>" +
            "</div>";

          } // for(var i in businesses){
        } // }else{
          document.getElementById('industry').innerHTML = "All Industries";
          document.getElementById('businesses').innerHTML = business_list;
      } // if (this.status == 200) {
    } // xhr.onload = function(){

    // Display xhr file content
    xhr.send();
  } // window.onload = function (){

  
  // DISPLAY other businesses onchange
  function otherBusinesses(){

    var business_industry = document.getElementById('business_industry').value;

    // create Ajax variable
    var xhr = new XMLHttpRequest();
    // Open file
    xhr.open('GET', '../includes/raw_php/load_businesses.php?business_industry='+business_industry, true);

    // Load contents of file
    xhr.onload = function(){
      if (this.status == 200) {
        // console.log(this);
        // console.log(this.responseText);
        var businesses = JSON.parse(this.responseText);

        var business_list = '';
        
        if (businesses == "") {
          business_list += "<div class='my-5'>" +
          "<p class='my-5'> No businesses for this industry </p>" +
          "</div>";
        }else{
          for(var i in businesses){
            business_list += "<div class='col-lg-4 col-md-4 mb-4'>" +
            "<div class='card h-100'>" +
            "<div style='height: 220px; background-image: url(../img/" + businesses[i].business_image_location + "); background-position: center; background-size: cover; background-repeat: no-repeat;'>" +
            "</div>" +
            "<div class='card-body'>" +
            "<h4 class='card-title'>" + businesses[i].business_name + "</h4>" +
            "<p class='card-text'>" + businesses[i].business_brief + "</p>" +
            "</div>" +
            "<div class='card-footer' style='background-color: rgb(75,0,130);'>" +
            "<a href='businesses_details.php?business_id=" + businesses[i].business_id + "&owner_id=" + businesses[i].owner_id + "' style='color: #FFF;'>Read More &rarr;</a>" +
            "</div>" +
            "</div>" +
            "</div>";

          } // for(var i in businesses){
        } // }else{

          var industry = '';
          if (business_industry == '0') {
            industry = "All Industries";
          }else if (business_industry == '1') {
            industry = "Food Service";
          }else if (business_industry == '2') {
            industry = "Advertisement, Media and Communication";
          }else if (business_industry == '3') {
            industry = "Entertainment, Events and Sports";
          }else if (business_industry == '4') {
            industry = "Healthcare";
          }else if (business_industry == '5') {
            industry = "Hospitality, Hostel and Hotel";
          }else if (business_industry == '6') {
            industry = "IT and Telecoms";
          }else if (business_industry == '7') {
            industry = "Retail, Fashion and FMCG";
          }else if (business_industry == '8') {
            industry = "Education";
          }else if (business_industry == '9') {
            industry = "Writing and Translation";
          }

          document.getElementById('industry').innerHTML = industry;
          document.getElementById('businesses').innerHTML = business_list;
      } // if (this.status == 200) {
    } // xhr.onload = function(){

    // Display xhr file content
    xhr.send();
  }

</script>