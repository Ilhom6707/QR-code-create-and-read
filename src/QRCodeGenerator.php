<?php

namespace QRCodeApp;

use chillerlan\QRCode\QRCode;

class QRCodeGenerator
{
    public function generateQRCode(string $data): string
    {
        return (new QRCode)->render($data);
    }
}