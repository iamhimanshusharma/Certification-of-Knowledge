<?php 
include('db.php');
require_once('session.php');
if(isset($_SESSION['ssid']))
{?>
  <!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Communiyty</title>
<link rel="shortcut icon" href="images/admin/softos_logo.png">
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
<title>SoftOS | Community</title>
<link rel="shortcut icon" href="images/admin/softos_logo.png">
  <?php
  include('header.php');
}

$c_query="SELECT * FROM `community`";

    $c_run=mysqli_query($con,$c_query);
?><table align="center" width="60%"><?php
    while($c_data=mysqli_fetch_assoc($c_run))
    {
      ?>
      <tr><td>Name: <?php echo $c_data['name'];?></td></tr>
      <tr><td>Message: <?php echo $c_data['message'];?></td></tr>
     <tr><td><b>Replies:</b></td></tr> 
<!-- reply -->
<?php
$asker=$c_data['id'];
$reply_show_query="SELECT * FROM `community_reply` WHERE `asker_id`='$asker'";  
$reply_show_run=mysqli_query($con,$reply_show_query);
while($reply_show_data=mysqli_fetch_assoc($reply_show_run))
{
?>
    <!-- reply end -->
    <tr><td><p style="margin-bottom:-5px"><?php echo $reply_show_data['reply_name'].": ".$reply_show_data['reply_message'];?></p></td></tr>
<?php } ?>
      <tr><td><table width="60%" align="center"><form action="functions.php?asker_id=<?php echo $asker;?>" method="POST">
      <tr><td><input type="text" class="w3-input" name="reply_name" required="required" placeholder="Enter Name"></td></tr>
      <tr><td><input type="text" class="w3-input" name="reply_message" required="required"  placeholder="Reply..."></td></tr>
      <tr><td><input type="submit" name="reply_submit" value="Reply" class="w3-button w3-green w3-right w3-round-large "></td></tr>
      </form></table></td></tr>
      <tr><td><br></td></tr>
      <?php
    }
    ?></table>

<!-- Container (Contact Section) -->

<?php
if(isset($_SESSION['ssid']))
{
  $hello=$_SESSION['ssid'];
  $query="SELECT * FROM `signup` WHERE `signup_id`='$hello'";
  $run=mysqli_query($con,$query);
  $data=mysqli_fetch_assoc($run);

  ?>
      <form action="functions.php" method="POST">
      <table align="center" width="70%">
    <tr><td><input class="w3-input w3-border w3-round-large w3-margin-top" type="text" placeholder="Name" name="Name" value="<?php echo $data['signup_first_name']." ".$data['signup_last_name'];?>" style="display:none"></td></tr>
    <tr><td><input class="w3-input w3-border w3-round-large" type="email" placeholder="Email" name="Email"  value="<?php echo $data['signup_email'];?>" style="display:none"></td></tr>
          
    <tr><td><input class="w3-input w3-border w3-round-large" style="width:100%;height:200px" type="text" placeholder="Message" name="Message"></td></tr>
    <tr><td><button class="w3-input w3-border w3-round-large w3-blue w3-button w3-right w3-margin-bottom" type="submit" style="width:50%" name="Send" style="width:100%">Send</button></td></tr>
      </table>
      </form>
<?php
}   
else
{
  ?>
      <form action="functions.php" method="POST">
      <table align="center" width="70%">
    <tr><td><input class="w3-input w3-border w3-round-large w3-margin-top" type="text" placeholder="Name" name="Name" required="required"></td></tr>
    <tr><td><input class="w3-input w3-border w3-round-large" type="email" id="tip" placeholder="Email" name="Email" required="required"></td></tr>
    <tr><td><input class="w3-input w3-border w3-round-large" style="width:100%;height:200px" type="text" placeholder="Message" name="Message"></td></tr>
    <tr><td><button class="w3-input w3-border w3-round-large w3-blue w3-button w3-right w3-margin-bottom" type="submit" style="width:50%" name="Send" style="width:100%">Send</button></td></tr>
      </table>
      </form>
<?php
}

?>
<?php include('footer.php');?>