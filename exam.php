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
  <br>
<?php 

require_once('session.php');
include('db.php');

if(!isset($_SESSION['ssid']))
{
    header('location:login');
}

$login_photo = $_SESSION['ssid'];

if(isset($_POST['choosen_course']))
{
  $choosen_course=$_POST['course'];
    $verify_course="SELECT * FROM `passed_students` WHERE `signup_id`='$login_photo' AND `course_passed`='$choosen_course'";
    $verfiy_run=mysqli_query($con,$verify_course);

    if(mysqli_num_rows($verfiy_run)>0)
    {
      ?>
      <div class="w3-container">
<div class="w3-modal" id="course_verification"  style="display:block;background-image:url('images/admin/back.png');">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="width:400px;height:400px">
<div class="w3-center">
<div class="w3-container" style="background:rgb(51,63,80);color:white;border-radius:8px 8px 0 0">
<h1>Softos says!</h1>
</div>
<img src="images/admin/softos2.png" alt="Avatar" style="width:100px;" class="w3-margin-top w3-margin-left">
        <div class="w3-section">
        <h4>You have already passed this exam, want to continue?</h4>
        <a class="w3-button w3-block w3-blue w3-section w3-padding" onclick="choose_another_course()" selected>No, Choose another</a>
          <a class="w3-button w3-block w3-red w3-section w3-padding" onclick="continue_exam()">Yes, Continue</a>

          </div>
</div>
</div>
</div>
</div>
<?php
    }
}
else
{
  header('location:choose_course');
}

$login_photo_query="SELECT * FROM `signup_photo` WHERE `photo_id`='$login_photo'";
$login_photo_run=mysqli_query($con,$login_photo_query);

$login_photo_data=mysqli_fetch_assoc($login_photo_run);

include('db.php');

?>

<body>
<h3 style="margin-top:50px"><?php echo $choosen_course;?></h3>
<a onclick="leave_exam()" class="w3-bar-item w3-button w3-red w3-right w3-card w3-round">Leave</a>
  <div class="w3-container">
<div class="w3-modal" id="leave_exam"  style="display:none">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="width:400px;height:400px">
<div class="w3-center">
<div class="w3-container" style="background:rgb(51,63,80);color:white;border-radius:8px 8px 0 0">
<h1>Leave Exam?</h1>
</div>
<img src="images/blogs/softos2.png" alt="Avatar" style="width:100px;" class="w3-margin-top w3-margin-left">
        <div class="w3-section">
        <h4>Do you really want to quit your exam?</h4>
        <a class="w3-button w3-block w3-blue w3-section w3-padding w3-card" onclick="quit_exam()" >Yes, Quit!</a>
          <a class="w3-button w3-block w3-red w3-section w3-padding" onclick="quit_exam_cut()">Cancel</a>

          </div>
</div>
</div>
</div>
</div>

<p style="color:red;display:none" id="repeat_message">No certificate would be issue!</p>
<?php
$question_query="SELECT * FROM `questions` WHERE `course`='$choosen_course'";
$question_run=mysqli_query($con, $question_query);
$i=0;
if(mysqli_num_rows($question_run)>0)
{
  ?><div class="w3-container">
  <div class="w3-modal-content w3-animate-zoom w3-round-large  w3-card-4">
  <form action="check" method="post" class="w3-container"><?php
while($question_data=mysqli_fetch_assoc($question_run))
{
    ?><h4><?php echo $question_data['question'];?></h4><?php
    $q_id=$question_data['question_id'];
    $option_query="SELECT * FROM `options` WHERE `question_id`='$q_id'";
    $option_run=mysqli_query($con, $option_query);
    while($option_data=mysqli_fetch_assoc($option_run))
    {
?><input type="radio" name="select[<?php echo $i;?>]" value="<?php echo $option_data['answer_id'];?>" required><?php echo $option_data['options'];?><br><?php   
    
}
    ?><input type="text" style="display:none" name="question_id[<?php echo $i;?>]" value="<?php echo $q_id;?>"><hr><?php
$i++;
  }
?>
<br>
<input type="text" value="<?php echo $login_photo;?>" name="student_id" style="display:none">
<input type="text" value="<?php echo $choosen_course;?>" name="student_course" style="display:none">
<div class="w3-center">
<input type="submit" value="Submit" name="answer_submit" class="w3-btn w3-blue w3-card w3-round w3-margin-bottom" style="width:200px">
</div>
</form>
</div>
</div>
<br>
<?php
}
else
{
  ?>
  <div class="w3-container">
<div class="w3-modal" id="no_course_founds"  style="display:block;background-image:url('images/admin/back.png');">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="width:400px;height:400px">
<div class="w3-center">
<div class="w3-container" style="background:rgb(51,63,80);color:white;border-radius:8px 8px 0 0">
<h1>Softos says!</h1>
</div>
<img src="images/admin/softos2.png" alt="Avatar" style="width:100px;" class="w3-margin-top w3-margin-left">
        <div class="w3-section">
        <h4>Sorry, No Exams found!</h4>
        <a class="w3-button w3-block w3-blue w3-section w3-padding w3-card w3-round" style="width:200px;margin:100px" onclick="choose_another_course()" selected>Choose another!</a>
          </div>
</div>
</div>
</div>
</div>
</div>
</div>
  <?php
}
?>
</body>
</html>

<script>
function course_verification(){
setTimeout(() => {
  document.getElementById("course_verification").style.display="block";
}, 100);
};

function leave_exam(){
setTimeout(() => {
  document.getElementById("leave_exam").style.display="block";
}, 100);
};

function no_course_found(){
setTimeout(() => {
  document.getElementById("no_course_found").style.display="block";
}, 100);
};

function quit_exam(){
window.open('dashboard','_self');
}

function choose_another_course(){
window.open('choose_course','_self',);
}

function quit_exam_cut(){
  document.getElementById("leave_exam").style.display="none";
}

function continue_exam(){
  document.getElementById("course_verification").style.display="none";
  document.getElementById("repeat_message").style.display="block";
}
</script>

<?php include('exam_footer.php');?>

