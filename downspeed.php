<?php
$link = 'http://download.thinkbroadband.com/20MB.zip';
$start = time();
$size = 20000000;
$file = file_get_contents($link);
$end = time();

$time = $end - $start;

$size = $size / 1048576;

$speed = round($size / $time, 2);
?>
