<?php

namespace QRCodeApp;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Decoder\DecoderResult;
use Throwable;

class QRCodeReader
{
    public function readQRCode(string $filePath): string
    {
        try {
            // QRCode klassidan foydalanish
            $qrCode = new QRCode();
            $result = $qrCode->read($filePath); // -> DecoderResult

            // QR kod ma'lumotini qaytarish
            return $result->data;
        } catch (Throwable $e) {
            error_log('QR code reading error: ' . $e->getMessage());
            throw new \RuntimeException("QR kod o‘qishda xatolik yuz berdi!");
        }
    }
}