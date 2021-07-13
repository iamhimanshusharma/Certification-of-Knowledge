
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
<link rel="shortcut icon" href="images/admin/softos_logo.png">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body onload="star()">


<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-card w3-white" id="myNavbar">
  <a class="w3-bar-item w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu" style="margin-top:8px">
      <img src="images/admin/softos_bar.png" width="50px" alt="" class="w3-hover-shadow w3-round" height="50px">
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
    <a class="w3-border w3-white w3-hover-blue  w3-text-gray w3-button w3-round-large" href="profile">Profile</a>
      <a class="w3-border w3-white w3-hover-blue w3-button w3-text-grey w3-round-large" href="logout">Sign Out</a>
        <hr>
        <a href="#" style="text-decoration:none;color:grey"><i>feedback</i></a>
        </div>

          </div>
    </div>
      </div>

      <a class="w3-bar-item w3-button w3-round w3-margin w3-text-grey w3-hide-small w3-border" href="dashboard" style="width:150px;margin-top:5px">Dashboard</a>
      <a class="w3-bar-item w3-button w3-orange w3-round w3-margin w3-card-4 w3-text-white w3-right w3-hide-small" href="logout" style="width:150px;margin-top:5px">Logout</a>
    
      <a class="w3-bar-item w3-hide-medium w3-hide-large w3-right w3-margin-right w3-margin-top" href="javascript:void(0);" onclick="dashFunction()" title="Toggle Navigation Menu">
      <img src="images/admin/bar.png" alt="menu" width="40px" height="40px" class="w3-round w3-card">
    </a>

    <div class="w3-container">
      <div id="dashOpt" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-right w3-card w3-round  w3-animate-right"> 
      <a class="w3-bar-item w3-button w3-round w3-margin w3-text-grey " href="dashboard" style="width:150px;margin-top:5px">Dashboard</a>
      <a class="w3-bar-item w3-button w3-orange w3-round w3-margin w3-card-4 w3-text-white" href="logout" style="width:150px;margin-top:5px">Logout</a>
     </div>
     </div>
      <br>
<br>

<h3>Edit your questions</h3>
<div class="w3-container">
<div class="w3-modal-content w3-round  w3-card" style="padding:20px">
<?php
require_once('db.php');
if(isset($_POST['submit']))
{
  $course=$_POST['organize_course'];
  $exam_count=$_POST['exam_count'];
  $file=$_FILES['csv_file']['name'];
    $file_temp=$_FILES['csv_file']['tmp_name'];

    move_uploaded_file($file_temp,"questions/$file");

    function generateKey(){
$keyLength=12;
$str="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$randstr=substr(str_shuffle($str),0,$keyLength);
return $randstr;
    }

    $unique_exam_id=generateKey();
    $file_query="INSERT INTO `question_files`(`file_name`,`user_id`, `course`,`exam_count`,`unique_exam_id`) VALUES ('$file', '$login_photo','$course','$exam_count','$unique_exam_id')";
    $file_run=mysqli_query($con,$file_query);

    $file_name =fopen("questions/".$file,"r");
    ?><form action="status.php" method="post"><?php
    $cou=0;
    while(!feof($file_name))
    {
        while($content=fgetcsv($file_name))
        {
            $count=count($content);
            $cou++;
                for($i=0;$i<$count-1;$i++)
                {
                    ?><input type="text" value="<?php echo $content[$i];?>" name="questions[]" style="font-size:30px"><br><?php
                    for($i=1;$i<$count;$i++)
                {
                    echo $i;
                    ?><input type="text" value="<?php echo $content[$i];?>" name="options[]"><br>
                    <?php
                }
                ?><input type="number" name="answers[]" placeholder="Enter your answer number" required><br><?php
                }
            
        }
          echo "<br>";
        }
    ?>
    <input type="text" style="display:none" value="<?php echo $exam_count;?>" name="exam_count">
    <input type="text" style="display:none" value="<?php echo $unique_exam_id;?>" name="unique_exam_id">
    <input type="text" style="display:none" value="<?php echo $course;?>" name="exam_course_name">
    <input type="text" style="display:block" value="<?php echo $cou;?>" name="number_of_questions">
    <input type="submit" name="ques">
    </form>
<?php
}
else
{
  ?>
  <script>
  window.open('organize-exam','_self');
  </script>
  <?php
}
?>
</div>
</div>
</div>
<hr>
<h4>Useful links!</h4>

<button onclick="myFunction('Demo1')" class="w3-button w3-block w3-blue w3-left-align w3-border">What is Softos?</button>
<div id="Demo1" class="w3-hide">
  <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae temporibus voluptatum veritatis nesciunt deleniti cumque animi? Odio voluptas necessitatibus dolores iure, dolorum omnis eum at, perspiciatis aspernatur dolorem dignissimos ipsa rem officia distinctio earum nihil debitis eligendi magni. Mollitia porro aliquam debitis, autem, voluptatibus officia illo repellat, quisquam voluptate laudantium praesentium! Quam, aspernatur sequi repellendus atque quasi maiores doloremque ab quidem mollitia saepe vero tenetur iste voluptas laboriosam sit quos ratione nemo nisi inventore amet quo tempore deserunt commodi accusamus? Quo laborum magnam dolores eveniet deserunt fuga voluptatum cupiditate nisi hic eos assumenda esse voluptas facilis, nulla pariatur laboriosam dolorum?</h5>
  </div>
  <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-blue w3-left-align w3-border">How to use softos?</button>
<div id="Demo2" class="w3-hide">
  <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae temporibus voluptatum veritatis nesciunt deleniti cumque animi? Odio voluptas necessitatibus dolores iure, dolorum omnis eum at, perspiciatis aspernatur dolorem dignissimos ipsa rem officia distinctio earum nihil debitis eligendi magni. Mollitia porro aliquam debitis, autem, voluptatibus officia illo repellat, quisquam voluptate laudantium praesentium! Quam, aspernatur sequi repellendus atque quasi maiores doloremque ab quidem mollitia saepe vero tenetur iste voluptas laboriosam sit quos ratione nemo nisi inventore amet quo tempore deserunt commodi accusamus? Quo laborum magnam dolores eveniet deserunt fuga voluptatum cupiditate nisi hic eos assumenda esse voluptas facilis, nulla pariatur laboriosam dolorum?</h5>
  </div>
  <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-blue w3-left-align w3-border">How to verify certificates?</button>
<div id="Demo3" class="w3-hide">
  <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae temporibus voluptatum veritatis nesciunt deleniti cumque animi? Odio voluptas necessitatibus dolores iure, dolorum omnis eum at, perspiciatis aspernatur dolorem dignissimos ipsa rem officia distinctio earum nihil debitis eligendi magni. Mollitia porro aliquam debitis, autem, voluptatibus officia illo repellat, quisquam voluptate laudantium praesentium! Quam, aspernatur sequi repellendus atque quasi maiores doloremque ab quidem mollitia saepe vero tenetur iste voluptas laboriosam sit quos ratione nemo nisi inventore amet quo tempore deserunt commodi accusamus? Quo laborum magnam dolores eveniet deserunt fuga voluptatum cupiditate nisi hic eos assumenda esse voluptas facilis, nulla pariatur laboriosam dolorum?</h5>
  </div>

<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

var button=document.getElementById('btn');
var csv_image=document.getElementById('csv_image');
var file_name=document.getElementById('csv_file');
button.disabled=true;

csv_image.addEventListener("click",function(){
file_name.click();
});

function file_verify(){
    var button=document.getElementById('btn');
    var mess=document.getElementById('mess');
var csv_image=document.getElementById('csv_image');
var file_name=document.getElementById('csv_file');
var file_path=file_name.value;
var allowed=/(\.csv)$/i;

if(!allowed.exec(file_path))
{
mess.style.display='block';
    file_name.value="";
    return false;
}
else
{
    csv_image.src="images/admin/selected_file.png";
    var file_new=file_path.replace(/^.*?([^\\\/]*)$/,'$1');
    mess.style.display='block';
    mess.style.color="black";
    mess.innerHTML="<h3>"+file_new+"</h3>";
button.disabled=false;
return true;
}
}

function mess(){
    
}

</script>


<?php include('footer.php'); ?>

