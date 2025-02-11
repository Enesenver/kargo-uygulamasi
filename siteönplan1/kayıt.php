<?php
session_start();
include "baglan.php";

$kullaniciadi = $sifre = "";
$kullaniciadi_hata = $sifre_hata = $giris_hata = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Kullanıcı Adı Kontrolü
    if(empty(trim($_POST["kullaniciadi"]))){
        $kullaniciadi_hata = "Lütfen kullanıcı adı giriniz.";
    } else {
        $kullaniciadi = trim($_POST["kullaniciadi"]);
    }

    // Şifre Kontrolü
    if(empty(trim($_POST["sifre"]))) {
        $sifre_hata = "Lütfen şifre giriniz.";
    } else {
        $sifre = trim($_POST["sifre"]);
    }

    // Kullanıcı Kontrolü
    if(empty($kullaniciadi_hata) && empty($sifre_hata)) {
        
        $kontrol = "SELECT id, kullaniciadi, sifre FROM kullanici_bilgileri WHERE kullaniciadi = ?";

        if($stmt = mysqli_prepare($baglan, $kontrol)) {
            
            mysqli_stmt_bind_param($stmt, "s", $kullaniciadi);

            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $kullaniciadi, $gizli_sifre);
                    if(mysqli_stmt_fetch($stmt)) {
                        if(password_verify($sifre, $gizli_sifre)) {
                            $_SESSION["giris_bilgisi"] = true;
                            $_SESSION["id_bilgisi"] = $id;
                            $_SESSION["kullaniciadi_bilgisi"] = $kullaniciadi;
                            header("location: bilgi_getir.php"); 
                        } else {
                            $giris_hata = "Yanlış şifre girdiniz.";
                        }
                    } 
                } else {
                    $giris_hata = "Girdiğiniz kullanıcı adı mevcut değil!";
                }
            } else {
                $giris_hata = "Bilinmeyen bir hata oluştu.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($baglan);

}

?>


<?php
include "baglan.php";
$kullaniciadi = $eposta = $sifre = $sifre_onay = "";
$kullaniciadi_hata = $eposta_hata = $sifre_hata = $sifre_onay_hata = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Kullanıcı Adı Kontrolü
    $kullaniciadi = trim($_POST["kullaniciadi"]);
    if (empty($kullaniciadi)) {
        $kullaniciadi_hata = "Lütfen kullanıcı adı giriniz.";
    } elseif (strlen($kullaniciadi) < 4 or strlen($kullaniciadi) > 12) {
        $kullaniciadi_hata = "Kullanıcı adı 4-12 karakter arasında olmalıdır.";
    } elseif (!preg_match('/^[a-z\d_]+$/i', trim($kullaniciadi))) {
        $kullaniciadi_hata = "Kullanıcı adı sadece harf, sayı ve alt çizgi içerebilir, boşluk içermemelidir.";
    }

    // E-Posta Kontrolü
    $eposta = trim($_POST["eposta"]);

    if (empty($eposta)) {
        $eposta_hata = "Lütfen E-posta giriniz.";
    } elseif (!filter_var($eposta, FILTER_VALIDATE_EMAIL)) {
        $eposta_hata = "Hatalı E-posta adresi girdiniz.";
    }

    // Şifre Kontrolü
    $sifre = trim($_POST["sifre"]);

    if (empty($sifre)) {
        $sifre_hata = "Lütfen şifre giriniz.";
    } elseif (strlen($_POST["sifre"]) < 6) {
        $sifre_hata = "Şifre en az 6 karakter olmalıdır.";
    }

    // Şifre Onay Kontrolü
    $sifre_onay = trim($_POST["sifre_onay"]);

    if (empty($sifre_onay)) {
        $sifre_onay_hata = "Şifrenizi tekrar girmelisiniz.";
    } else {
        if (empty($sifre_hata) and ($sifre != $sifre_onay)) {
            $sifre_onay_hata = "Şifreler eşleşmiyor. Lütfen kontrol ediniz.";
        }
    }


    // Veritabanı Kullanıcı kaydı
    if (empty($kullaniciadi_hata) && empty($eposta_hata) && empty($sifre_hata)) {

        // Kullanıcı adının veritabanında kontrolü için sorgu
        $check_username_sql = "SELECT * FROM kullanici_bilgileri WHERE kullaniciadi=?";
        if ($stmt_check_username = mysqli_prepare($baglan, $check_username_sql)) {
            mysqli_stmt_bind_param($stmt_check_username, "s", $kullaniciadi);
            mysqli_stmt_execute($stmt_check_username);
            mysqli_stmt_store_result($stmt_check_username);
            
            if (mysqli_stmt_num_rows($stmt_check_username) > 0) {
                echo "Bu kullanıcı adı zaten kullanılıyor.";
                mysqli_stmt_close($stmt_check_username);
                exit(); // Scriptin devamını engelle
            }
            mysqli_stmt_close($stmt_check_username);
        }
    
        // Kullanıcı adı veritabanında yoksa, kullanıcıyı kaydet
        $ekle = "INSERT INTO kullanici_bilgileri (kullaniciadi, eposta, sifre) VALUES (?,?,?)";
        if ($stmt = mysqli_prepare($baglan, $ekle)) {
            $gizli_sifre = password_hash($sifre, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sss", $kullaniciadi, $eposta, $gizli_sifre);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                header("location: kayıt.php"); // Kullanıcıyı giriş sayfasına yönlendir
                echo "Hoş geldiniz, " . $_SESSION['kullanici_adi'];
                exit();
                
            // Scriptin devamını engelle
            } else {
                echo mysqli_error($baglan);
                echo "Hata! Kullanıcı kaydı oluşturulamadı.";
            }
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up & Sign In</title>
<link rel="stylesheet" href="styles.css">
</head>
<body img src="ee.jpg">
<div class="container right-panel-active">
    <!-- Sign Up -->
    <div class="container__form container--signup">
        <form action=" " class="form" method="POST">
            <h2 class="form__title">Sign Up</h2>
            <input type="text" placeholder="User" class="input" name="kullaniciadi" />
            <?php if(!empty($kullaniciadi_hata)) { ?>
                <span class="error"><?php echo $kullaniciadi_hata; ?></span>
            <?php } ?>
            <input type="email" placeholder="Email" class="input" name="eposta" />
            <?php if(!empty($eposta_hata)) { ?>
                <span class="error"><?php echo $eposta_hata; ?></span>
            <?php } ?>
            <input type="password" placeholder="Password" class="input" name="sifre" />
            <?php if(!empty($sifre_hata)) { ?>
                <span class="error"><?php echo $sifre_hata; ?></span>
            <?php } ?>
            <input type="password" placeholder="Confirm Password" class="input" name="sifre_onay" />
            <?php if(!empty($sifre_onay_hata)) { ?>
                <span class="error"><?php echo $sifre_onay_hata; ?></span>
            <?php } ?>
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>

    <!-- Sign In -->
    <div class="container__form container--signin">
        
        <form action="#" class="form" method="POST">
            <h2 class="form__title">Sign In</h2>
            <input type="text" placeholder="User" class="input" name="kullaniciadi" />
            <?php if(!empty($kullaniciadi_hata)) { ?>
                <span class="error"><?php echo $kullaniciadi_hata; ?></span>
            <?php } ?>
            <input type="password" placeholder="Password" class="input" name="sifre" />
            <?php if(!empty($sifre_hata)) { ?>
                <span class="error"><?php echo $sifre_hata; ?></span>
            <?php } ?>
            <?php if(!empty($giris_hata)) { ?>
                <span class="error"><?php echo $giris_hata; ?></span>
            <?php } ?>
            <button type="submit" class="btn">Sign In</button>
                                           
            

            
        </form>
        
    </div>

    <!-- Overlay -->
    <div class="container__overlay">
        <div class="overlay">
            <div class="overlay__panel overlay--left">
                <button class="btn" id="signIn">Sign In</button>
            </div>
            <div class="overlay__panel overlay--right">
                <button class="btn" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>