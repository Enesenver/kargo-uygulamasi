
<?php

include "navbar.php";

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlan Sonuçları</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .filter-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }
        .filter-section h5 {
            margin-bottom: 20px;
        }
        .filter-section .form-check {
            margin-bottom: 10px;
        }
        .filter-section .form-check-label {
            margin-left: 10px;
        }


        body{
    background-color: rgb(235, 235, 235);
}

.col:hover{
   opacity: 0.6; 
}

.bg-custom-1 {
    background-color: #85144b;
  }
  
  .bg-custom-2 {
  background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
  }
    </style>
</head>
<body>








<div class="container mt-5">
    <div class="row">
        <!-- Filtreler -->
        <div class="col-md-3">
            <div class="filter-section">
                <h5>Sırala</h5>
                <button type="button" class="btn btn-link p-0 mb-2">Tümünü temizle</button>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" id="earlyDeparture" value="earlyDeparture">
                    <label class="form-check-label" for="earlyDeparture">
                        <img src="icon1.svg" alt="Erken Kalkış Saati" class="mr-1"> En erken kalkış saati
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" id="lowestPrice" value="lowestPrice">
                    <label class="form-check-label" for="lowestPrice">
                        <img src="icon2.svg" alt="Düşük Fiyat" class="mr-1"> En düşük fiyat
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" id="closeToDeparture" value="closeToDeparture">
                    <label class="form-check-label" for="closeToDeparture">
                        <img src="icon3.svg" alt="Kalkış Yerine Yakın" class="mr-1"> Kalkış yerine yakın
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" id="closeToArrival" value="closeToArrival">
                    <label class="form-check-label" for="closeToArrival">
                        <img src="icon4.svg" alt="Varış Yerine Yakın" class="mr-1"> Varış yerine yakın
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" id="shortestTrip" value="shortestTrip">
                    <label class="form-check-label" for="shortestTrip">
                        <img src="icon5.svg" alt="Kısa Yolculuk" class="mr-1"> En kısa yolculuk
                    </label>
                </div>
<hr>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" id="shortestTrip" value="shortestTrip">
                    <label class="form-check-label" for="shortestTrip">
                        <p> En kısa yolculuk</p>
                    </label>
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" id="shortestTrip" value="shortestTrip">
                    <label class="form-check-label" for="shortestTrip">
                    <p> En kısa yolculuk</p>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" id="shortestTrip" value="shortestTrip">
                    <label class="form-check-label" for="shortestTrip">
                    <p> En kısa yolculuk</p>

                    </label>
                </div>

            </div>
        </div>
        <!-- İlan Sonuçları -->
        <div class="col-md-9 shadow">
            <?php
            // Veritabanı bağlantısını sağlayan dosyayı dahil ediyoruz
            include "baglan.php";

            // Veritabanından ilanları çekmek için SQL sorgusunu hazırlıyoruz
            $query = "SELECT * FROM `ilan` 
                      WHERE `kalkis_yeri`=? AND `kalkis_ilçesi`=? AND `varis_yeri`=? AND `varis_ilçesi`=?";

            // Sorguyu hazırlıyoruz
            if ($stmt = mysqli_prepare($baglan, $query)) {
                // Parametreleri bağlıyoruz
                mysqli_stmt_bind_param($stmt, "ssss", $_POST["kalkis_il"], $_POST["kalkis_ilce"], $_POST["varis_il"], $_POST["varis_ilce"]);
                // Sorguyu çalıştırıyoruz
                mysqli_stmt_execute($stmt);
                // Sonuçları alıyoruz
                $result = mysqli_stmt_get_result($stmt);

                // Eğer sonuç varsa
                if (mysqli_num_rows($result) > 0) {
                    $i = 0; // Modal ID'ler için bir sayaç
                    // Verileri döngü ile al ve ekrana bastır
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                        $modalId = "modal" . $i;
                        echo "<div class='card mb-3'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>İlan Detayları</h5>";
                        echo "<p class='card-text'>Kalkış Yeri: " . $row["kalkis_yeri"] . "</p>";
                        echo "<p class='card-text'>Varış Yeri: " . $row["varis_yeri"] . "</p>";
                        echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#$modalId'>Detayları Gör</button>";
                        echo "</div>";
                        echo "</div>";

                        // Modal
                        echo "<div class='modal fade' id='$modalId' tabindex='-1' role='dialog' aria-labelledby='{$modalId}Label' aria-hidden='true'>";
                        echo "<div class='modal-dialog' role='document'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h5 class='modal-title' id='{$modalId}Label'>İlan Detayları</h5>";
                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                        echo "<div class='modal-body'>";
                        echo "<p class='card-text'>Kalkış Yeri: " . $row["kalkis_yeri"] . "</p>";
                        echo "<p class='card-text'>Kalkış İlçesi: " . $row["kalkis_ilçesi"] . "</p>";
                        echo "<p class='card-text'>Varış Yeri: " . $row["varis_yeri"] . "</p>";
                        echo "<p class='card-text'>Varış İlçesi: " . $row["varis_ilçesi"] . "</p>";
                        echo "<p class='card-text'>Kilo: " . $row["kilo"] . "</p>";
                        echo "<p class='card-text'>eposta: " . $row["eposta"] . "</p>";
                        echo "<p class='card-text'>Tarih: " . $row["tarih"] . "</p>";
                        echo "<p class='card-text'>Fiyat: " . $row["fiyat"] . "</p>";
                        echo "<p class='card-text'>Açıklama: " . $row["acıklama"] . "</p>";
                        
                        echo "<form action='send_email.php' method='post'>";
                        echo "<input type='hidden' name='ilan_id' value='" . $row["id"] . "'>";
                        echo '<a href="formekranı.php?id=' . $row['id'] . '" class="btn btn-sm btn-warning">REZERVASYON YAP</a>';

;

                        echo "</form>";
                        echo "</div>";
                        echo "<div class='modal-footer'>";
                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Kapat</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    // Sonuç yoksa uygun bir mesaj göster
                    echo "<p class='text-center'>Sonuç bulunamadı.</p>";
                }

                // Sorguyu kapat
                mysqli_stmt_close($stmt);
            } else {
                // Sorguda bir hata varsa, hata mesajını göster
                echo "<p class='text-center'>Sorguda bir hata oluştu: " . mysqli_error($baglan) . "</p>";
            }

            // Veritabanı bağlantısını kapat
            mysqli_close($baglan);
            ?>
        </div>
    </div>
</div>






</body>
</html>
