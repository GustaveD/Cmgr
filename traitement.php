#!/usr/bin/php
<?php
$stamp = imagecreatefrompng('./A.png');
$im = imagecreatefrompng('./1469022604.png');

$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

$sx = $sx;
$sy = $sy;

imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp) -100, imagesy($stamp) -100);

header('Content-type: image/png');
imagepng($im, './test.png');
imagedestroy($im);
?>