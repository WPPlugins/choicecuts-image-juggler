<?php

//reference thumbnail class
if (function_exists('idate')) {
	include_once('thumbnail_5.inc.php');
}
else {
	include_once('thumbnail_4.inc.php');
}


$height = $_GET['height'];
$width = $_GET['width'];

// calculate new width to provide requested height resize
list($img_width, $img_height, $type, $attr) = getimagesize( $_GET['img'] );
if ($img_height > $img_width) {
	$ratio = $img_height / $img_width;
}
else {
	$ratio = 1;

}

$aspect = $ratio * $width;
$cropPoint = ($width-$aspect) / 2;
$cropX = abs(round($cropPoint,0));

$thumb = new Thumbnail($_GET['img']);
$thumb->resize($aspect, $height);
$thumb->crop($cropX,0,$width,$height);
$thumb->show();
$thumb->destruct();
exit;


?>