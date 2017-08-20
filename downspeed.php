<?php
$link = 'http://download.thinkbroadband.com/5MB.zip';
$start = time();
$size = 5000000;
$file = file_get_contents($link);
$end = time();

$time = $end - $start;

$size = $size / 1048576;

$speed = round($size / $time, 2);

echo "Server's speed is: $speed MB/s";
?>
