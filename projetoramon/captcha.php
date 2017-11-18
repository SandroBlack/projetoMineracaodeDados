<?php
session_start();
$codigoCaptcha = substr(md5(time()), 0, 8);
$_SESSION["captcha"] = $codigoCaptcha;
$imagemCaptcha = imagecreatefromjpeg("img/fundocaptcha.jpg");
$fontCaptcha = imageloadfont("img/HomItalic_16x24_LE.gdf");
$corCaptcha = imagecolorallocate($imagemCaptcha, 100, 50, 218);
imagestring($imagemCaptcha, $fontCaptcha, 70, 25, $codigoCaptcha, $corCaptcha);
imagejpeg($imagemCaptcha);
imagedestroy($imagemCaptcha);

?>