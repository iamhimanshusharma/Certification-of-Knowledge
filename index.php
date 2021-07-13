<?php 
require_once('session.php');
include('db.php');

if(isset($_SESSION['ssid']))
{
  ?>
  <!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Home</title>
<link rel="shortcut icon" href="images/admin/softos_logo.png">
<style>
*{
  font-family:product sans;
}
#start{
  position:relative;
  width:100%;
  max-width:1366px;
  background-color:black;
}

#start img{
  width:100%;
  height:auto;
}

#start .btn{
  position:absolute;
  top:30%;
  left:50%;
  transform: translate(-50%, -50%);
  color:white;
  font-size:16px;
  padding:12px 24px;
  border:none;
  cursor:pointer;
  border-radius:5px;
  text-align:center;
}

#start .btn:hover{
  background-color:black;
}
</style>
  <?php
  include('login_header.php');
}
else
{
  ?>
  <!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Home</title>
<link rel="shortcut icon" href="images/admin/softos_logo.png">
<style>
*{
  font-family:product sans;
}
#start{
  position:relative;
  width:100%;
  max-width:1366px;
  background-color:black;
}

#start img{
  width:100%;
  height:auto;
}

#start .btn{
  position:absolute;
  top:30%;
  left:50%;
  transform: translate(-50%, -50%);
  color:white;
  font-size:16px;
  padding:12px 24px;
  border:none;
  cursor:pointer;
  border-radius:5px;
  text-align:center;
}

#start .btn:hover{
  background-color:black;
}
</style>
  <?php
  include('header.php');
}

?>


<!--  -->
<!--  -->

<!-- <div class="w3-center" >
<img src="images/admin/softos2.png" alt="">
<a href="choose_course" class="w3-button w3-large w3-text-white w3-round-large w3-card" style="background-color:rgb(0,176,240);width:300px;margin-top:-120px;margin-top:100px"><h2>Start Now!</h2></a>
</div>
<br> -->

<div id="start">
<div class="back"></div>
<img src="images/admin/back.png" alt="" style="width:100%" class="w3-hide-small w3-hide-medium w3-card">
<img src="images/admin/back.png" alt="" class="w3-hide-large w3-card" style="width:100%;margin-top:80px">
<a href="choose_course" class="w3-button btn w3-large w3-text-white w3-round-large w3-card" style="background-color:rgb(0,176,240);width:300px;margin-top:-120px;margin-top:100px"><h2>Start Now!</h2></a>
</div>
<br>
<!--  -->
<!--  -->
<div class="w3-container w3-red w3-card-4" style="width:50px;height:50px;position:fixed;top:200px;left:0;border-radius:50px">
<i class="fa fa-youtube w3-center" style="font-size:30px;margin:10px 0 0 -4px"></i>
</div>
<div class="w3-container w3-yellow w3-card-4" style="width:50px;height:50px;position:fixed;top:250px;left:0;border-radius:50px">
<i class="fa fa-instagram w3-center w3-text-white" style="font-size:30px;margin:10px 0 0 -4px"></i>
</div>
<div class="w3-container w3-green w3-card-4" style="width:50px;height:50px;position:fixed;top:300px;left:0;border-radius:50px">
<i class="fa fa-facebook w3-center" style="font-size:30px;margin:10px 0 0 0px"></i>
</div>
<div class="w3-container w3-blue w3-card-4" style="width:50px;height:50px;position:fixed;top:350px;left:0;border-radius:50px">
<i class="fa fa-twitter w3-center" style="font-size:30px;margin:10px 0 0 -4px"></i>
</div>

<a href="#">
<div class="w3-container w3-red" style="width:60px;height:60px;position:fixed;bottom:50px;right:50px;border-radius:20px">
<i class="fa fa-envelope w3-center" style="font-size:35px;margin:12px 0 0 -3px"></i>
</div>
</a>
<h3 style="font-size:50px">Why Softos?</h3>

<div class="w3-container w3-card" style="background:rgb(0,176,240);border-radius:0 300px 300px 0;">
<div class="w3-half" ><p style="font-size:50px;padding:50px;font-family:century gothic" class="w3-text-white w3-center">Attempt your exam and pass!</p></div>
<div class="w3-quarter w3-right"><img src="images/admin/attempt_exam.png" width="100%" style="margin:50px 0;" class="w3-card-4 w3-center w3-round-xxlarge" alt=""></div>
</div>
<br>
<div class="w3-container w3-card" style="background:rgb(255,0,0);border-radius:300px 0 0 300px;">
<div class="w3-half" >
<h3 style="font-size:50px;padding:50px;font-family:century gothic" class="w3-text-white w3-center w3-margin-left">Get Certified!
<p class="w3-padding w3-right" style="font-size:20px;padding:0px;font-family:century gothic">
After qualifying your exam, you will get verified certification, which will improve your resume, so that you
can get more job offer by certifying your knowledge.
</p>
</h3>
</div>
<div class="w3-quarter w3-right"><img src="images/admin/get_certified.png" width="100%" style="margin:50px 0;" class="w3-card-4 w3-center w3-round-xxlarge" alt=""></div>
</div>
<br>
<div class="w3-container w3-card" style="background:rgb(255,255,0);border-radius:0 300px 300px 0;">
<div class="w3-half" ><p style="font-size:50px;padding:50px;font-family:century gothic" class="w3-text-white w3-center">Upgrade your resume!</p></div>
<div class="w3-quarter w3-right"><img src="images/admin/upgrade_resume.png" width="100%" style="margin:50px 0;" class="w3-card-4 w3-center w3-round-xxlarge" alt=""></div>
</div>

<hr>

<div class="w3-center" style="margin-top:50px">
<p style="font-size:30px"><i>❝Knowledge sharing is like a worshiping, and holding the god gifts.<br>
It will lead to a world in a new generation!<br>Our community needs better and valuable segments.❞</i></p>


<p style="font-size:100px;padding:20px;color:grey" class="w3-card">Show your
<div class="w3-container" style="margin-top:-120px;padding:20px">
<div class="w3-quarter w3-center"><p style="font-size:50px;color:rgb(255,0,0)"><img src="images/admin/label3.png" width=50px alt="">Attempt</p></div>
<div class="w3-quarter w3-center"><p style="font-size:50px;color:rgb(255,255,0)"><img src="images/admin/label4.png" width=50px alt="">Pass</p></div>
<div class="w3-quarter w3-center"><p style="font-size:50px;color:rgb(0,176,80)"><img src="images/admin/label5.png" width=50px alt="">Certified</p></div>
<div class="w3-quarter w3-center"><p style="font-size:50px;color:rgb(0,176,240)"><img src="images/admin/label6.png" width=50px alt="">Upgrade</p></div>
</div>
</p>
</div>

<hr>


<div class="w3-center">
<p style="font-size:30px;color:grey">✔Certify your knowledge!<br>✔Get verified certificate!<br>✔Improve your cv!</p>
<p style="font-size:100px;padding:20px;margin-top:-50px">Start Now!</p>
<a href="choose_course" class="w3-button w3-large w3-text-white w3-round-large w3-card" style="background-color:rgb(0,176,240);width:300px;margin-top:-120px"><h2>Start Now!</h2></a>
</div>
<hr>
<div class="w3-row w3-center w3-padding-16 w3-text-white" style="background-color:rgb(51,63,80);">
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">32</span><br>
    Visitors
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">55+</span><br>
    Projects Done
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">89+</span><br>
    Happy Clients
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">150+</span><br>
    Meetings
  </div>
</div>
<div class="swiper-pagination"></div>      
</div>
</div>
</div>
<script>
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1} 
  x[slideIndex-1].style.display = "block"; 
  setTimeout(carousel, 2000); 
}
</script>

<?php include('footer.php');?>