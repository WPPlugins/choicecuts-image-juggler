<?php

//reference thumbnail class
if (function_exists('idate')) {
	include_once('thumbnail_5.inc.php');
}
else {
	include_once('thumbnail_4.inc.php');
}


// import parameters
$img = $_GET['img'];
$width = $_GET['width']; //  Primary dimension
$height = $_GET['min_height'];

list($img_width, $img_height, $img_type, $img_attr) = getimagesize( $_GET['img'] );
if ($img_height > $img_width) {
	$ratio = $img_height / $img_width;
}
elseif ($img_width > $img_height) {
	$ratio = $img_width / $img_height;
}
else {
	$ratio = 1;
}

$aspect = $ratio * $width;

$thumb = new Thumbnail($_GET['img']);
$thumb->resize($aspect, $aspect);
$thumb->crop(0,0,$width,$height);
$thumb->show();
$thumb->destruct();
exit;


?>