<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Kod Oqish</title>
</head>
<body>
    <h2>QR Kod yuklang va oqing</h2>
    <form action="read.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit">QRni oqish</button>
    </form>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="qr_image" required>
        <button type="submit">QRni olish</button>
    </form>

    <?php
    require_once __DIR__.'/vendor/autoload.php';

    use QRCodeApp\QRCodeGenerator;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['qr_image'])) {
        $data = $_POST['qr_image'];
        $qrCodeGenerator = new QRCodeGenerator();
        $qrcode = $qrCodeGenerator->generateQRCode($data);
        printf('<img src="%s" alt="QR Code" width="300" />', $qrcode);
    }
    ?>
</body>
</html>