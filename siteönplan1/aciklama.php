<?php
include "baglan.php";

$aciklama = '';
$aciklama_hata = ''; // Açıklama hata değişkenini tanımla

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aciklama doğrulama
    if (isset($_POST["aciklama"])) { // $_POST["aciklama"] varsa işlemleri yap
        $aciklama = trim($_POST["aciklama"]);
        if (empty($aciklama)) {
            $aciklama_hata = "Lütfen açıklama giriniz.";
        } else {
            // Eğer açıklama girilmişse ve geçerliyse, fiyat.php sayfasına yönlendirme yapalım
            header("Location: fiyat.php");
            exit();
        }
    } else {
        $aciklama_hata = "Açıklama alanı boş bırakılamaz.";
    }
}
?>


<style>
        body {
            background-image: url(eerı.jpg);
        }

        .container {
            background-color: white;
            padding: 20px;
            box-sizing: border-box;
            width:500px;
            border-radius: 20px;
            border: 1px solid black;
            box-shadow: 1px 1px 2px 2px #3baf29;
            padding-left: 50px;
            margin-left: 50px;
            margin-top: 90px
        }

        .baslik{
            text-align:center;
            padding:20px;
            text-shadow: 2px 2px 4px #000000;
            color: #3baf29;
            font-size:35px;
            font-family: arial;
            font-weight: bold;
            padding-top: 30px;
            padding-bottom: 30px;
        }
        #devamButton{
            margin-top: 30px;
            background-color: #3baf29;
            border-radius: 10px;
            width: 80px;
            height: 35px;
            border: 2px solid green;
            color: white;
        }

        #devamButton:hover{
            background-color: white;
            color: black;
            border: 2px solid black;
        }

        #aciklama{
            width: 250px;
            height: 40px;
            margin-top: 20px;
            border-radius: 10px;
            border: 2px solid #3baf29;
            
        }
</style>

<!DOCTYPE html>
<html>
<head>
    <title>Açıklama Bilgileri</title>
</head>
<body>
    <div class="container">
    <h1 class="baslik">Açıklama Bilgileri</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="aciklama">Açıklama:</label><br>
            <textarea id="aciklama" name="aciklama"><?php echo $aciklama; ?></textarea>
            <span><?php echo $aciklama_hata; ?></span>
        </div>

        <input type="submit" value="Devam" id="devamButton">
    </form>
</body>
</html>
