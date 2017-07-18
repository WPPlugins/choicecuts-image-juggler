<?php

//reference thumbnail class
if (function_exists('idate')) {
	include_once('thumbnail_5.inc.php');
}
else {
	include_once('thumbnail_4.inc.php');
}


list($width, $height, $type, $attr) = getimagesize( $_GET['img'] );
if ($height > $width) {
	$ratio = $height / $width;
}
elseif ($width > $height) {
	$ratio = $width / $height;
}
else {
	$ratio = 1;
}

$aspect = $ratio * $_GET['size'];

$thumb = new Thumbnail($_GET['img']);
$thumb->resize($aspect,$aspect);
$thumb->cropFromCenter($_GET['size']);
$thumb->show();
$thumb->destruct();
exit;

?>