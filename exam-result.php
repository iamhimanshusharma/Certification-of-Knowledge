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
<body onload="star()" >

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
<?php

if(isset($_POST['answer_submit']))
{
$v_course="SELECT * FROM `signup` WHERE `signup_id`='$login_photo'";
$v_run=mysqli_query($con,$v_course);

$v_data=mysqli_fetch_assoc($v_run);
echo $v_data['signup_first_name']." ".$v_data['signup_last_name'];
    $question_id=$_POST['question_id'];
    $answer_id=$_POST['select'];
    $student_id=$_POST['student_id'];
    $exam_course=$_POST['exam_course'];
    if(!empty($answer_id))
    {
        $count=count($answer_id);
        ?>
        <div class="w3-container w3-center">
        <h3><?php echo "You have attempted ".$count." questions.</br>";?></h3>
        </div>
        <?php
        $result=0;

        $question_query="SELECT * FROM `filed_answers`";
        $question_run=mysqli_query($con, $question_query);
        while($question_data=mysqli_fetch_assoc($question_run))
        {
            for($i=0;$i<$count;$i++)
            {
                if($question_id[$i]==$question_data['question_id'] && $answer_id[$i]==$question_data['answer_id'])
                {
                    $result++;
                }
            }
        }
        $result=$result-1;
        $total=4;
        $pass=($result/$total)*100;
        
        ?>
        <div class="w3-container w3-center">
        <h3><?php echo $result." was correct!";?></h3>
        </div>
        <?php
        $verify_course="SELECT * FROM `organized_passed_students` WHERE `signup_id`='$student_id'";
        $verfiy_run=mysqli_query($con,$verify_course);
        
        $verify_data=mysqli_fetch_assoc($verfiy_run);

        if(mysqli_num_rows($verfiy_run)>0)
        {
            if($pass==100)
            {
                ?>
            <div class="w3-panel w3-green w3-display-container">
  <h3>Again Great!<?php echo $pass;?></h3>
</div>
<div class="w3-container w3-center">
            <a href="pdf/ocertificate?certificate-id=<?php echo $verify_data['unique_id'];?>" target="_blank" class="w3-btn w3-grey w3-round w3-card  w3-text-white w3-hover-blue w3-hover-text-white">Get your certificate here!</a>
            </div>
            <?php
            }
            else if($pass>=50)
            {
                ?>
            <div class="w3-panel w3-green w3-display-container">
  <h3>Again Good!<?php echo $pass;?></h3>
</div>
<div class="w3-container w3-center">
            <a href="pdf/ocertificate?certificate-id=<?php echo $verify_data['unique_id'];?>"  target="_blank" class="w3-btn w3-grey w3-round w3-card  w3-text-white w3-hover-blue w3-hover-text-white">Get your certificate here!</a>
            </div>
<?php
            }
            else if($pass<50)
            {
                ?>
            <div class="w3-panel w3-red w3-display-container">
  <h3>Again Fail!<?php echo $pass;?></h3>
</div>
<?php
            }

        }
        else if($pass==100)
        {
            ?>
            <div class="w3-panel w3-green w3-display-container">
  <h3>Great! <?php echo $pass;?></h3>
</div>
<?php
$detail_query="SELECT * FROM `signup` WHERE `signup_id`='$student_id'";
$detail_run=mysqli_query($con,$detail_query);
$detail=mysqli_fetch_assoc($detail_run);
$student_email=$detail['signup_email'];
$student_name=$detail['signup_first_name']." ".$detail['signup_last_name'];
function unique_id(){
    $keylength=8;
    $str="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $str1="1234567890";
    $randstr=substr(str_shuffle($str),0,3);
    $randstr1=substr(str_shuffle($str1),0,3);
    $randstr2=substr(str_shuffle($str),0,3);
    return $randstr.$randstr1.$randstr2;
}

$unique_id = unique_id();
            $pass_query="INSERT INTO `organized_passed_students`(`signup_id`, `student_name`, `student_email`, `unique_id`, `exam_course`) VALUES ('$student_id','$student_name','$student_email', '$unique_id', '$exam_course')";
        $pass_run=mysqli_query($con, $pass_query);

        if($pass_run)
        {
            ?>
            <div class="w3-container w3-center">
            <a href="pdf/ocertificate?certificate-id=<?php echo $unique_id;?>" target="_blank"  class="w3-btn w3-grey w3-round w3-card  w3-text-white w3-hover-blue w3-hover-text-white">Get your certificate here!</a>
            </div>
            <?php
        }
        }
        else if($pass>=50)
        {
            ?>
            <div class="w3-panel w3-green w3-display-container">
  <h3>Good! <?php echo $pass;?></h3>
</div>
<?php
            $detail_query="SELECT * FROM `signup` WHERE `signup_id`='$student_id'";
$detail_run=mysqli_query($con,$detail_query);
$detail=mysqli_fetch_assoc($detail_run);
$student_email=$detail['signup_email'];
$student_name=$detail['signup_first_name']." ".$detail['signup_last_name'];
function unique_id(){
    $keylength=8;
    $str="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $str1="1234567890";
    $randstr=substr(str_shuffle($str),0,3);
    $randstr1=substr(str_shuffle($str1),0,3);
    $randstr2=substr(str_shuffle($str),0,3);
    return $randstr.$randstr1.$randstr2;
}

$unique_id = unique_id();
            $pass_query="INSERT INTO `organized_passed_students`(`signup_id`, `student_name`, `student_email`, `unique_id`, `exam_course`) VALUES ('$student_id','$student_name','$student_email', '$unique_id', '$exam_course')";
        $pass_run=mysqli_query($con, $pass_query);

        if($pass_run)
        {
            ?>
            <div class="w3-container w3-center">
            <a href="pdf/ocertificate?certificate-id=<?php echo $unique_id;?>" target="_blank"  class="w3-btn w3-grey w3-round w3-card  w3-text-white w3-hover-blue w3-hover-text-white">Get your certificate here!</a>
            </div>
            <?php
        }
        }
        else if($pass<=0)
        {
            ?>
            <div class="w3-panel w3-red w3-display-container">
  <h3>Sorry, You are fail! <?php echo $pass;?></h3>
</div>
<?php
        }
    }
}
else
{
    echo "something is wrong";
}

    require_once('exam_footer.php');
?>