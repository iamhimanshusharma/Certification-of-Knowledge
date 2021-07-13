<?php
header('Content-type:image/png');
$date_font="bell.TTF";
$name_font="calibri.TTF";
$course_font="gothic.TTF";
$image=imagecreatefrompng("certify.png");
$name_color=imagecolorallocate($image, 0,112,192);
$course_color=imagecolorallocate($image, 34,42,53);
$date_color=imagecolorallocate($image, 0,0,0);
$name="Himanshu Sharma";
$date="26/06/2020";
$course="Python";
imagettftext($image, 20,0,142,220, $date_color, $date_font, $date);
imagettftext($image, 56,0,137,300, $name_color, $course_font, $name);
imagettftext($image, 28,0,142,420, $course_color, $course_font, $course);
imagepng($image);
imagedestroy($image);
?>