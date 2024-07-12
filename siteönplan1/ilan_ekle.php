<?php


include "baglan.php";

// Formdan veri alınması ve veritabanına ekleme işlemi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kalkis_yeri = $_POST["kalkis_yeri"];
    $varis_yeri = $_POST["varis_yeri"];
    $ilan_aciklama = $_POST["ilan_aciklama"];
    $fiyat = $_POST["fiyat"];
    $tarih = $_POST["tarih"];
    $yolculuk_suresi = $_POST["yolculuk_suresi"];
    $kilo = $_POST["kilo"];

    // Veritabanına ekleme sorgusu
    $sql = "INSERT INTO ilanlar (kalkis_yeri, varis_yeri, ilan_aciklama, fiyat, tarih, yolculuk_suresi, kilo, eposta)
            VALUES ('$kalkis_yeri', '$varis_yeri', '$ilan_aciklama', '$fiyat', '$tarih', '$yolculuk_suresi', '$kilo', '$eposta')";

    if ($conn->query($sql) === TRUE) {
        echo "İlan başarıyla eklendi.";
    } else {
        echo "İlan eklenirken hata oluştu: " . $conn->error;
    }
}

// Veritabanı bağlantısını kapat
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlan Ekle</title>
</head>
<body>
    <h1>İlan Ekle</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <label for="kalkis_yeri">Kalkış Yeri:</label><br>
        <input type="text" id="kalkis_yeri" name="kalkis_yeri" required><br><br>

        <label for="varis_yeri">Varış Yeri:</label><br>
        <input type="text" id="varis_yeri" name="varis_yeri" required><br><br>

        <label for="ilan_aciklama">İlan Açıklaması:</label><br>
        <textarea id="ilan_aciklama" name="ilan_aciklama" rows="5" required></textarea><br><br>

        <label for="fiyat">Fiyat:</label><br>
        <input type="number" id="fiyat" name="fiyat" required><br><br>

        <label for="tarih">Tarih:</label><br>
        <input type="date" id="tarih" name="tarih" required><br><br>

        <label for="yolculuk_suresi">Yolculuk Süresi (saat):</label><br>
        <input type="number" id="yolculuk_suresi" name="yolculuk_suresi" required><br><br>

        <label for="kilo">Kilo:</label><br>
        <input type="number" id="kilo" name="kilo" required><br><br>

        <label for="kilo">eposta:</label><br>
        <input type="number" id="eposta" name="eposta" required><br><br>

        <input type="submit" value="İlanı Kaydet">
    </form>
</body>
</html>
