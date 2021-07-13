<?php
require_once('session.php');
include('db.php');

if($_POST['file_id'])
{

$exam_id = $_POST['file_id'];

$delete_query = "DELETE FROM `question_files` WHERE `file_id` = '$exam_id'";

if(mysqli_query($con, $delete_query))
{
    header("location:recent-organized-exams");
}
else
{
    header("location:recent-organized-exams");
}
}
else
{
    header('location:recent-organized-exams');
}
?>