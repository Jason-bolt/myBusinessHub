<div class="container my-3" id="update_business_form">
  <div class="card">
    <h3 class="text-center my-1">Update Business Info</h3>
    <div class="card-body">
      <form class="form" action="includes/raw_php/edit_business.php?business_id=<?php echo($business['business_id']); ?>" enctype="multipart/form-data" method="POST">
        <div class="form-group">
          <label>Business image</label>
          <input type="file" class="form-control" name="business_image" id="business_image">
        </div>

        <div class="form-group">
          <label>Business name</label>
          <input type="text" name="business_name" class="form-control" id="business_name" value="<?php echo $business['business_name']; ?>">
        </div>

        <div class="form-group">
          <label>Business description</label>
          <textarea class="form-control" name="business_description" id="business_description"><?php echo $business['business_description']; ?></textarea>
        </div>

        <div class="form-group">
          <label>Brief description of businesses</label>
          <small style="color: rgb(75,0,130);">(This will be the first thing a user sees on the business card)</small>
          <input type="text" maxlength="150" name="business_brief" id="business_brief" class="form-control" value="<?php echo $business['business_brief']; ?>">
          <small class="text-danger">Must not exceed 150 characters</small>
        </div>

        <div class="form-group">
          <label>Industry</label>
          <select name="business_industry" id="business_industry" class="form-control">
            <?php
              if ($business['business_industry'] == '1') {
            ?>
              <option value="1" selected="selected">Food service</option>
              <option value="2">Advertisement, media and communication</option>
              <option value="3">Entertainment, events and sports</option>
              <option value="4">Healthcare</option>
              <option value="5">Hospitality, hostel and hotel</option>
              <option value="6">IT and telecoms</option>
              <option value="7">Retail, fashion and FMCG</option>
              <option value="8">Education</option>
              <option value="9">Writing and translation</option>
            <?php
              }if ($business['business_industry'] == '2') {
            ?>
              <option value="1">Food service</option>
              <option value="2" selected="selected">Advertisement, media and communication</option>
              <option value="3">Entertainment, events and sports</option>
              <option value="4">Healthcare</option>
              <option value="5">Hospitality, hostel and hotel</option>
              <option value="6">IT and telecoms</option>
              <option value="7">Retail, fashion and FMCG</option>
              <option value="8">Education</option>
              <option value="9">Writing and translation</option>
            <?php
              }if ($business['business_industry'] == '3') {
            ?>
              <option value="1">Food service</option>
              <option value="2">Advertisement, media and communication</option>
              <option value="3" selected="selected">Entertainment, events and sports</option>
              <option value="4">Healthcare</option>
              <option value="5">Hospitality, hostel and hotel</option>
              <option value="6">IT and telecoms</option>
              <option value="7">Retail, fashion and FMCG</option>
              <option value="8">Education</option>
              <option value="9">Writing and translation</option>
            <?php
              }if ($business['business_industry'] == '4') {
            ?>
              <option value="1">Food service</option>
              <option value="2">Advertisement, media and communication</option>
              <option value="3">Entertainment, events and sports</option>
              <option value="4" selected="selected">Healthcare</option>
              <option value="5">Hospitality, hostel and hotel</option>
              <option value="6">IT and telecoms</option>
              <option value="7">Retail, fashion and FMCG</option>
              <option value="8">Education</option>
              <option value="9">Writing and translation</option>
            <?php
              }if ($business['business_industry'] == '5') {
            ?>
              <option value="1">Food service</option>
              <option value="2">Advertisement, media and communication</option>
              <option value="3">Entertainment, events and sports</option>
              <option value="4">Healthcare</option>
              <option value="5" selected="selected">Hospitality, hostel and hotel</option>
              <option value="6">IT and telecoms</option>
              <option value="7">Retail, fashion and FMCG</option>
              <option value="8">Education</option>
              <option value="9">Writing and translation</option>
            <?php
              }if ($business['business_industry'] == '6') {
            ?>
              <option value="1">Food service</option>
              <option value="2">Advertisement, media and communication</option>
              <option value="3">Entertainment, events and sports</option>
              <option value="4">Healthcare</option>
              <option value="5">Hospitality, hostel and hotel</option>
              <option value="6" selected="selected">IT and telecoms</option>
              <option value="7">Retail, fashion and FMCG</option>
              <option value="8">Education</option>
              <option value="9">Writing and translation</option>
            <?php
              }if ($business['business_industry'] == '7') {
            ?>
              <option value="1">Food service</option>
              <option value="2">Advertisement, media and communication</option>
              <option value="3">Entertainment, events and sports</option>
              <option value="4">Healthcare</option>
              <option value="5">Hospitality, hostel and hotel</option>
              <option value="6">IT and telecoms</option>
              <option value="7" selected="selected">Retail, fashion and FMCG</option>
              <option value="8">Education</option>
              <option value="9">Writing and translation</option>
            <?php
              }if ($business['business_industry'] == '8') {
            ?>
              <option value="1">Food service</option>
              <option value="2">Advertisement, media and communication</option>
              <option value="3">Entertainment, events and sports</option>
              <option value="4">Healthcare</option>
              <option value="5">Hospitality, hostel and hotel</option>
              <option value="6">IT and telecoms</option>
              <option value="7">Retail, fashion and FMCG</option>
              <option value="8" selected="selected">Education</option>
              <option value="9">Writing and translation</option>
            <?php
              }if ($business['business_industry'] == '9') {
            ?>
              <option value="1">Food service</option>
              <option value="2">Advertisement, media and communication</option>
              <option value="3">Entertainment, events and sports</option>
              <option value="4">Healthcare</option>
              <option value="5">Hospitality, hostel and hotel</option>
              <option value="6">IT and telecoms</option>
              <option value="7">Retail, fashion and FMCG</option>
              <option value="8">Education</option>
              <option value="9" selected="selected">Writing and translation</option>
            <?php
              }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label>Location</label>
          <select name="business_location" id="business_location" class="form-control">
            <?php
              if ($business['business_location'] == '1') {
            ?>
              <option value="1" selected="selected">Old site</option>
              <option value="2">Apewusika</option>
              <option value="3">Amamoma</option>
              <option value="4">Ayensu</option>
              <option value="5">New site</option>
              <option value="6">Kwapro</option>
              <option value="7">Around SRC</option>
            <?php
              }if ($business['business_location'] == '2') {
            ?>
              <option value="1">Old site</option>
              <option value="2" selected="selected">Apewusika</option>
              <option value="3">Amamoma</option>
              <option value="4">Ayensu</option>
              <option value="5">New site</option>
              <option value="6">Kwapro</option>
              <option value="7">Around SRC</option>
            <?php
              }if ($business['business_location'] == '3') {
            ?>
              <option value="1">Old site</option>
              <option value="2">Apewusika</option>
              <option value="3" selected="selected">Amamoma</option>
              <option value="4">Ayensu</option>
              <option value="5">New site</option>
              <option value="6">Kwapro</option>
              <option value="7">Around SRC</option>
            <?php
              }if ($business['business_location'] == '4') {
            ?>
              <option value="1">Old site</option>
              <option value="2">Apewusika</option>
              <option value="3">Amamoma</option>
              <option value="4" selected="selected">Ayensu</option>
              <option value="5">New site</option>
              <option value="6">Kwapro</option>
              <option value="7">Around SRC</option>
            <?php
              }if ($business['business_location'] == '5') {
            ?>
              <option value="1">Old site</option>
              <option value="2">Apewusika</option>
              <option value="3">Amamoma</option>
              <option value="4">Ayensu</option>
              <option value="5" selected="selected">New site</option>
              <option value="6">Kwapro</option>
              <option value="7">Around SRC</option>
            <?php
              }if ($business['business_location'] == '6') {
            ?>
              <option value="1">Old site</option>
              <option value="2">Apewusika</option>
              <option value="3">Amamoma</option>
              <option value="4">Ayensu</option>
              <option value="5">New site</option>
              <option value="6" selected="selected">Kwapro</option>
              <option value="7">Around SRC</option>
            <?php
              }if ($business['business_location'] == '7') {
            ?>
              <option value="1">Old site</option>
              <option value="2">Apewusika</option>
              <option value="3">Amamoma</option>
              <option value="4">Ayensu</option>
              <option value="5">New site</option>
              <option value="6">Kwapro</option>
              <option value="7" selected="selected">Around SRC</option>
            <?php
              }
            ?>
          </select>
        </div>

        <div class="form-group">
          <input type="submit" name="submit_business_update" value="Save" class="btn" style="background-color: rgb(75,0,130); color: #fff;">
        </div>
      </form>
      <button class="btn btn-danger" id="cancel_update_business">Cancel</button>
    </div>
  </div>
</div>