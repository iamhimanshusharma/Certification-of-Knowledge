<?php

if(isset($_POST['create']))
{
$name=$_POST['name'];
$course=$_POST['course'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .image{
        position:relative;
    }
    .title{
        position:absolute;
        top:200px;
        left:300px;
    }
    </style>
</head>
<body>
<div class="image">
<div class="title">
<h1><?php echo $name;?></h1>
<h4><?php echo $course;?></h4>
</div>
<img src="certify.png" alt="certificate" width="100%">
</div>
</body>
</html>