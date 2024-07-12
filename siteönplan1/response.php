<?php
include "baglan.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_GET['ilan_id']) && isset($_GET['response']) && isset($_GET['musteri_email'])) {
    $ilan_id = $_GET['ilan_id'];
    $response = $_GET['response'];
    $musteri_email = $_GET['musteri_email'];

    // Durumu güncellemek için SQL sorgusu
    $durum = $response === 'evet' ? 'Onaylandı' : 'Onaylanmadı';
    $query = "UPDATE ilan SET durum = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($baglan, $query)) {
        mysqli_stmt_bind_param($stmt, "si", $durum, $ilan_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "İlan durumu başarıyla güncellendi.";
        } else {
            echo "İlan durumu güncellenirken bir hata oluştu.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Sorgu hazırlama hatası: " . mysqli_error($baglan);
    }

    mysqli_close($baglan);

    // Müşteriye bilgilendirme e-postası gönderme
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '@gmail.com';
    $mail->Password = '';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = "UTF-8";
    $mail->SMTPDebug = 0;

    $mail->setFrom("@gmail.com", "Rezervasyon Sistemi");
    $mail->addAddress($musteri_email); // Müşterinin e-posta adresi

    $mail->Subject = 'Rezervasyon Durumu';
    $mail->Body = 'Merhaba, rezervasyonunuz ' . $durum . '.';

    if (!$mail->send()) {
        echo 'Müşteriye e-posta gönderimi sırasında bir hata oluştu: ' . $mail->ErrorInfo;
    } else {
        echo 'Müşteriye e-posta başarıyla gönderildi.';
    }

} else {
    echo "Geçersiz istek.";
}
?>
