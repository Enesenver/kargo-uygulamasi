<?php

function session_bilgi(){
    if (isset($_SESSION["giris_bilgisi"]) && $_SESSION["giris_bilgisi"]){
        return True;
    }else{
        return False;
    }
}

function bilgi_getir($id){

    include "baglan.php";

    $sorgu= "SELECT * FROM `kullanici_bilgileri` WHERE `id`='$id'";

    $sonuc = mysqli_query($baglan, $sorgu);

    mysqli_close($baglan);

    return $sonuc;


    

}

function bilgi_guncelle($ad, $soyad, $email, $adres, $ilce, $il) {
    include("baglan.php");

    $id = $_SESSION["id_bilgisi"];
    
    $sorgu = "UPDATE kullanici_bilgileri SET adi='$ad', soyadi='$soyad', eposta='$email', adres='$adres', ilce='$ilce', il='$il' WHERE id='$id'";

    if (mysqli_query($baglan, $sorgu)) {
        mysqli_close($baglan);
        return true;
    } else {
        echo "Error updating record: " . mysqli_error($baglan);
        mysqli_close($baglan);
        return false;
    }
}




    
function kullaniciadi_kontrol($kullaniciadi){

    include("baglan.php");

    $kullaniciadi_hata = "";

    if(empty(trim($kullaniciadi))){
        $kullaniciadi_hata = "Lütfen kullanıcı adı giriniz.";
        
    } elseif (strlen(trim($kullaniciadi))<4 or strlen(trim($kullaniciadi))>12){
        $kullaniciadi_hata = "Kullanıcı adı 4-12 karakter arasında olmalıdır.";
        
    } elseif(!preg_match('/^[a-z\d_]+$/i', trim($kullaniciadi))){
        $kullaniciadi_hata = "Kullanıcı adı sadece harf, sayı ve alt çizgi içerebilir, boşluk içermemelidir.";
        
    } else {
        $sorgu = "SELECT `kullaniciadi` FROM `kullanici_bilgileri` WHERE kullaniciadi= ?";
            
        if($stmt = mysqli_prepare($baglan, $sorgu)){
                
            $kullaniciadi = trim($kullaniciadi);

            mysqli_stmt_bind_param($stmt, "s", $kullaniciadi);
                
            if(mysqli_stmt_execute($stmt)){
                    
                mysqli_stmt_store_result($stmt);
                    
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $kullaniciadi_hata = "Bu kullanıcı adı önceden alınmış.";
                } else{
                        $kullaniciadi = trim($kullaniciadi);
                    }
            } else{
                echo "Hata! Bir şeyler ters gitti. Lütfen daha sonra tekrar deneyiniz.";
            }
            
            mysqli_stmt_close($stmt);
        }
    }

    return $kullaniciadi_hata;


}

function kullaniciadi_guncelle($kullaniciadi) {
    include "baglan.php";
    $id = $_SESSION["id_bilgisi"];
    $sorgu= "UPDATE `kullanici_bilgileri` SET `kullaniciadi`='$kullaniciadi' WHERE `id`='$id'";

    $sonuc = mysqli_query($baglan, $sorgu);
    
    mysqli_close($baglan);

    return $kullaniciadi;
}

    
    
    
    
    
    //     $sonuc = mysqli_query($baglanti, $sorgu);
    
    //     return $sonuc;









function sifre_guncelle($yeni_sifre){

    include("baglan.php");

    $yeni_gizli_sifre = password_hash($yeni_sifre, PASSWORD_DEFAULT);

    $id=$_SESSION["id_bilgisi"];
    
    $sorgu= "UPDATE `kullanici_bilgileri` SET `sifre`='$yeni_gizli_sifre' WHERE `id`='$id'";

    $sonuc = mysqli_query($baglan, $sorgu);
    
    mysqli_close($baglan);

    return $yeni_gizli_sifre;
}


function avatar_yukle($foto,$id){

    $dosyaadi=$id.".jpg";
    $dosyatempadi=$_FILES["foto"]["tmp_name"];
    $yol="img/avatars/";

    move_uploaded_file($dosyatempadi,$yol.$dosyaadi);
}


































?>