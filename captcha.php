<?php
//Si la session n'est pas réalisé, il faut l'initialiser (dans le cas d'un non routeur)
session_start();

$captcha = $_SESSION['captcha'];
echo 'image : '. $captcha;
echo '<br>';

//création de l'image
$width = 200;
$height = 100;
$image = imagecreate($width, $height);

$background = imagecolorallocate($image, rand(150,255), rand(150,255), rand(150,255));

// Recherche des fonts dans le répertoire 
$fonts = glob("assets/font/*.ttf");

// On construit notre image
$x = rand(10,15);
for($i = 0; $i < strlen($captcha); $i++){
    $y = rand(30, $height-30);
    $angle = rand(-30, 30);
    $size = rand(18,20);
    $fontKey = rand(0, sizeof($fonts)-1);
    imagettftext($image, $size, $angle, $x, $y, imagecolorallocate($image, rand(0,100), rand(0,100), rand(0,100)), $fonts[$fontKey], $captcha[$i]);

    $x += $size + rand(5,10);
}
 
// Les forms géométriques
for($j = 0; $j < rand(3,6); $j++){
    $color = imagecolorallocate($image, rand(150,255), rand(150,255), rand(150,255));
    $x1 = rand(0, $width);
    $x2 = rand(0, $width);
    $y1 = rand(0, $height); 
    $y2 = rand(0, $height); 
    switch (rand(0, 2)) {
        case 0:
            imageline($image, $x1, $y1, $x2, $y2, $color);
            break;
        case 1:
            imageellipse($image, $x1, $y1, $x2, $y2, $color);
            break;
        default:
            imagerectangle($image, $x1, $y1, $x2, $y2, $color);
            break;
    }
} 
/*
    Ensuite dans le formulaire :
    Si la session n'est pas faite il faut aussi session_start
    if(isset[$_POST['captcha']) && isset($_SESSION['captcha'])]){
        if($_SESSION['captcha'] == $_POST['captcha']) {
            echo 'OK';
        } else {
            echo 'NOK';
        }
    }
*/

//header('Content-Type: image/png');

//affichage de l'image
//imagepng($image);