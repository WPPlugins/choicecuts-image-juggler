<?php

// get thumbnail library
if (function_exists('idate')) {
	include_once('thumbnail_5.inc.php');
}
else {
	include_once('thumbnail_4.inc.php');
}


// import parameters
$img = $_GET['img'];
$width = $_GET['width'];

// perform image manipulation
$thumb = new Thumbnail( $img );
$thumb->resize($width);
$thumb->show();
$thumb->destruct();
exit;

?>