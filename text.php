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

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS Blogs | Create your own blog ?></title>
<link rel="shortcut icon" href="images/blogs/softos_logo.png">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body onload="star()">
    <video  autoplay loop width="100%" muted  style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);" class="w3-hide-small">
    <source src="testone.mp4" type="video/mp4">
    </video>
    <video  autoplay loop width="100%" muted  style="position:absolute;bottom:0;right:0" class="w3-hide-large w3-hide-medium">
    <source src="testone.mp4" type="video/mp4">
    </video>
</body>

        <div class="w3-container">
<div class="w3-modal" id="enter_name"  style="display:block;">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large">
<div class="w3-center">
<div class="w3-half w3-white w3-border-top w3-margin-top">
<h3>Exam ID</h3>
<form action="exam-running" method="post">
<div class="w3-container w3-center">
<input type="text" class="w3-input w3-border" name="exam_id" placeholder="Enter Exam Id...">
</div>
<div class="w3-container w3-center">
<input type="submit" name="start-exam" value="Start!" class="w3-btn w3-margin w3-white w3-round w3-card w3-text-blue w3-hover-text-white w3-hover-blue">
<h3>or</h3>
<a href="#" class="w3-btn w3-round w3-green w3-card">Register</a>
</div>
</form>
      </div>      
<div class="w3-half w3-white w3-border-top w3-margin-top">
<h3>Choose Course</h3>
<form class="w3-container" action="exam" method="POST">
        <div class="w3-section">
          <select name="course" id="" class="w3-input">
          <option value="Python">Python</option>
          <option value="HTML">HTML</option>
          <option value="PHP">PHP</option>
          <option value="C">C</option>
          </select>
          <button class="w3-button w3-blue w3-card w3-margin w3-round" type="submit" name="choosen_course">Start Exam!</button>
          </div>
      </form>          

</div>
</div>
<div class="w3-container w3-center">
<a class="w3-btn w3-red w3-margin w3-round w3-card" style="width:200px" onclick="blog_cut()" name="submit_name">I'll do later</a>
</div>
</div>
</div>

        <script>

function star(){
setTimeout(() => {
  document.getElementById("enter_name").style.display="block";
}, 100);
};

function blog_cut(){
  document.getElementById("enter_name").style.display="block";
window.open('dashboard','_self');
}

	</script>
</body>
</html>

<?php// include('blogs_footer.php');?>
