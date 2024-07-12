<?php
require 'vendor/autoload.php'; // PHPMailer autoload dosyasını dahil edin

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($ilan_id, $ilan_eposta) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '@gmail.com';
        $mail->Password   = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = "UTF-8";

        // Recipients
        $mail->setFrom('@gmail.com', '@gmail.com');
        $mail->addAddress($ilan_eposta);

        // Content
        $mail->Subject = 'Rezervasyon Onayı';
        $mail->Body    = '
            Merhaba, 
            Rezervasyonunuz için lütfen aşağıdaki bağlantılardan birine tıklayarak yanıt verin:
            <a href="http://localhost/response.php?ilan_id=' . $ilan_id . '&response=evet">Evet</a> 
            <a href="http://localhost/response.php?ilan_id=' . $ilan_id . '&response=hayir">Hayır</a>
        ';

        $mail->send();
        echo 'E-posta başarıyla gönderildi.';
    } catch (Exception $e) {
        echo "E-posta gönderimi sırasında bir hata oluştu: {$mail->ErrorInfo}";
    }
}
?>
