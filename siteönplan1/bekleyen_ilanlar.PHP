<?php
include "navbar.php"; // Navbar içeren dosya
include "baglan.php"; // Veritabanı bağlantısını sağlayan dosya
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bekleyen İlanlar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body { background-color: rgb(235, 235, 235); }
        .card:hover { opacity: 0.8; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 shadow">
            <h3 class="text-center mb-4">Bekleyen İlanlar</h3>
            <?php
            // İlanları çekmek için sorgu
            $query = "SELECT id, kalkis_yeri, kalkis_ilçesi, varis_yeri, varis_ilçesi, tarih, durum FROM ilan";
            $result = mysqli_query($baglan, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='card mb-3'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>Kalkış Yeri: " . $row['kalkis_yeri'] . "</h5>";
                    echo "<p class='card-text'>Kalkış İlçesi: " . $row['kalkis_ilçesi'] . "</p>";
                    echo "<p class='card-text'>Varış Yeri: " . $row['varis_yeri'] . "</p>";
                    echo "<p class='card-text'>Varış İlçesi: " . $row['varis_ilçesi'] . "</p>";
                    echo "<p class='card-text'>Tarih: " . $row['tarih'] . "</p>";
                    echo "<p class='card-text'>Durum: " . $row['durum'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center'>Bekleyen ilan yok.</p>";
            }

            mysqli_close($baglan);
            ?>
        </div>
    </div>
</div>
</body>
</html>
