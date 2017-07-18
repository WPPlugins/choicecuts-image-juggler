<?php

// get thumbnail library
include_once('thumbnail.inc.php');

// import parameters
$img = $_GET['img'];
$height = $_GET['height'];
$aspect = $_GET['aspect'];

// perform image manipulation
$thumb = new Thumbnail( $img );
$thumb->resize($aspect, $height);
$thumb->show();
$thumb->destruct();
exit;

?>