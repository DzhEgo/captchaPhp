<?php
session_start();

function generateText($length = 6){
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLen = strlen($char);
    $randText = '';
    for($i=0; $i < $length; $i++){
        $randText .= $char[rand(0, $charLen - 1)];
    }
    return $randText;
}

$_SESSION['captcha'] = generateText();

$image = imagecreatefromjpeg('noise.jpg');
$textColor = imagecolorallocate($image, 0, 0, 0);
$text = $_SESSION['captcha'];
$font = 'C:/windows/fonts/Calibri.ttf';
imagettftext($image, 30, 0, 45, 30, $textColor, $font, $text);

header('Content-Type: image/jpeg');
imagejpeg($image);
imagedestroy($image);
