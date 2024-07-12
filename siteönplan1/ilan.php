
<?php
include "bilgi_getir.php";
$result = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="box">';
                echo "<p>ID: " . $row["id"] . "</p>";
                echo "<p>Kalkış Yeri: " . $row["kalkis_yeri"] . "</p>";
                echo "<p>Kalkış İlçesi: " . $row["kalkis_ilçesi"] . "</p>";
                echo "<p>Varış Yeri: " . $row["varis_yeri"] . "</p>";
                echo "<p>Varış İlçesi: " . $row["varis_ilçesi"] . "</p>";
                echo "<p>Kilo: " . $row["kilo"] . "</p>";
                echo "<p>Ürün Sayısı: " . $row["urun_sayisi"] . "</p>";
                echo "<p>tarih: " . $row["tarih"] . "</p>";
                echo "<p>Fiyat: " . $row["fiyat"] . "</p>";
                echo "<p>Açıklama: " . $row["acıklama"] . "</p>";
                echo '</div>';
            }
        } else {
            echo "Herhangi bir sonuç bulunamadı!";
        }

        ?>