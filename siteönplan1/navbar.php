<?php session_start(); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Gönder Gelsin</title>
    <style>
        .navbar-brand {
            color: #3baf29;
            font-family: Cursive;
            font-weight: bold;
        }
        .btn-custom {
            text-decoration: none;
            color: #3baf29;
        }
        .navbar {
            border-bottom: 2px black solid;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="anasayfa.html">Gönder Gelsin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Anasayfa</a></li>
                <li class="nav-item"><a class="nav-link" href="hakkimizda.php">Hakkımızda</a></li>
                <li class="nav-item"><a class="nav-link" href="neden.php">Neden Gönder Gelsin</a></li>
                <li class="nav-item"><a class="nav-link" href="ortak.php">İş Ortaklarımız</a></li>
                <li class="nav-item"><a class="nav-link" href="iletisim.php">İletişim</a></li>
                <?php if (!isset($_SESSION["giris_bilgisi"]) || $_SESSION["giris_bilgisi"] !== true) { ?>
                    <li class="nav-item"><a class="nav-link" href="kayıt.php">Kayıt Ol</a></li>
                    <li class="nav-item"><a class="nav-link" href="kayıt.php">Giriş</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if (isset($_SESSION["giris_bilgisi"]) && $_SESSION["giris_bilgisi"] === true) { 
                        $id = $_SESSION["id_bilgisi"]; ?>
                        <img class="rounded-circle me-lg-2" src="img/avatars/<?php echo $id; ?>.jpg" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex"><?php echo $_SESSION["kullaniciadi_bilgisi"]; ?></span>
                    <?php } else { ?>
                        <img class="rounded-circle me-lg-2" src="img/user_empty.jpg" alt="" style="width: 40px; height: 40px;">
                    <?php } ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0" aria-labelledby="navbarDropdown">
                    <?php if (isset($_SESSION["giris_bilgisi"]) && $_SESSION["giris_bilgisi"] === true) { ?>
                        <li><a href="profil.php" class="dropdown-item">Profil</a></li>
                        <li><a href="cıkış.php" class="dropdown-item">Çıkış</a></li>
                        <li><a href="bilgi_getir.php" class="dropdown-item">yolculuklar</a></li>
                        <li><a class="navbar-brand text-primary bold d-flex justify-content-end mr-5" href="İLAN.php">🔍Bir yolculuk yayınla</a></li>
                    <?php } else { ?>
                        <li><a href="kayıt.php" class="dropdown-item">Giriş</a></li>
                        <li><a href="kayıt.php" class="dropdown-item">Kayıt Ol</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</nav>




</body>
</html>
