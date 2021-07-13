<?php  
require_once('admin-session.php');
include('admin-db.php');

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<a href="admin-upload-question">Upload Questions</a>
<a href=""></a>
<a href=""></a>
<a href=""></a>
<a href=""></a>
</body>
</html>