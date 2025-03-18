<?php

require "vendor/autoload.php";

use QRCodeApp\QRCodeReader;

$tmp_name = $_FILES['image']['tmp_name'];
$uploadPath = "uploads/qr.jpg";

if (move_uploaded_file($tmp_name, $uploadPath)) {
    $qrCodeReader = new QRCodeReader();
    try {
        $content = $qrCodeReader->readQRCode(__DIR__ . '/' . $uploadPath);
        print_r($content);
    } catch (\RuntimeException $e) {
        echo $e->getMessage();
    } finally {
        #unlink($uploadPath);
    }
} else {
    echo "Fayl yuklashda xatolik yuz berdi!";
}