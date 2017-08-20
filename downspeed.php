<?php
$start = time();
$file = file_get_contents($link);
$end = time();

$time = $end - $start;

$size = $size / 1048576;


echo "Server's speed is: $speed MB/s";
?>
