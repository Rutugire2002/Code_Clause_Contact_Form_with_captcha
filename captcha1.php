<?php
session_start();

$code = '';
for ($i = 0; $i < 6; $i++) {
  $code .= chr(rand(97, 122));
}
$_SESSION['captcha'] = $code;

$im = imagecreatetruecolor(100, 50);
$bg_color = imagecolorallocate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 100, 50, $bg_color);
imagettftext($im, 20, 0, 10, 30, $text_color, 'arial.ttf', $code);

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>
