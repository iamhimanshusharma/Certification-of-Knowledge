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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.alert {
  padding: 20px;
  background-color: white;
  color: black;
}

.closebtn {
  margin-left: 15px;
  color: black;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: grey;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-card" id="myNavbar" style="background:rgb(51,63,80)">
    <img src="images/admin/exam_softos.png" class="w3-left w3-margin-left" alt="" width="144px" height="81px">
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
    </div>
   
  </div>
  <br>
  <br><br><br>
<body>

<div class="w3-container">
<div class="w3-modal-content w3-round  w3-card w3-margin-bottom" style="width:300px;padding:20px">
<div class="w3-container w3-center">
<img src="images/admin/softos2.png" width="100px" alt="softos_logo">
</div>
<form action="exam-running" method="post">
<input type="text" class="w3-input w3-border w3-margin-top" name="exam_id" placeholder="Enter Exam Id...">
<div class="w3-container w3-center">
<input type="submit" name="start-exam" value="Start!" class="w3-btn w3-margin-top w3-white w3-round w3-card w3-text-blue w3-hover-text-white w3-hover-blue">
</div>
</form>
</div>
</div>

</body>
</html>

<script>

</script>

<?php include('exam_footer.php');?>

