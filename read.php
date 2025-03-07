<?php

use Dom\Text;
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name, "uploads/" . 'qr.jpg');


require "vendor/autoload.php";

use chillerlan\QRCode\QRCode;


try{
  $result = (new QRCode)->readFromFile(__DIR__ .  '/uploads/qr.jpg'); // -> DecoderResult

  $content = $result->data;

  $content = (string)$result;

    print_r($content);
}
catch(Throwable $e){
    error_log('QR code reading error: ' . $e->getMessage());
    echo "QR kod o‘qishda xatolik yuz berdi!";
}

unlink("upload/" . 'qr.jpg');