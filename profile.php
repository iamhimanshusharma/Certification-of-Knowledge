
<?php

require_once('session.php');
include('db.php');

if(!isset($_SESSION['ssid']))
{
  header('location:login');
}

$login_photo = $_SESSION['ssid'];

$login_photo_query="SELECT * FROM `signup_photo` WHERE `photo_id`='$login_photo'";
$login_photo_run=mysqli_query($con,$login_photo_query);

$login_photo_data=mysqli_fetch_assoc($login_photo_run);


?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Dashboard</title>
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

      <a class="w3-button w3-round w3-margin w3-hover-orange w3-hover-text-white w3-left w3-card-4 w3-green w3-text-white" href="choose_course" style="width:150px;margin-top:5px">Start your exam!</a>  
      <a class="w3-bar-item w3-button w3-round w3-margin w3-text-grey w3-hide-small w3-border" href="dashboard" style="width:150px;margin-top:5px">Dashboard</a>
      <a class="w3-bar-item w3-button w3-round w3-margin w3-text-grey w3-hide-small w3-border" href="certificate" style="width:150px;margin-top:5px">Certificates</a>
    <a class="w3-bar-item w3-button w3-orange w3-round w3-margin w3-card-4 w3-text-white w3-right w3-hide-small" href="logout" style="width:150px;margin-top:5px">Logout</a>
    
<a class="w3-bar-item w3-hide-medium w3-hide-large w3-right w3-margin-right w3-margin-top" href="javascript:void(0);" onclick="dashFunction()" title="Toggle Navigation Menu">
<img src="images/admin/bar.png" alt="menu" width="40px" height="40px" class="w3-round w3-card">
</a>

<div class="w3-container">
<div id="dashOpt" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-right w3-card w3-round  w3-animate-right"> 
<a class="w3-bar-item w3-button w3-round w3-margin w3-text-grey " href="dashboard" style="width:150px;margin-top:5px">Dashboard</a>
<a class="w3-bar-item w3-button w3-round w3-margin w3-text-grey " href="certificate" style="width:150px;margin-top:5px">Certificates</a>
<a class="w3-bar-item w3-button w3-round w3-margin w3-text-grey" href="choose_course" style="width:150px;margin-top:5px">Start your exam!</a>  
<a class="w3-bar-item w3-button w3-orange w3-round w3-margin w3-card-4 w3-text-white" href="logout" style="width:150px;margin-top:5px">Logout</a>
</div>
</div>
<?php  
require_once('session.php');
include('db.php');

if(isset($_SESSION['ssid']))
{
  $signup=$_SESSION['ssid'];
    $dashboard="SELECT * FROM `signup` WHERE `signup_id`='$signup'";
    $dashboard_run=mysqli_query($con,$dashboard);
    
    $dashboard_data=mysqli_fetch_assoc($dashboard_run);
      
}
else
{
  header('location:login');     
}

?>

<?php
$signup=$_SESSION['ssid'];
$dashboard="SELECT * FROM `signup_photo` WHERE `photo_id`='$signup'";
$dashboard_run=mysqli_query($con,$dashboard);

$dashboard_data=mysqli_fetch_assoc($dashboard_run);
?>

<?php if(!$dashboard_data['photo'])
{
  ?>

  <div class="w3-center"><br>
  <div class="w3-center"><br>

  <div class="w3-container" id="menu">
  <div class="w3-content w3-large" style="max-width:100%">
    <div class="w3-row w3-center w3-card w3-padding">   
<div>
 <img src="images/admin/signup_profile.jpg" alt="login_logo" style="width:270px;height:270px" class="w3-margin-top w3-circle">
        
 </div>

        <div>
        <img src="images/admin/edit.png" alt="edit_logo" onclick="hide_button()" id="hide_button" style="display:block;width:50px;height:50px" class="w3-margin-top w3-right w3-margin-right w3-hover-shadow w3-circle">
        </div>
        
       
<div class="w3-container">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom   w3-margin-top  w3-margin-bottom" style="max-width:270px">
    <button class="w3-button w3-block w3-right w3-half w3-red w3-section w3-padding" onclick="show_button()" id="show_button" style="display:none">Cancel</button>

      <form  id="show_form" style="display:none" class="w3-container" action="functions.php" method="POST"  enctype="multipart/form-data">
        <div class="w3-section">
        <h5 class="w3-center w3-text-grey">Change Profile Picture</Picture></h5>
          <input type="file" class="w3-input w3-border w3-round-large" name="photo_img" id="choose_real" style="display:none">
          <img src="images/admin/choose.png" alt="choose_logo" id="choose_fake" style="width:200px;height:200px;cursor:pointer" class="w3-opacity-min w3-hover-opacity-off">
          <img src="images/admin/choose.png" alt="choose_logo" id="just_fake" style="display:none;width:200px;height:200px;" >
        <input type="submit" value="Set Your Picture" class="w3-button w3-block w3-blue w3-section w3-padding" name="photo_submit" id="btn"/>
        </form>

</div>
      
    </div>
  </div>
  <?php
}
else
{
    ?>

  <div class="w3-center"><br>
  <div class="w3-center"><br>
  <div class="w3-container" id="menu">
  <div class="w3-content w3-large" style="max-width:100%">
    <div class="w3-row w3-center w3-card w3-padding">   
 <div>
 <img src="images/signup/<?php echo $dashboard_data['photo'];?>" alt="login_logo" style="width:270px;height:270px" class="w3-margin-top w3-circle">
        
 </div>

        <div>
        <img src="images/admin/edit.png" alt="edit_logo" onclick="hide_button()" id="hide_button" style="display:block;width:50px;height:50px" class="w3-margin-top w3-right w3-hover-shadow w3-circle">
        </div>
        
       
<div class="w3-container">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom   w3-margin-top  w3-margin-bottom" style="max-width:270px">
    <button class="w3-button w3-block w3-right w3-half w3-red w3-section w3-padding" onclick="show_button()" id="show_button" style="display:none">Cancel</button>

      <form  id="show_form" style="display:none" class="w3-container" action="functions.php" method="POST"  enctype="multipart/form-data">
        <div class="w3-section">
        <h5 class="w3-center w3-text-grey">Change Profile Picture</Picture></h5>
          <input type="file" class="w3-input w3-border w3-round-large" name="photo_img" id="choose_real" style="display:none">
          <img src="images/admin/choose.png" alt="choose_logo" id="choose_fake" style="width:200px;height:200px;cursor:pointer" class="w3-opacity-min w3-hover-opacity-off">
          <img src="images/admin/choose.png" alt="choose_logo" id="just_fake" style="display:none;width:200px;height:200px;" >
        <input type="submit" value="Change Your Picture" class="w3-button w3-block w3-blue w3-section w3-padding" name="photo_update" id="btn"/>
        </form>

</div>
    </div>
  </div>
  <?php
}
$signup=$_SESSION['ssid'];
    $dashboard="SELECT * FROM `signup` WHERE `signup_id`='$signup'";
    $dashboard_run=mysqli_query($con,$dashboard);
    
    $dashboard_data=mysqli_fetch_assoc($dashboard_run);

?>


<div class="w3-container">
<h2><?php echo $dashboard_data['signup_first_name']." ".$dashboard_data['signup_last_name'];?></h2>
<div >
<div style="display:inline-block" class="w3-margin-right w3-hover-shadow"><a href="followings" style="text-decoration:none"><h3>Followers</h3>
<h4>0</h4></a>
</div>
<div style="display:inline-block" class="w3-margin-left  w3-hover-shadow"><a href="followers" style="text-decoration:none"><h3>Following</h3>
<h4>0</h4></a>
</div>
</div>
<?php if($dashboard_data['status']=="verified") {?>
<h4><?php echo $dashboard_data['signup_email']." <h3 style='color:green'>(".$dashboard_data['status'].") <img src='images/admin/verified.png' alt='verified_logo' style='width:20px;height:20px' class='w3-circle'></h3>
";?>
</h4>
<?php
}
else{
?><h4><?php echo $dashboard_data['signup_email']." <h4 style='color:red'>(".$dashboard_data['status'].")</h4>";?></h4>
<div class="w3-container">
<div class="w3-modal"   id="verify_otp" >
<div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:400px;height:60%">
<div class="w3-center"><br>
<img src="images/admin/softos.png" alt="Avatar" style="width:10%;" class="w3-margin-top w3-margin-left">
<h1 >Welcome to SoftOS!</h1>
<form action="email-verification.php" method="post">
<button type="submit" class="w3-button w3-blue w3-round-xxlarge" name="send_otpp"style="width:40%;margin-top:5px">Send OTP</button>
</form>
<button class="w3-button w3-blue w3-round-xxlarge" onclick="otp_cut()" style="width:40%;margin-top:5px">I'll do later</button>
</div>
</div>
</div>
</div>
<button class="w3-button w3-red w3-round-xxlarge" onclick="otp_show()" style="width:150px;margin-top:5px">Verify</button>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
function hide_button(){
    document.getElementById('show_form').style.display='block';
    document.getElementById('hide_button').style.display='none';
    document.getElementById('show_button').style.display='block';

}
function show_button(){
    document.getElementById('show_form').style.display='none';
    document.getElementById('hide_button').style.display='block';
    document.getElementById('show_button').style.display='none';

}

var choose_fa=document.getElementById('choose_fake');
var choose_re=document.getElementById('choose_real');
var just_fa=document.getElementById('just_fake');

choose_fa.addEventListener("click",function(){

    choose_re.click();

});


function otp_show(){ 
  document.getElementById('verify_otp').style.display='block';
}

function otp_cut(){ 
  document.getElementById('verify_otp').style.display='none';
}

</script>



<?php include('footer.php'); ?>