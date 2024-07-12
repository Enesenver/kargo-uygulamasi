<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include "baglan.php"; // Veritabanı bağlantısı

// URL'den gelen id parametresini kontrol edin
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // id parametresi tanımlı ve boş değil, devam edebiliriz
    $ilan_id = $_GET['id'];

    // E-posta gönderme formu gönderildiğinde
    if(isset($_POST['epostagonder'])) {
        // İlan sahibinin ve müşterinin e-posta adreslerini almak için sorgu yapın
        $query = "
            SELECT 
                ilan.eposta AS ilan_sahibi_eposta, 
                kullanici_bilgileri.eposta AS musteri_eposta 
            FROM ilan 
            JOIN kullanici_bilgileri 
            ON ilan.eposta = kullanici_bilgileri.eposta 
            WHERE ilan.id = ?";
        $stmt = mysqli_prepare($baglan, $query);
        mysqli_stmt_bind_param($stmt, "i", $ilan_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $ilan_sahibi_eposta, $musteri_eposta);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if(!$ilan_sahibi_eposta || !$musteri_eposta) {
            // İlan sahibinin veya müşterinin e-posta adresi bulunamadıysa uygun bir hata mesajı gösterin
            echo '<div class="alert alert-danger text-center">İlan sahibinin veya müşterinin e-posta adresi bulunamadı.</div>';
        } else {
            // İlan sahibinin ve müşterinin e-posta adresleri bulundu, e-posta gönderme işlemine devam edin
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'eekinci871@gmail.com';
            $mail->Password = 'nfkg cllb npao jzdh';
            $mail->SMTPSecure = 'tls'; 
            $mail->Port = 587; 
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = 0; 

            // Oluşturulan e-postayı ilgili kullanıcıya gönderin
            $mail->setFrom("eekinci871@gmail.com", "eekinci871@gmail.com");
            $mail->addAddress($ilan_sahibi_eposta); 

            $mail->Subject = 'Rezervasyon Talebi';
            $mail->Body = '
            Merhaba,
            Bir müşteri ilanınıza rezervasyon talebinde bulundu.
            Rezervasyon talebini onaylamak için lütfen aşağıdaki bağlantılardan birine tıklayın:
            <a href="http://localhost/send_email.php?ilan_id=' . $ilan_id . '&response=evet">Evet</a>
            <a href="http://localhost/send_email.php?ilan_id=' . $ilan_id . '&response=hayir">Hayır</a>
        ';

            $mail->isHTML(true); // E-posta içeriğini HTML olarak ayarla

            // E-postayı gönderin
            if($mail->send()) {
                echo '<div class="alert alert-success text-center">Rezervasyon talebi başarıyla gönderildi.</div>';
            } else {
                echo '<div class="alert alert-danger text-center">Rezervasyon talebi gönderilirken bir hata oluştu: ' . $mail->ErrorInfo . '</div>';
            }

            // Rezervasyon talebinin durumunu veritabanına kaydedin (varsayılan olarak 'Beklemede' olarak işaretleyelim)
        }
    }
} else {
    // id parametresi tanımlı değil veya boş, uygun bir hata mesajı gösterin
    echo '<div class="alert alert-danger text-center">İlan ID parametresi bulunamadı veya boş.</div>';
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <!-- Head kısmı -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-posta Gönder</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header mt-2">
                                    <h3 class="text-center font-weight-light my-3">E-posta Gönder</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" novalidate>
                                        <div class="mt-4 mb-0">
                                            <!-- Gönder Butonu Kısmı -->
                                            <div class="d-grid">
                                                <input type="submit" name="epostagonder" value="E-posta Gönder" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
