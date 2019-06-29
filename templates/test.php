<?php
//header('Content-type: image/png');
require_once 'vendor/autoload.php';

if(!isset($_GET["text"])  )
        exit();
        use Endroid\QrCode\QrCode;

        $qrCode = new QrCode();
$qrCode->setText($_GET["text"]);
$qrCode->setSize(200);


//file_put_contents('img.png', base64_decode());

$imgData = str_replace(' ','+',$qrCode->getDataUri());
$imgData =  substr($imgData,strpos($imgData,",")+1);
$imgData = base64_decode($imgData);
// Path where the image is going to be saved

// Write $imgData into the image file
$file = fopen("tmp/im.png", 'w');
fwrite($file, $imgData);
fclose($file);
/*echo "<pre>";
var_dump(get_class_methods($qrCode));
*/
echo $qrCode->getDataUri();

?>