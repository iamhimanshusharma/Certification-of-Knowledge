<?php
require_once('session.php');
require_once('db.php');
include('login_header.php');

if(!isset($_SESSION['ssid']))
{
    header('location:login');
}

if(isset($_POST['ques']))
{
    $quess=$_POST['questions'];
    $optss=$_POST['options'];
    $ansss=$_POST['answers'];
    $nq=$_POST['number_of_questions'];
    $exam_count=$_POST['exam_count'];
    $exam_course_name=$_POST['exam_course_name'];
    $unique_exam_id=$_POST['unique_exam_id'];
    $user_id=$_SESSION['ssid'];

if($nq==0)
{
    ?>
  <div class="w3-container">
<div class="w3-modal" id="leave_exam"  style="display:block">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="width:400px;height:400px">
<div class="w3-center">
<div class="w3-container" style="background:rgb(51,63,80);color:white;border-radius:8px 8px 0 0">
<h1>Softos says!</h1>
</div>
</div>
        
        <h3>Upload Error!</h3>
        <div class="w3-container w3-margin w3-left">
        <h5>Causes:</h5>
        <ul>
        <li><h6>File was blank.</h6></li>
        <li><h6>File was currupted.</h6></li>
        <li><h6>File was not in format.</h6></li>
        </ul>
        </div>
        <div class="w3-container w3-center">
        <a class="w3-button w3-margin w3-blue w3-card" onclick="window.open('organize-exam','_self')" style="width:200px">Upload Another</a>
        </div>
</div>
</div>
</div>
</div>
    <?php
}
else
{

    for($i=0;$i<$nq;$i++)
    {
        $q=$quess[$i];
        $a=$ansss[$i];

        $quess_query="INSERT INTO `filed_questions`(`user_id`, `question_id`, `question`, `answer_id`, `exam_count`, `exam_course`,`unique_exam_id`) VALUES ('$user_id','$i','$q','$a', '$exam_count' ,'$exam_course_name','$unique_exam_id')";
        $quess_run = mysqli_query($con,$quess_query);

        $ansss_query="INSERT INTO `filed_answers`(`user_id`, `question_id`, `answer_id`, `exam_count`, `exam_course`,`unique_exam_id`) VALUES ('$user_id','$i','$a', '$exam_count' ,'$exam_course_name','$unique_exam_id')";
        $ansss_run = mysqli_query($con,$ansss_query);
        
        $hello=1;
            for($j=$i*4;$j<($i+1)*4;$j++)
            {
                $o=$optss[$j];
                $opt_query="INSERT INTO `filed_options`(`user_id`, `question_id`, `options`, `options_id`, `exam_count`, `exam_course`,`unique_exam_id`) VALUES ('$user_id','$i','$o','$hello', '$exam_count' ,'$exam_course_name','$unique_exam_id')";
                $opt_run=mysqli_query($con, $opt_query);
                $hello++;
            }
    }
                if($opt_run && $quess_run && $ansss_run)
                {
                    header("location:preview?id=".$unique_exam_id);
                }
                else
                {
                    ?>
                        <div class="w3-panel w3-red w3-display-container">
                        <h3>Not Uploaded!</h3>
                        </div>
                    <?php
                }
}

}
?>