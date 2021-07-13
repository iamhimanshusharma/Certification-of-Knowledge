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
  <br>
  <br>
<div class="w3-container">
<div class="w3-modal-content w3-round w3-card" style="padding:20px">
<?php

if(isset($_POST['start-exam']))
{
  $unique_id=$_POST['exam_id'];

  ?><form action="exam-result" method="post" class="w3-container"><?php

$q_query="SELECT * FROM `filed_questions` WHERE `unique_exam_id`='$unique_id'";
$q_run=mysqli_query($con,$q_query);
$i=0;

while($q_data=mysqli_fetch_assoc($q_run))
{
    ?><h4><?php echo $q_data['question'];?></h4><?php
    $q_id=$q_data['question_id'];
    $q_course=$q_data['exam_course'];

    $o_query="SELECT * FROM `filed_options` WHERE `question_id`='$q_id' AND`unique_exam_id`='$unique_id'";
    $o_run=mysqli_query($con, $o_query);
    
    while($o_data=mysqli_fetch_assoc($o_run))
    {
?><input type="radio" name="select[<?php echo $i;?>]" value="<?php echo $o_data['options_id'];?>" required><?php echo $o_data['options'];?><br><?php   
    
}
    ?><input type="text" style="" name="question_id[<?php echo $i;?>]" value="<?php echo $q_id;?>"><hr><?php
$i++;
  }
?>
<br>
<input type="text" value="<?php echo $login_photo;?>" name="student_id" style="display:none">
<input type="text" value="<?php echo $q_course;?>" name="exam_course" style="display:block">
<div class="w3-center">
<input type="submit" value="Submit" name="answer_submit" class="w3-btn w3-blue w3-card w3-round w3-margin-bottom" style="width:200px">
</div>
</form>
<?php
}
else
{
  header('location:exam-center.php');
}
?>

</div>
</div>

</body>
</html>

<script>

</script>

<?php include('exam_footer.php');?>