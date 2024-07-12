<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include "baglan.php"; // Veritabanı bağlantısı

if (isset($_GET['id']) && isset($_GET['response']) && isset($_GET['eposta'])) {
    $ilan_id = $_GET['id'];
    $response = $_GET['response'];
    $musteri_eposta = $_GET['eposta'];

    // Müşteriye geri bildirim e-postası gönderme
    $mail = new PHPMailer(true);

    try {
        // Sunucu ayarları
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'eekinci871@gmail.com'; // Kendi Gmail adresinizi girin
        $mail->Password = 'nfkg cllb npao jzdh'; // Gmail uygulama şifrenizi girin
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = "UTF-8";

        // Alıcılar
        $mail->setFrom('eekinci871@gmail.com', 'Rezervasyon Sistemi'); // Gönderen e-posta adresi
        $mail->addAddress($musteri_eposta); // Alıcı e-posta adresi

        // İçerik
        $mail->isHTML(true);
        $mail->Subject = 'Rezervasyon Durumu';

        if ($response == 'evet') {
            $mail->Body = "Rezervasyon talebiniz onaylandı.";
        } else {
            $mail->Body = "Rezervasyon talebiniz reddedildi.";
        }

        $mail->send();
        echo '<div class="alert alert-success text-center">Geri bildirim başarıyla gönderildi.</div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-danger text-center">Geri bildirim gönderilirken bir hata oluştu: ' . $mail->ErrorInfo . '</div>';
    }
} else {
    echo '<div class="alert alert-danger text-center">Geçersiz istek.</div>';
}
?>
