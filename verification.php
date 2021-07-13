<?php
require_once('header.php');
?>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
    <form action="" method="post">
    <input type="text" name="unique_id">
    <input type="submit" name="verify">
    </form>
</body>
</html>

<?php
require_once('db.php');
if(isset($_POST['verify']))
{
    $unique_id=$_POST['unique_id'];

$verify_query="SELECT * FROM `passed_students` WHERE `unique_id`='$unique_id'";
$verify_run=mysqli_query($con,$verify_query);

if(mysqli_num_rows($verify_run)>0)
{
    $verify_data=mysqli_fetch_assoc($verify_run);
$date=strtotime($verify_data['passed_date']);
    ?><p style="font-family:century gothic">This certificate has been issued to <span style="font-size:20px"><?php echo $verify_data['student_name'];?></span> on <span style="font-size:20px"><?php echo date('d/m/Y',$date);?></span> in <span style="font-size:20px"><?php echo $verify_data['course_passed'];?>.</span></p><?php
}
}

require_once('footer.php');
?>