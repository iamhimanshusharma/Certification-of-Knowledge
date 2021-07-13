<?php

include('db.php');
require_once('error.php');
require_once('session.php');
require 'phpmailer/PHPMailerAutoload.php';

// Photo insert functions
if(isset($_POST['photo_submit']))
{
    $photo_id=$_SESSION['ssid'];
    $photo_img=$_FILES['photo_img']['name'];
    $photo_temp=$_FILES['photo_img']['tmp_name'];
    
    $ext=pathinfo($photo_img,PATHINFO_EXTENSION);

    if($ext=='png' || $ext=='PNG'
    || $ext=='jpg' || $ext=='JPG'
    || $ext=='jpeg' || $ext=='JPEG'
    || $ext=='gif' || $ext=='GIF')
    {
    
        if($ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='JPEG')
        {
            $src=imagecreatefromjpeg($photo_temp);
        }
        if($ext=='png' || $ext=='PNG')
        {
            $src=imagecreatefrompng($photo_temp);
        }
        if($ext=='gif' || $ext=='GIF')
        {
            $src=imagecreatefromjpeg($photo_temp);
        }
    
        list($width_min,$height_min)=getimagesize($photo_temp);
    
        $newwidth_min=350;
    
        $newheight_min=($height_min/$width_min)*$newwidth_min;
    
        $tmp_min=imagecreatetruecolor($newwidth_min,$newheight_min);
    
        imagecopyresampled($tmp_min,$src,0,0,0,0,$newwidth_min,$newheight_min,$width_min,$height_min);
    
        imagejpeg($tmp_min,"images/signup/".$photo_img,100);
    
    $photo_query="INSERT INTO `signup_photo`(`photo_id`,`photo`) VALUES ('$photo_id','$photo_img')";

    $photo_run=mysqli_query($con,$photo_query);
    
    if($photo_run == TRUE)
    {
        ?><script>
            alert("data submit");
        </script><?php
        header('location:dashboard');
    }
    else
    {
        ?>
        <script>
        alert("something is wrong");
        </script>
        <?php
        header('location:dashboard');
    }
}
else
{
    ?>
    <script>
    alert("File format is wrong...");
    header('location:dashboard');
    </script>
    <?php
}
}

// ======================================================================================================================

// Photo update funtion
if(isset($_POST['photo_update']))
{
    $photo_id=$_SESSION['ssid'];
    $photo_img=$_FILES['photo_img']['name'];
    $photo_temp=$_FILES['photo_img']['tmp_name'];
    
    $ext=pathinfo($photo_img,PATHINFO_EXTENSION);

    if($ext=='png' || $ext=='PNG'
    || $ext=='jpg' || $ext=='JPG'
    || $ext=='jpeg' || $ext=='JPEG'
    || $ext=='gif' || $ext=='GIF')
    {
    
        if($ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='JPEG')
        {
            $src=imagecreatefromjpeg($photo_temp);
        }
        if($ext=='png' || $ext=='PNG')
        {
            $src=imagecreatefrompng($photo_temp);
        }
        if($ext=='gif' || $ext=='GIF')
        {
            $src=imagecreatefromjpeg($photo_temp);
        }
    
        list($width_min,$height_min)=getimagesize($photo_temp);
    
        $newwidth_min=350;
    
        $newheight_min=($height_min/$width_min)*$newwidth_min;
    
        $tmp_min=imagecreatetruecolor($newwidth_min,$newheight_min);
    
        imagecopyresampled($tmp_min,$src,0,0,0,0,$newwidth_min,$newheight_min,$width_min,$height_min);
    
        imagejpeg($tmp_min,"images/signup/".$photo_img,80);
    
      
    $photo_query="UPDATE `signup_photo` SET `photo`='$photo_img' WHERE `photo_id`='$photo_id'";

    $photo_run=mysqli_query($con,$photo_query);
    
    if($photo_run == TRUE)
    {
        ?><script>
            alert("data submit");
        </script><?php
        header('location:dashboard');
    }
    else
    {
        ?>
        <script>
        alert("something is wrong");
        </script>
        <?php

    }
}
else
{
    ?>
    <script>
    alert("File format is wrong...");
    window.open('dashboard','_self');
    </script>
    <?php
}
}

// =======================================================================================================================

// Login funtions
if(isset($_POST['login_submit']))
{
    $login_email=$_POST['login_email'];
    $login_password=$_POST['login_password'];
    
$login_query="SELECT * FROM `signup` WHERE `signup_email`='$login_email' AND `signup_password`='$login_password'";
$login_run=mysqli_query($con,$login_query);

if($login_run)
{

$user_data=mysqli_fetch_assoc($login_run);

if($user_data['status']=='admin')
{
    $login_session=$user_data['signup_id'];
    $_SESSION['ssid']=$login_session;
    header('location:admin');    
}
else
{
$login_session=$user_data['signup_id'];
$_SESSION['ssid']=$login_session;
header('location:dashboard');
}
}
else
{
    ?><script>alert('login is wrong!');</script><?php
}
}

// =====================================================================================================================

// Signup functions
if(isset($_POST['signup_submit']))
{

    $signup_first_name=$_POST['signup_first_name'];
    $signup_last_name=$_POST['signup_last_name'];
    $signup_email=$_POST['signup_email'];
    $signup_password=$_POST['signup_password'];
    
$ssignup="INSERT INTO `signup`(`signup_first_name`, `signup_last_name`, `signup_email`, `signup_password`,`status`) VALUES ('$signup_first_name','$signup_last_name','$signup_email','$signup_password','unverified')";

$srun=mysqli_query($con,$ssignup);

if($srun)
{
    $da="SELECT * FROM `signup` WHERE `signup_email`='$signup_email'";
    $da_run=mysqli_query($con,$da);
    $da_data=mysqli_fetch_assoc($da_run);
    
$_SESSION['ssid']=$da_data['signup_id'];

header('location:dashboard');
}
else
{
echo "ssorry";
}
}

// =======================================================================================================================

// Community form query
if(isset($_POST['Send']))
{
  $name=$_POST['Name'];
$email=$_POST['Email'];
$message=$_POST['Message'];

$query="INSERT INTO `community`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";

$run=mysqli_query($con,$query);


if($run){
header('location:community');
}
else
{?>
    <script>
    alert('something is wrong');
    window.open('community','_self');
    </script>
<?php
}
}

// ========================================================================================================================

// Register without login
if(isset($_POST['without_login_register']))
{

    $register_first_name=$_POST['register_first_name'];
    $register_last_name=$_POST['register_last_name'];
    $register_email=$_POST['register_email'];
    $register_exam_id=$_POST['register_exam_id'];
    $register_password=$_POST['register_password'];


    $validate_query = "SELECT * FROM `signup` WHERE `signup_email`='$register_email'";
    $validate_run = mysqli_query($con, $validate_query);

    if(mysqli_num_rows($validate_run)>0)
    {
        ?>
  <div class="w3-container" style="background:white">
<div class="w3-modal" id="leave_exam"  style="display:block">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="width:400px;height:400px">
<div class="w3-center">
<div class="w3-container" style="background:rgb(51,63,80);color:white;border-radius:8px 8px 0 0">
<h1>Softos says!</h1>
</div>
</div>
        
        <h3>You have an account!</h3>
        <div class="w3-container w3-margin w3-left">
        <h5>Causes:</h5>
        <ul>
        <li><h6>File was blank.</h6></li>
        <li><h6>File was currupted.</h6></li>
        <li><h6>File was not in format.</h6></li>
        </ul>
        </div>
        <div class="w3-container w3-center">
        <a class="w3-button w3-margin w3-blue w3-card" onclick="window.open('login','_self')" style="width:200px">Login</a>
        </div>
</div>
</div>
</div>
</div>
    <?php
    }
    else
    {
        $wregister_query="INSERT INTO `signup`(`signup_first_name`, `signup_last_name`, `signup_email`, `signup_password`,`status`) VALUES ('$register_first_name','$register_last_name','$register_email','$register_password','unverified')";

        $wregister_run=mysqli_query($con,$wregister_query);
        
        if($wregister_run)
        {
            $wregister_login="SELECT * FROM `signup` WHERE `signup_email`='$register_email'";
            $wregister_login_run=mysqli_query($con,$wregister_login);
            $wregister_data=mysqli_fetch_assoc($wregister_login_run);
            
        $_SESSION['ssid']=$wregister_data['signup_id'];
        
        header('location:register');
        }
        else
        {
        echo "ssorry";
        }
        }
    }
    
// =========================================================================================================================

// Community Reply form query
if(isset($_POST['reply_submit']))
{
  $asker_id=$_GET['asker_id'];
  $reply_name=$_POST['reply_name'];
$reply_message=$_POST['reply_message'];

$reply_query="INSERT INTO `community_reply`(`asker_id`,`reply_name`, `reply_message`) VALUES ('$asker_id','$reply_name','$reply_message')";

$reply_run=mysqli_query($con,$reply_query);


if($reply_run){

header('location:community');
}
else
{?>
    <script>
    alert('something is wrong');
    window.open('community','_self');
    </script>
<?php
}
}

// ======================================================================================================================

// Verify the email address
if(isset($_POST['overify']))
      {
        $otp_id=$_SESSION['ssid'];
          $otp=$_POST['otp'];
          if($_COOKIE['otp']==$otp)
          {
      
            $otp_query="UPDATE `signup` SET `status`='verified' WHERE `signup_id`='$otp_id'";
            $otp_run=mysqli_query($con,$otp_query);

                $dashboard="SELECT * FROM `signup` WHERE `signup_id`='$otp_id'";
                $dashboard_run=mysqli_query($con,$dashboard);
                
                $dashboard_data=mysqli_fetch_assoc($dashboard_run);
                

                $email=$dashboard_data['signup_email'];

                require 'phpmailer/PHPMailerAutoload.php';
                $mail=new PHPMailer;
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=465;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='ssl';

                $mail->Username='[YOUR EMAIL ID]';
                $mail->Password='[EMAIL PASSWORD]';

                $mail->setFrom('[EMAIL]','[SUBJECT]', '[SUB-HEADING]');
                $mail->addAddress($email);
                $mail->addReplyTo('[REPLY EMAIL]');

                $mail->isHTML(true);
                $mail->Subject='SUBJECT';
                $mail->Body="[MESSAGE]";

                $mail->send();

                
                ?>
                <script>
                    window.open('dashboard','_self');
                </script>
                <?php
      }
          else{
              echo "otp is wrong";
              header('location:dashboard');
          }
        }

// ===========================================================================================================================

// password reset start
if(isset($_POST['create_password']))
{
$rq_email=$_POST['req_email'];
$rq_password=$_POST['new_password'];

$ch_query="UPDATE `signup` SET `signup_password`='$rq_password' WHERE `signup_email`='$rq_email'";
$ch_run=mysqli_query($con,$ch_query);

if($ch_run)
{

    require 'phpmailer/PHPMailerAutoload.php';
$mail=new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=465;
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';

$mail->Username='[YOUR EMAIL ID]';
$mail->Password='[EMAIL PASSWORD]';

$mail->setFrom('[EMAIL]','[SUBJECT]', '[SUB-HEADING]');
$mail->addAddress($email);
$mail->addReplyTo('[REPLY EMAIL]');

$mail->isHTML(true);
$mail->Subject='SUBJECT';
$mail->Body="[MESSAGE]";

$mail->send();
    ?><div class="w3-container">
    <div id="change" class="w3-modal" style="display:block">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="width:30%;height:60%">
    <div class="w3-center"><br>
    <img src="images/admin/softos2.png" alt="Avatar" style="width:20%;" class="w3-margin-top w3-margin-left">
    <h1 >Congratulations!</h1>
    <h1>Password Changed! <img src="images/admin/verified.png" alt="pass_changed_icon" width="10%"></h1>
    
    <button class="w3-button w3-blue w3-round-xxlarge" onclick="change_pass_cut()" style="width:30%;margin-top:5px">Okay!</button>
    </div>
    </div>
    </div>
    </div>


    <script>
    function star(){
setTimeout(() => {
  document.getElementById("change").style.display="block";
}, 100);
};

function change_pass_cut(){ 
  document.getElementById('change').style.display='none';
  window.open('login','_self');
}
    </script>
    <?php
}
else
{
    header('location:login');
}
}

?>
