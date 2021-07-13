<?php

require_once('session.php');
include('db.php');


$login_photo = $_SESSION['ssid'];

$login_photo_query="SELECT * FROM `signup_photo` WHERE `photo_id`='$login_photo'";
$login_photo_run=mysqli_query($con,$login_photo_query);

$login_photo_data=mysqli_fetch_assoc($login_photo_run);


?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body onload="star()">


<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-card w3-white" id="myNavbar">
  <a class="w3-bar-item w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu" style="margin-top:8px">
      <img src="images/admin/softos_bar.png" width="50px" alt="">
    </a>
    <img src="images/admin/softos2.png" class="w3-left w3-margin-left" alt="" width="144px" height="81px">
    <?php 
    if($login_photo_data['photo'])
    {
      ?><a onclick="profile_portal()"><img src="images/signup/<?php echo $login_photo_data['photo'];?>" alt="login" width="50px" height="50px" class="w3-card w3-margin-top w3-circle w3-right w3-margin-right w3-border w3-hover-opacity"></a><?php
    }
    else
    {
      ?><a onclick="profile_portal()"><img src="images/admin/signup_profile.jpg" alt="login" width="50px" height="50px" class="w3-card w3-margin-top w3-circle w3-right w3-margin-right w3-border w3-hover-opacity"></a><?php
    }
    ?>
    
      <a href="community" class="w3-bar-item w3-hover-white w3-button w3-round-large w3-hover-shadow w3-hide-small w3-right w3-margin-top w3-margin-right  w3-text-grey"><i class="fa fa-group"></i> COMMUNITY</a>
    <a href="." class="w3-bar-item w3-button w3-hide-small w3-hover-white  w3-round-large w3-hover-shadow  w3-right w3-margin-top w3-text-grey w3-margin-right"><i class="fa fa-home"></i> HOME</a>
  </div>
 
  <!-- Navbar on small screens -->
  <div class="w3-container">
      <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-right w3-card w3-round  w3-animate-right"> 
      <a href="." class="w3-bar-item w3-button w3-round w3-margin w3-text-grey w3-hover-text-white"  style="width:150px;margin-top:5px">Home</a>
    <a href="community" class="w3-bar-item w3-button w3-round w3-margin w3-text-grey  w3-hover-text-white" style="width:150px;margin-top:5px">Community</a>
     </div>
     </div>
</div>
<br>
<br>
<hr>

      <div class="w3-dropdown-click w3-right">
        <div id="profile_portal" class="w3-dropdown-content w3-bar-block w3-border w3-round-large w3-animate-right" style="position:fixed;right:0;width:300px">
          <!-- login start -->
          <div class="w3-center"><br>
          <?php 
    if($login_photo_data['photo'])
    {
      ?><a href="dashboard"><img src="images/signup/<?php echo $login_photo_data['photo'];?>" alt="login" width="150px" height="150px" class="w3-margin-top w3-circle w3-border w3-hover-opacity"></a><?php
    }
    else
    {
      ?><a href="dashboard"><img src="images/admin/signup_profile.jpg" alt="login" width="150px" height="150px" class="w3-margin-top w3-circle w3-border w3-hover-opacity"></a><?php
    }
    ?>
    </div>
    <div class="w3-container  w3-padding-16 w3-white w3-center w3-round-large">
    <a class="w3-border w3-white w3-hover-blue  w3-text-gray w3-button w3-round-large" href="dashboard">Dashboard</a>
      <a class="w3-border w3-white w3-hover-blue w3-button w3-text-grey w3-round-large" href="logout">Sign Out</a>
        <hr>
        <a href="#" style="text-decoration:none;color:grey"><i>feedback</i></a>
        </div>

          </div>
    </div>
      </div>
