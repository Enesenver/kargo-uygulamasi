<?php
include "baglan.php";

$kalkis_yeri_hata = $kalkis_ilçesi_hata = $varis_yeri_hata = $varis_ilçesi_hata = $kilo_hata = $eposta_hata = $tarih_hata = $fiyat_hata = $acıklama_hata = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kalkış Yeri doğrulama
    $kalkis_yeri = trim($_POST["kalkis_il"]);
    if (empty($kalkis_yeri)) {
        $kalkis_yeri_hata = "Lütfen kalkış yeri giriniz.";
    }

    $kalkis_ilçesi = trim($_POST["kalkis_ilce"]);
    if (empty($kalkis_ilçesi)) {
        $kalkis_ilçesi_hata = "Lütfen kalkış ilçesi giriniz.";
    }

    // Varış Yeri doğrulama
    $varis_yeri = trim($_POST["varis_il"]);
    if (empty($varis_yeri)) {
        $varis_yeri_hata = "Lütfen varış yeri giriniz.";
    }
    
    $varis_ilçesi = trim($_POST["varis_ilce"]);
    if (empty($varis_ilçesi)) {
        $varis_ilçesi_hata = "Lütfen varış ilçesi giriniz.";
    }

    // Miktar doğrulama
    $kilo = trim($_POST["kilo"]);
    if (empty($kilo)) {
        $kilo_hata = "Lütfen miktarı giriniz.";
    }

    // E-posta doğrulama
    $eposta = trim($_POST["eposta"]);
    if (empty($eposta)) {
        $eposta_hata = "Lütfen E-posta giriniz.";
    } elseif (!filter_var($eposta, FILTER_VALIDATE_EMAIL)) {
        $eposta_hata = "Hatalı E-posta adresi girdiniz.";
    }

    // Tarih doğrulama
    $tarih = trim($_POST["tarih"]);
    if (empty($tarih)) {
        $tarih_hata = "Lütfen tarih giriniz.";
    }

    // Fiyat doğrulama
    $fiyat = trim($_POST["fiyat"]);
    if (empty($fiyat)) {
        $fiyat_hata = "Lütfen fiyat giriniz.";
    }

    // Açıklama doğrulama
    $acıklama = trim($_POST["acıklama"]);
    if (empty($acıklama)) {
        $acıklama_hata = "Lütfen açıklama sayısını giriniz.";
    }

    // Tüm alanlar doğrulandıysa ve hata yoksa veritabanına ekleme işlemi yapılır
    if (empty($kalkis_yeri_hata) && empty($kalkis_ilçesi_hata) && empty($varis_yeri_hata) && empty($varis_ilçesi_hata) && empty($kilo_hata) && empty($eposta_hata) && empty($tarih_hata) && empty($fiyat_hata) && empty($acıklama_hata)) {
        $ekle = "INSERT INTO `ilan`(`kalkis_yeri`, `kalkis_ilçesi`, `varis_yeri`, `varis_ilçesi`, `kilo`, `eposta`, `tarih`, `fiyat`, `acıklama`) VALUES (?,?,?,?,?,?,?,?,?)";
        
        if ($stmt = mysqli_prepare($baglan, $ekle)) {
            mysqli_stmt_bind_param($stmt, "sssssssss", $kalkis_yeri, $kalkis_ilçesi, $varis_yeri, $varis_ilçesi, $kilo, $eposta, $tarih, $fiyat, $acıklama);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($baglan);
                echo '<div class="alert alert-success text-center">'."İlanınız başarıyla eklendi.".'</div>';
                header("İLAN.php"); // 3 saniye sonra İLAN.php sayfasına yönlendirme
                exit; // işlem tamamlandı, betik sonlandırılır
            } else {
                echo "Hata! İlan kaydı oluşturulamadı: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Hata! SQL sorgusu hazırlanamadı: " . mysqli_error($baglan);
        }
    }
}

mysqli_close($baglan);
?>




<!DOCTYPE html>
<html>
<head>
    <title>İlan Verme Formu</title>
</head>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlan Verme Formu</title>
    <style>
        .container {
            max-width: 1000px;
            margin: auto;
            background-color: white;
            border-radius: 20px;
            height: 950px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            

            
                }
        .form-group {
            text-align: center;
            padding:10px;
            
        }
        .invalid-feedback {
            
        }
        .baslik{
            text-align:center;
            padding:20px;
            text-shadow: 2px 2px 4px #000000;
            color: white;
            font-size:35px;

        }
        .form-control{
            height: 45px;
            width: 350px;
            border-radius:10px;
            background-color: white;
            border-color: grey;
            border: 2px solid;
        
            
        }

        .form-group-buton{
            margin-top: 20px;
            margin-left: 470px;
            
        }
        .logo{
            text-decoration: none;
            color: white;
            font-size: 20px;

        }
        
        
    </style>
</head>
<body style="background-image: url(eerı.jpg)">
<a class="logo" href="bilgi_getir.php">
    Gönder Gelsin
  </a>
    <div class="container shadow">
        <h2 class="baslik">İlan Ver Gönder Gelsin</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="kalkis_il" class="form-label">Kalkış İli</label>
                <br>
                <select class="form-control" id="kalkis_il" name="kalkis_il" placeholder="kalkis_il" value="<?php echo isset($_POST['kalkis_il']) ? $_POST['kalkis_il'] : ''; ?>">>
                    <span class="invalid-feedback"><?php echo $kalkis_il_hata; ?></span>
                    <option value="">İl Seçin</option>
                    <?php
                    // İlleri dizi olarak tanımlayalım
                    $iller = array(
                        "Adana" => array(
                            "Aladağ", "Ceyhan", "Çukurova", "Feke", "İmamoğlu", "Karaisalı",
                            "Karataş", "Kozan", "Pozantı", "Saimbeyli", "Sarıçam", "Seyhan",
                            "Tufanbeyli", "Yumurtalık", "Yüreğir"
                        ),
                        "Adıyaman" => array(
                            "Besni", "Çelikhan", "Gerger", "Gölbaşı", "Kahta", "Merkez",
                            "Samsat", "Sincik", "Tut"
                        ),
                        "Afyonkarahisar" => array(
                            "Başmakçı", "Bayat", "Bolvadin", "Çay", "Çobanlar", "Dazkırı",
                            "Dinar", "Emirdağ", "Evciler", "Hocalar", "İhsaniye", "İscehisar",
                            "Kızılören", "Merkez", "Sandıklı", "Sinanpaşa", "Sultandağı", "Şuhut"
                        ),
                        "Ağrı" => array(
                            "Diyadin", "Doğubayazıt", "Eleşkirt", "Hamur", "Merkez",
                            "Patnos", "Taşlıçay", "Tut"
                        ),
                        "Aksaray" => array(
                            "Ağaçören", "Eskil", "Gülağaç", "Güzelyurt", "Merkez",
                            "Ortaköy", "Sarıyahşi", "Sultanhanı"
                        ),
                        "Amasya" => array(
                            "Göynücek", "Gümüşhacıköy", "Hamamözü", "Merkez", "Merzifon",
                            "Suluova", "Taşova"
                        ),
                        "Ankara" => array(
                            "Akyurt", "Altındağ", "Ayaş", "Balâ", "Beypazarı", "Çamlıdere",
                            "Çankaya", "Çubuk", "Elmadağ", "Etimesgut", "Evren", "Gölbaşı",
                            "Güdül", "Haymana", "Kalecik", "Kahramankazan", "Keçiören",
                            "Kızılcahamam", "Mamak", "Nallıhan", "Polatlı", "Pursaklar",
                            "Sincan", "Şereflikoçhisar", "Yenimahalle"
                        ),
                        "Antalya" => array(
                            "Akseki", "Aksu", "Alanya", "Demre", "Döşemealtı", "Elmalı",
                            "Finike", "Gazipaşa", "Gündoğmuş", "İbradı", "Kaş", "Kemer",
                            "Kepez", "Konyaaltı", "Korkuteli", "Kumluca", "Manavgat",
                            "Muratpaşa", "Serik"
                        ),
                        "Ardahan" => array(
                            "Çıldır", "Damal", "Göle", "Hanak", "Merkez", "Posof"
                        ),
                        "Artvin" => array(
                            "Ardanuç", "Arhavi", "Borçka", "Hopa", "Kemalpaşa", "Merkez",
                            "Murgul", "Şavşat", "Yusufeli"
                        ),
                        "Aydın" => array(
                            "Bozdoğan", "Buharkent", "Çine", "Didim", "Efeler", "Germencik",
                            "İncirliova", "Karacasu", "Karpuzlu", "Koçarlı", "Köşk",
                            "Kuşadası", "Kuyucak", "Nazilli", "Söke", "Sultanhisar",
                            "Yenipazar"
                        ),
                        "Balıkesir" => array(
                            "Altıeylül", "Ayvalık", "Balya", "Bandırma", "Bigadiç", "Burhaniye",
                            "Dursunbey", "Edremit", "Erdek", "Gömeç", "Gönen", "Havran",
                            "İvrindi", "Karesi", "Kepsut", "Manyas", "Marmara", "Savaştepe",
                            "Sındırgı", "Susurluk"
                        ),
                        "Bartın" => array(
                            "Amasra", "Kurucaşile", "Merkez", "Ulus"
                        ),
                        "Batman" => array(
                            "Beşiri", "Gercüş", "Hasankeyf", "Kozluk", "Merkez", "Sason"
                        ),
                        "Bayburt" => array(
                            "Aydıntepe", "Demirözü", "Merkez"
                        ),
                        "Bilecik" => array(
                            "Bozüyük", "Gölpazarı", "İnhisar", "Merkez", "Osmaneli",
                            "Pazaryeri", "Söğüt", "Yenipazar"
                        ),
                        "Bingöl" => array(
                            "Adaklı", "Genç", "Karlıova", "Kiğı", "Merkez", "Solhan", "Yayladere", "Yedisu"
                        ),
                        "Bitlis" => array(
                            "Adilcevaz", "Ahlat", "Güroymak", "Hizan", "Merkez", "Mutki",
                            "Tatvan"
                        ),
                        "Bolu" => array(
                            "Dörtdivan", "Gerede", "Göynük", "Kıbrıscık", "Mengen", "Merkez",
                            "Mudurnu", "Seben", "Yeniçağa"
                        ),
                        "Burdur" => array(
                            "Ağlasun", "Altınyayla", "Bucak", "Çavdır", "Çeltikçi", "Gölhisar",
                            "Karamanlı", "Kemer", "Merkez", "Tefenni", "Yeşilova"
                        ),
                        "Bursa" => array( "Büyükorhan", "Gemlik", "Gürsu", "Harmancık", "İnegöl", "İznik",
                        "Karacabey", "Keles", "Kestel", "Mudanya", "Mustafakemalpaşa",
                        "Nilüfer", "Orhaneli", "Orhangazi", "Osmangazi", "Yenişehir",
                        "Yıldırım"),
                        "Çanakkale" => array(
                            "Ayvacık", "Bayramiç", "Biga", "Bozcaada", "Çan", "Eceabat",
                            "Ezine", "Gelibolu", "Gökçeada", "Lapseki", "Merkez", "Yenice"
                        ),
                        "Çankırı" => array(
                            "Atkaracalar", "Bayramören", "Çerkeş", "Eldivan", "Ilgaz",
                            "Kızılırmak", "Korgun", "Kurşunlu", "Merkez", "Orta", "Şabanözü",
                            "Yapraklı"
                        ),
                        "Çorum" => array(
                            "Alaca", "Bayat", "Boğazkale", "Dodurga", "İskilip", "Kargı",
                            "Laçin", "Mecitözü", "Merkez", "Oğuzlar", "Ortaköy", "Osmancık",
                            "Sungurlu", "Uğurludağ"
                        ),
                        "Denizli" => array(
                            "Acıpayam", "Akköy", "Babadağ", "Baklan", "Bekilli", "Beyağaç",
                            "Bozkurt", "Buldan", "Çal", "Çameli", "Çardak", "Çivril", "Güney",
                            "Honaz", "Kale", "Merkez", "Pamukkale", "Sarayköy", "Serinhisar",
                            "Tavas"
                        ),
                        "Diyarbakır" => array(
                            "Bağlar", "Bismil", "Çermik", "Çınar", "Çüngüş", "Dicle", "Eğil",
                            "Ergani", "Hani", "Hazro", "Kocaköy", "Kulp", "Lice", "Merkez",
                            "Silvan", "Sur", "Yenişehir"
                        ),
                        "Düzce" => array(
                            "Akçakoca", "Cumayeri", "Çilimli", "Gölyaka", "Gümüşova",
                            "Kaynaşlı", "Merkez", "Yığılca"
                        ),
                        "Edirne" => array(
                            "Enez", "Havsa", "İpsala", "Keşan", "Lalapaşa", "Meriç",
                            "Merkez", "Süloğlu", "Uzunköprü"
                        ),
                        "Elazığ" => array(
                            "Ağın", "Alacakaya", "Arıcak", "Baskil", "Karakoçan",
                            "Keban", "Kovancılar", "Maden", "Merkez", "Palu", "Sivrice"
                        ),
                        "Erzincan" => array(
                            "Çayırlı", "İliç", "Kemah", "Kemaliye", "Merkez", "Otlukbeli",
                            "Refahiye", "Tercan", "Üzümlü"
                        ),
                        "Erzurum" => array(
                            "Aşkale", "Aziziye", "Çat", "Hınıs", "Horasan", "İspir",
                            "Karaçoban", "Karayazı", "Köprüköy", "Narman", "Oltu",
                            "Olur", "Palandöken", "Pasinler", "Pazaryolu", "Şenkaya",
                            "Tekman", "Tortum", "Uzundere", "Yakutiye"
                        ),
                        "Eskişehir" => array(
                            "Alpu", "Beylikova", "Çifteler", "Günyüzü", "Han", "İnönü",
                            "Mahmudiye", "Mihalgazi", "Mihalıççık", "Odunpazarı",
                            "Sarıcakaya", "Seyitgazi", "Sivrihisar", "Tepebaşı"
                        ),
                        "Gaziantep" => array(
                            "Araban", "İslahiye", "Karkamış", "Nizip", "Nurdağı",
                            "Oğuzeli", "Şahinbey", "Şehitkamil", "Yavuzeli"
                        ),
                        "Giresun" => array(
                            "Alucra", "Bulancak", "Çamoluk", "Çanakçı", "Dereli", "Doğankent",
                            "Espiye", "Eynesil", "Görele", "Güce", "Keşap", "Merkez",
                            "Piraziz", "Şebinkarahisar", "Tirebolu", "Yağlıdere"
                        ),
                        "Gümüşhane" => array(
                            "Kelkit", "Köse", "Kürtün", "Merkez", "Şiran", "Torul"
                        ),
                        "Hakkari" => array(
                            "Çukurca", "Merkez", "Şemdinli", "Yüksekova"
                        ),
                        "Hatay" => array(
                            "Altınözü", "Antakya", "Arsuz", "Belen", "Defne", "Dörtyol",
                            "Erzin", "Hassa", "İskenderun", "Kırıkhan", "Kumlu", "Payas",
                            "Reyhanlı", "Samandağ", "Yayladağı"
                        ),
                        "Iğdır" => array(
                            "Aralık", "Karakoyunlu", "Merkez", "Tuzluca"
                        ),
                        "Isparta" => array(
                            "Aksu", "Atabey", "Eğirdir", "Gelendost", "Keçiborlu", "Merkez",
                            "Senirkent", "Sütçüler", "Şarkikaraağaç", "Uluborlu", "Yalvaç",
                            "Yenişarbademli"
                        ),
                        "İstanbul" => array(
                            "Adalar", "Arnavutköy", "Ataşehir", "Avcılar", "Bağcılar",
                            "Bahçelievler", "Bakırköy", "Başakşehir", "Bayrampaşa", "Beşiktaş",
                            "Beykoz", "Beylikdüzü", "Beyoğlu", "Büyükçekmece", "Çatalca",
                            "Çekmeköy", "Esenler", "Esenyurt", "Eyüpsultan", "Fatih", "Gaziosmanpaşa",
                            "Güngören", "Kadıköy", "Kağıthane", "Kartal", "Küçükçekmece", "Maltepe",
                            "Pendik", "Sancaktepe", "Sarıyer", "Silivri", "Sultanbeyli", "Sultangazi",
                            "Şile", "Şişli", "Tuzla", "Ümraniye", "Üsküdar", "Zeytinburnu"
                        ),
                        "İzmir" => array(
                            "Aliağa", "Bayındır", "Bergama", "Beydağ", "Bornova", "Buca",
                            "Çeşme", "Çiğli", "Dikili", "Foça", "Gaziemir", "Güzelbahçe",
                            "Karabağlar", "Karaburun", "Karşıyaka", "Kemalpaşa", "Kınık",
                            "Kiraz", "Konak", "Menderes", "Menemen", "Narlıdere", "Ödemiş",
                            "Seferihisar", "Selçuk", "Tire", "Torbalı", "Urla"
                        ),
                        "Kahramanmaraş" => array(
                            "Afşin", "Andırın", "Çağlayancerit", "Dulkadiroğlu", "Ekinözü",
                            "Elbistan", "Göksun", "Nurhak", "Onikişubat", "Pazarcık", "Türkoğlu"
                        ),
                        "Karabük" => array(
                            "Eflani", "Eskipazar", "Merkez", "Ovacık", "Safranbolu", "Yenice"
                        ),
                        "Karaman" => array(
                            "Ayrancı", "Başyayla", "Ermenek", "Merkez", "Sarıveliler"
                        ),
                        "Kars" => array(
                            "Arpaçay", "Digor", "Kağızman", "Merkez", "Sarıkamış", "Selim",
                            "Susuz"
                        ),
                        "Kastamonu" => array(
                            "Abana", "Ağlı", "Araç", "Azdavay", "Bozkurt", "Cide",
                            "Çatalzeytin", "Daday", "Devrekani", "Doğanyurt", "Hanönü",
                            "İhsangazi", "İnebolu", "Küre", "Merkez", "Pınarbaşı", "Seydiler",
                            "Şenpazar", "Taşköprü", "Tosya"
                        ),
                        "Kayseri" => array(
                            "Akkışla", "Bünyan", "Develi", "Felahiye", "Hacılar",
                            "İncesu", "Kocasinan", "Melikgazi", "Özvatan", "Pınarbaşı",
                            "Sarıoğlan", "Sarız", "Talas", "Tomarza", "Yahyalı", "Yeşilhisar"
                        ),
                        "Kırıkkale" => array(
                            "Bahşılı", "Balışeyh", "Çelebi", "Delice", "Karakeçili",
                            "Keskin", "Merkez", "Sulakyurt", "Yahşihan"
                        ),
                        "Kırklareli" => array(
                            "Babaeski", "Demirköy", "Kofçaz", "Lüleburgaz", "Merkez",
                            "Pehlivanköy", "Pınarhisar", "Vize"
                        ),
                        "Kırşehir" => array(
                            "Akpınar", "Akçakent", "Boztepe", "Çiçekdağı", "Kaman",
                            "Mucur", "Merkez"
                        ),
                        "Kilis" => array(
                            "Elbeyli", "Merkez", "Musabeyli", "Polateli"
                        ),
                        "Kocaeli" => array(
                            "Başiskele", "Çayırova", "Darıca", "Derince", "Dilovası",
                            "Gebze", "Gölcük", "İzmit", "Kandıra", "Karamürsel", "Kartepe",
                            "Körfez"
                        ),
                        "Konya" => array(
                            "Ahırlı", "Akören", "Akşehir", "Altınekin", "Beyşehir", "Bozkır",
                            "Cihanbeyli", "Çeltik", "Çumra", "Derbent", "Derebucak", "Doğanhisar",
                            "Emirgazi", "Ereğli", "Güneysınır", "Hadim", "Halkapınar", "Hüyük",
                            "Ilgın", "Kadınhanı", "Karapınar", "Karatay", "Kulu", "Meram",
                            "Sarayönü", "Selçuklu", "Seydişehir", "Taşkent", "Tuzlukçu",
                            "Yalıhüyük", "Yunak"
                        ),
                        "Kütahya" => array(
                            "Altıntaş", "Aslanapa", "Çavdarhisar", "Domaniç", "Dumlupınar",
                            "Emet", "Gediz", "Hisarcık", "Merkez", "Pazarlar", "Şaphane",
                            "Simav", "Tavşanlı"
                        ),
                        "Malatya" => array(
                            "Akçadağ", "Arapgir", "Arguvan", "Battalgazi", "Darende", "Doğanşehir",
                            "Doğanyol", "Hekimhan", "Kale", "Kuluncak", "Pütürge", "Yazıhan",
                            "Yeşilyurt"
                        ),
                        "Manisa" => array(
                            "Ahmetli", "Akhisar", "Alaşehir", "Demirci", "Gölmarmara",
                            "Gördes", "Kırkağaç", "Köprübaşı", "Kula", "Salihli", "Sarıgöl",
                            "Saruhanlı", "Selendi", "Soma", "Şehzadeler", "Turgutlu", "Yunusemre"
                        ),
                        "Mardin" => array(
                            "Dargeçit", "Derik", "Kızıltepe", "Mazıdağı", "Midyat", "Nusaybin",
                            "Ömerli", "Savur", "Yeşilli"
                        ),
                        "Mersin" => array(
                            "Akdeniz", "Anamur", "Aydıncık", "Bozyazı", "Çamlıyayla",
                            "Erdemli", "Gülnar", "Mezitli", "Mut", "Silifke", "Tarsus", "Toroslar",
                            "Yenişehir"
                        ),
                        "Muğla" => array(
                            "Bodrum", "Dalaman", "Datça", "Fethiye", "Kavaklıdere",
                            "Köyceğiz", "Marmaris", "Menteşe", "Milas", "Ortaca", "Seydikemer",
                            "Ula", "Yatağan"
                        ),
                        "Muş" => array(
                            "Bulanık", "Hasköy", "Korkut", "Malazgirt", "Merkez", "Varto"
                        ),
                        "Nevşehir" => array(
                            "Acıgöl", "Avanos", "Derinkuyu", "Gülşehir", "Hacıbektaş",
                            "Kozaklı", "Merkez", "Ürgüp"
                        ),
                        "Niğde" => array(
                            "Altunhisar", "Bor", "Çamardı", "Çiftlik", "Merkez", "Ulukışla"
                        ),
                        "Ordu" => array(
                            "Akkuş", "Altınordu", "Aybastı", "Çamaş", "Çatalpınar", "Çaybaşı",
                            "Fatsa", "Gölköy", "Gülyalı", "Gürgentepe", "İkizce", "Kabadüz",
                            "Kabataş", "Korgan", "Kumru", "Mesudiye", "Perşembe", "Ulubey",
                            "Ünye"
                        ),
                        "Osmaniye" => array(
                            "Bahçe", "Düziçi", "Hasanbeyli", "Kadirli", "Merkez", "Sumbas",
                            "Toprakkale"
                        ),
                        "Rize" => array(
                            "Ardeşen", "Çamlıhemşin", "Çayeli", "Derepazarı", "Fındıklı",
                            "Güneysu", "Hemşin", "İkizdere", "İyidere", "Kalkandere",
                            "Merkez", "Pazar"
                        ),
                        "Sakarya" => array(
                            "Adapazarı", "Akyazı", "Arifiye", "Erenler", "Ferizli",
                            "Geyve", "Hendek", "Karapürçek", "Karasu", "Kaynarca", "Kocaali",
                            "Pamukova", "Sapanca", "Serdivan", "Söğütlü", "Taraklı"
                        ),
                        "Samsun" => array(
                            "Alaçam", "Asarcık", "Atakum", "Ayvacık", "Bafra", "Canik",
                            "Çarşamba", "Havza", "İlkadım", "Kavak", "Ladik", "Salıpazarı",
                            "Tekkeköy", "Terme", "Vezirköprü", "Yakakent"
                        ),
                        "Siirt" => array(
                            "Baykan", "Eruh", "Kurtalan", "Merkez", "Pervari", "Şirvan"
                        ),
                        "Sinop" => array(
                            "Ayancık", "Boyabat", "Dikmen", "Durağan", "Erfelek",
                            "Gerze", "Merkez", "Saraydüzü", "Türkeli"
                        ),
                        "Sivas" => array(
                            "Akıncılar", "Altınyayla", "Divriği", "Doğanşar", "Gemerek",
                            "Gölova", "Hafik", "İmranlı", "Kangal", "Koyulhisar", "Merkez",
                            "Suşehri", "Şarkışla", "Ulaş", "Yıldızeli", "Zara"
                        ),
                        "Şanlıurfa" => array(
                            "Akçakale", "Birecik", "Bozova", "Ceylanpınar", "Eyyübiye",
                            "Halfeti", "Haliliye", "Harran", "Hilvan", "Karaköprü", "Siverek",
                            "Suruç", "Viranşehir"
                        ),
                        "Şırnak" => array(
                            "Beytüşşebap", "Cizre", "Güçlükonak", "İdil", "Merkez", "Silopi",
                            "Uludere"
                        ),
                        "Tekirdağ" => array(
                            "Çerkezköy", "Çorlu", "Ergene", "Hayrabolu", "Kapaklı", "Malkara",
                            "Marmaraereğlisi", "Muratlı", "Saray", "Süleymanpaşa", "Şarköy"
                        ),
                        "Tokat" => array(
                            "Almus", "Artova", "Başçiftlik", "Erbaa", "Merkez", "Niksar",
                            "Pazar", "Reşadiye", "Sulusaray", "Turhal", "Yeşilyurt", "Zile"
                        ),
                        "Trabzon" => array(
                            "Akçaabat", "Araklı", "Arsin", "Beşikdüzü", "Çarşıbaşı", "Çaykara",
                            "Dernekpazarı", "Düzköy", "Hayrat", "Köprübaşı", "Maçka", "Of",
                            "Ortahisar", "Sürmene", "Şalpazarı", "Tonya", "Vakfıkebir", "Yomra"
                        ),
                        "Tunceli" => array(
                            "Çemişgezek", "Hozat", "Mazgirt", "Merkez", "Nazımiye",
                            "Ovacık", "Pertek", "Pülümür"
                        ),
                        "Uşak" => array(
                            "Banaz", "Eşme", "Karahallı", "Merkez", "Sivaslı", "Ulubey"
                        ),
                        "Van" => array(
                            "Bahçesaray", "Başkale", "Çaldıran", "Çatak", "Edremit",
                            "Erciş", "Gevaş", "Gürpınar", "İpekyolu", "Muradiye", "Özalp",
                            "Saray", "Tuşba"
                        ),
                        "Yalova" => array(
                            "Altınova", "Armutlu", "Çınarcık", "Çiftlikköy", "Merkez",
                            "Termal"
                        ),
                        "Yozgat" => array(
                            "Akdağmadeni", "Aydıncık", "Boğazlıyan", "Çandır", "Çayıralan",
                            "Çekerek", "Kadışehri", "Merkez", "Saraykent", "Sarıkaya",
                            "Sorgun", "Şefaatli", "Yenifakılı", "Yerköy"
                        ),
                        "Zonguldak" => array(
                            "Alaplı", "Çaycuma", "Devrek", "Ereğli", "Gökçebey", "Kilimli",
                            "Kozlu", "Merkez"
                        ),
                    );

                    // İller dizisini döngüye alarak seçenekleri oluşturalım
                    foreach ($iller as $il => $ilceler) {
                        echo "<option value='$il'>$il</option>";
                    }
                    

                
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="kalkis_ilce" class="form-label">Kalkış İlçesi</label>
                    <br>
                <select class="form-control" id="kalkis_ilce" name="kalkis_ilce"  placeholder="kalkis_ilce" value="<?php echo isset($_POST['kalkis_ilce']) ? $_POST['kalkis_ilce'] : ''; ?>">>
                    <span class="invalid-feedback"><?php echo $kalkis_ilce_hata; ?></span>
                    <option value="">İlçe Seçin</option>
                    <!-- İl seçildikçe ilçeler buraya dinamik olarak eklenecek -->
                </select>
            </div>

            <div class="form-group">
                <label for="varis_il" class="form-label">Varış İli</label>
                <br>
                <select class="form-control" id="varis_il" name="varis_il"  placeholder="varis_il" value="<?php echo isset($_POST['varis_il']) ? $_POST['varis_il'] : ''; ?>">>
                    <span class="invalid-feedback"><?php echo $varis_il_hata; ?></span>
                    <option value="">İl Seçin</option>
                    <?php
                    // Varış İllerini dizi olarak tanımlayalım
                    $varis_iller = array(
                        "Adana", 
                        "Adıyaman", 
                        "Afyonkarahisar", 
                        "Ağrı", 
                        "Aksaray", 
                        "Amasya", 
                        "Ankara", 
                        "Antalya", 
                        "Ardahan", 
                        "Artvin", 
                        "Aydın", 
                        "Balıkesir",
                         "Bartın", 
                         "Batman", 
                         "Bayburt", 
                         "Bilecik", 
                         "Bingöl", 
                         "Bitlis", 
                         "Bolu", 
                         "Burdur", 
                         "Bursa",
                          "Çanakkale",
                           "Çankırı",
                            "Çorum",
                             "Denizli",
                              "Diyarbakır",
                               "Düzce",
                                "Edirne",
                                 "Elazığ",
                                  "Erzincan",
                                   "Erzurum",
                                    "Eskişehir",
                                     "Gaziantep",
                                      "Giresun",
                                       "Gümüşhane",
                                        "Hakkari",
                                         "Hatay",
                                          "Iğdır",
                                           "Isparta",
                                            "İstanbul",
                                             "İzmir",
                                              "Kahramanmaraş", 
                                              "Karabük", 
                                              "Karaman", 
                                              "Kars", 
                                              "Kastamonu", 
                                              "Kayseri", 
                                              "Kırıkkale", 
                                              "Kırklareli", 
                                              "Kırşehir", 
                                              "Kilis", 
                                              "Kocaeli", 
                                              "Konya", 
                                              "Kütahya", 
                                              "Malatya", 
                                              "Manisa", 
                                              "Mardin", 
                                              "Mersin", 
                                              "Muğla", 
                                              "Muş", 
                                              "Nevşehir", 
                                              "Niğde", 
                                              "Ordu", 
                                              "Osmaniye", 
                                              "Rize", 
                                              "Sakarya", 
                                              "Samsun", 
                                              "Siirt", 
                                              "Sinop", 
                                              "Sivas", 
                                              "Şanlıurfa", 
                                              "Şırnak", 
                                              "Tekirdağ", 
                                              "Tokat", 
                                              "Trabzon", 
                                              "Tunceli", 
                                              "Uşak", 
                                              "Van", 
                                              "Yalova", 
                                              "Yozgat", 
                                              "Zonguldak"
                        // Diğer illeri buraya ekleyebilirsiniz
                    );


                    // Varış İllerini döngüye alarak seçenekleri oluşturalım
                    foreach ($varis_iller as $varis_il) {
                        echo "<option value='$varis_il'>$varis_il</option>";
                    }
                    
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="varis_ilce" class="form-label">Varış İlçesi</label>
                <br>
                <select class="form-control" id="varis_ilce" name="varis_ilce"  placeholder="Varış İlçesi Giriniz" value="<?php echo isset($_POST['varis_ilce']) ? $_POST['varis_ilce'] : ''; ?>">>
                    <!-- İl seçildikçe ilçeler buraya dinamik olarak eklenecek -->
                    <span class="invalid-feedback"><?php echo $varis_ilce_hata; ?></span>
                    <option value="">Varış İlçesi Giriniz</option>
                </select>
            </div>

            <div class="form-group">
                <label for="kilo" class="form-label">Kilo</label>
                <br>
                <input type="number" class="form-control" id="kilo" name="kilo" placeholder="kilo giriniz" value="<?php echo isset($_POST['kilo']) ? $_POST['kilo'] : ''; ?>">
                <span class="invalid-feedback"><?php echo $kilo_hata; ?></span>
            </div>

            <div class="form-group">
                <label for="eposta" class="form-label">eposta</label>
                <br>
                
                <input type="text" class="form-control" id="eposta" name="eposta" placeholder="e postanızı giriniz" value="<?php echo isset($_POST['eposta']) ? $_POST['eposta'] : ''; ?>">
                <span class="invalid-feedback"><?php echo $eposta_hata; ?></span>
            </div>

            <div class="form-group">
                <label for="tarih" class="form-label">Tarih</label>
                <br>
                <input type="date" class="form-control" id="tarih" name="tarih" placeholder="" value="<?php echo isset($_POST['tarih']) ? $_POST['tarih'] : ''; ?>">
                <span class="invalid-feedback"><?php echo $tarih_hata; ?></span>
            </div>

           
            <div class="form-group">
                <label for="fiyat" class="form-label">Fiyatı Gririniz</label>
                <br>
                <input type="number" class="form-control" id="fiyat" name="fiyat" placeholder="Fiyat" value="<?php echo isset($_POST['fiyat']) ? $_POST['fiyat'] : ''; ?>">
                <span class="invalid-feedback"><?php echo $fiyat_hata; ?></span>
            </div>

            <div class="form-group">
                <label for="acıklama" class="form-label">Açıklama</label>
                <br>
                <textarea class="form-control" id="acıklama" name="acıklama" placeholder="Açıklama giriniz"><?php echo isset($_POST['acıklama']) ? $_POST['acıklama'] : ''; ?></textarea>
                <span class="invalid-feedback"><?php echo $acıklama_hata; ?></span>
            </div>

            <div class="form-group-buton">
                <input type="submit" value="Gönder" style="background-color: green; color: white; font-size: 20px; border-radius: 10px; border: 2px solid black;">
            </div>

        </form>
    </div>

    <script>
        // İl seçimi yapıldığında ilçeleri güncelleyen işlev
        function updateIlceler(ilSelect, ilceSelect, ilceler) {
            var secilenIl = ilSelect.value;

            // Seçilen il'e göre ilçeleri güncelle
            var ilceSecim = ilceSelect;
            ilceSecim.innerHTML = ""; // Önceki ilçeleri temizle

            for (var i = 0; i < ilceler[secilenIl].length; i++) {
                var option = document.createElement("option");
                option.text = ilceler[secilenIl][i];
                option.value = ilceler[secilenIl][i];
                ilceSecim.appendChild(option);
            }
        }

        window.onload = function() {
            var kalkis_il = document.getElementById("kalkis_il");
            var varis_il = document.getElementById("varis_il");
            var kalkis_ilce = document.getElementById("kalkis_ilce");
            var varis_ilce = document.getElementById("varis_ilce");
            var ilceler = <?php echo json_encode($iller); ?>;

            kalkis_il.onchange = function() {
                updateIlceler(kalkis_il, kalkis_ilce, ilceler);
            };

            varis_il.onchange = function() {
                updateIlceler(varis_il, varis_ilce, ilceler);
            };

            // İlk yükleme için varış ilçelerini güncelle
            updateIlceler(varis_il, varis_ilce, ilceler);
        };
    </script>
</body>
</html>



