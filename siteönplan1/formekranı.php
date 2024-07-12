<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include "baglan.php"; // Veritabanı bağlantısı

// Formdan gelen verileri al
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isim = $_POST['isim'];
    $telefon = $_POST['telefon'];
    $eposta = $_POST['eposta'];
    $urun = $_POST['urun'];
    $agirlik = $_POST['agirlik'];

    // SQL sorgusunu hazırla
    $sql = "INSERT INTO rezervasyon (isim, telefon, eposta, urun, agirlik) VALUES (?, ?, ?, ?, ?)";
    $stmt = $baglan->prepare($sql);
    $stmt->bind_param("ssssd", $isim, $telefon, $eposta, $urun, $agirlik);
    
    // Veritabanına veriyi ekle
    if ($stmt->execute()) {
        echo "Rezervasyon başarıyla kaydedildi!";

        // İlan tablosundan veriyi çekme
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            // id parametresi tanımlı ve boş değil, devam edebiliriz
            $ilan_id = $_GET['id'];
        
            // İlan bilgilerini sorgula
            $query_ilan = "SELECT * FROM ilan WHERE id = ?";
            $stmt_ilan = $baglan->prepare($query_ilan);
            $stmt_ilan->bind_param("i", $ilan_id);
            $stmt_ilan->execute();
            $result_ilan = $stmt_ilan->get_result();

            if ($result_ilan->num_rows > 0) {
                // İlan bulundu, bilgileri al
                $row = $result_ilan->fetch_assoc();

                // İlan sahibinin e-posta adresini almak için sorgu yapın
                $ilan_sahibi_eposta = $row['eposta'];
    
                // E-posta adresinin doğruluğunu kontrol edin
                if (!$ilan_sahibi_eposta) {
                    echo '<div class="alert alert-danger text-center">İlan sahibinin e-posta adresi bulunamadı veya geçersiz.</div>';
                } else {
                    // PHPMailer ile e-posta gönderme
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
                        $mail->addAddress($ilan_sahibi_eposta); // Alıcı e-posta adresi
    
                        // Evet ve Hayır bağlantıları
                        $evet_link = 'http://localhost/site%C3%B6nplan1/cevap.php?id=' . $ilan_id . '&response=evet&eposta=' . urlencode($eposta);
                        $hayir_link = 'http://localhost/site%C3%B6nplan1/cevap.php?id=' . $ilan_id . '&response=hayir&eposta=' . urlencode($eposta);
                        
                        // İçerik
                        $mail->isHTML(true);
                        $mail->Subject = 'Yeni Rezervasyon Talebi';
                        $mail->Body = "
                        Merhaba,
                        Bir müşteri ilanınıza rezervasyon talebinde bulundu. Detaylar:
                        <br><br>
                        <strong>İsim ve Soyisim:</strong> $isim<br>
                        <strong>Telefon Numarası:</strong> $telefon<br>
                        <strong>E-posta Adresi:</strong> $eposta<br>
                        <strong>Ürünün Adı:</strong> $urun<br>
                        <strong>Ürünün Ağırlığı (kg):</strong> $agirlik<br>
                        <br>
                        İlan Bilgileri:
                        <br>
                        <strong>İlan Başlığı:</strong> " . $row["acıklama"] . "<br>
                        <strong>İlan Açıklaması:</strong> " . $row["tarih"] . "<br>
                        <strong>İlan Fiyatı:</strong> " . $row["fiyat"] . "<br>
                        <br>
                        Rezervasyon talebini onaylamak için lütfen aşağıdaki bağlantılardan birine tıklayın:<br>
                        <a href='$evet_link'>Evet</a> | <a href='$hayir_link'>Hayır</a>
                        ";
    
                        $mail->send();
                        echo '<div class="alert alert-success text-center">Rezervasyon talebi başarıyla gönderildi.</div>';
                    } catch (Exception $e) {
                        echo '<div class="alert alert-danger text-center">Rezervasyon talebi gönderilirken bir hata oluştu: ' . $mail->ErrorInfo . '</div>';
                    }
                }
            } else {
                echo '<div class="alert alert-danger text-center">İlan bulunamadı veya boş.</div>';
            }
        } else {
            echo '<div class="alert alert-danger text-center">İlan ID parametresi bulunamadı veya boş.</div>';
        }
    } else {
        echo "Hata: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervasyon Formu</title>
</head>
<body>
    <h2>Rezervasyon Formu</h2>
    <form action="formekranı.php?id=<?php echo $_GET['id']; ?>" method="post">
        <label for="isim">İsim ve Soyisim:</label><br>
        <input type="text" id="isim" name="isim" required><br><br>
        <label for="telefon">Telefon Numarası:</label><br>
        <input type="text" id="telefon" name="telefon" required><br><br>
        <label for="eposta">E-posta Adresi:</label><br>
        <input type="email" id="eposta" name="eposta" required><br><br>
        <label for="urun">Ürünün Adı:</label><br>
        <input type="text" id="urun" name="urun" required><br><br>
        <label for="agirlik">Ürünün Ağırlığı (kg):</label><br>
        <input type="number" step="1" id="agirlik" name="agirlik" required><br><br>
        <input type="submit" name="epostagonder" value="Gönder">
    </form>
</body>
</html>
