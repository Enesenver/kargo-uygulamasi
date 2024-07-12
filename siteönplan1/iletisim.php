<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    include "baglan.php";

    $name = $email = $message = "";
    $name_error = $email_error = $message_error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ad soyad kontrolü
        if(empty(trim($_POST["name"]))) {
            $name_error = "Lütfen adınızı ve soyadınızı giriniz.";
        } else {
            $name = trim($_POST["name"]);
        }

        // E-posta kontrolü
        if(empty(trim($_POST["email"]))) {
            $email_error = "Lütfen e-posta adresinizi giriniz.";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_error = "Geçersiz e-posta formatı.";
        } else {
            $email = trim($_POST["email"]);
        }

        // Mesaj kontrolü
        if(empty(trim($_POST["message"]))) {
            $message_error = "Lütfen mesajınızı giriniz.";
        } else {
            $message = trim($_POST["message"]);
        }

        // Eğer hata yoksa e-posta gönder
        if(empty($name_error) && empty($email_error) && empty($message_error)) {
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'eekinci871@gmail.com';
            $mail->Password = 'nfkg cllb npao jzdh';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = 0; // SMTP hata ayıklama seviyesi sıfır olarak ayarlandı.

            $mail->setFrom("eekinci871@gmail.com", "eekinci871@gmail.com");
            $mail->addAddress($email, $name);

            $mail->Subject = 'İletişim Formu';

            $mail->Body = "Ad Soyad: $name\nE-posta: $email\nMesaj: $message";

            if($mail->send()) {
                echo '<div class="alert alert-success text-center">Mesajınız başarıyla gönderildi. Teşekkür ederiz!</div>';
            } else {
                echo '<div class="alert alert-danger text-center">Mesajınız gönderilirken bir hata oluştu. Lütfen daha sonra tekrar deneyiniz.</div>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container mt-5">
    <h1>İletişim</h1>
    <hr>
    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Ad Soyad</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
            <span class="text-danger"><?php echo $name_error; ?></span>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Adresi</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            <span class="text-danger"><?php echo $email_error; ?></span>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mesajınız</label>
            <textarea class="form-control" id="message" name="message" rows="4" required><?php echo $message; ?></textarea>
            <span class="text-danger"><?php echo $message_error; ?></span>
        </div>
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/


</body>
</html>
