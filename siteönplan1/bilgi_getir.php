<?php
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlan Verme Formu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>








<img src="a.jpg" class="img-fluid" alt="Responsive image" >







    <div class="container bg-light p-3 shadow w-95" style="border-radius: 10px; border: 1px solid black;">
        <!-- Form burada başlıyor -->
        <form method="post" action="sonuc.php" class="row g-3">
            <div class="col-md-3">
                <label for="kalkis_il" class="form-label"></label>
                <select class="form-select bg-light" id="kalkis_il" name="kalkis_il" required style="border: 0; padding: 5px;">
                    <option value="">Kalkış İlini Seçiniz</option>
                    <option value="Adana">Adana</option>
                    <option value="Adıyaman">Adıyaman</option>
                    <option value="Afyonkarahisar">Afyonkarahisar</option>
                    <option value="Ağrı">Ağrı</option>
                    <option value="Aksaray">Aksaray</option>
                    <option value="Amasya">Amasya</option>
                    <option value="Ankara">Ankara</option>
                    <option value="Antalya">Antalya</option>
                    <option value="Ardahan">Ardahan</option>
                    <option value="Artvin">Artvin</option>
                    <option value="Aydın">Aydın</option>
                    <option value="Balıkesir">Balıkesir</option>
                    <option value="Bartın">Bartın</option>
                    <option value="Batman">Batman</option>
                    <option value="Bayburt">Bayburt</option>
                    <option value="Bilecik">Bilecik</option>
                    <option value="Bingöl">Bingöl</option>
                    <option value="Bitlis">Bitlis</option>
                    <option value="Bolu">Bolu</option>
                    <option value="Burdur">Burdur</option>
                    <option value="Bursa">Bursa</option>
                    <option value="Çanakkale">Çanakkale</option>
                    <option value="Çankırı">Çankırı</option>
                    <option value="Çorum">Çorum</option>
                    <option value="Denizli">Denizli</option>
                    <option value="Diyarbakır">Diyarbakır</option>
                    <option value="Düzce">Düzce</option>
                    <option value="Edirne">Edirne</option>
                    <option value="Elazığ">Elazığ</option>
                    <option value="Erzincan">Erzincan</option>
                    <option value="Erzurum">Erzurum</option>
                    <option value="Eskişehir">Eskişehir</option>
                    <option value="Gaziantep">Gaziantep</option>
                    <option value="Giresun">Giresun</option>
                    <option value="Gümüşhane">Gümüşhane</option>
                    <option value="Hakkari">Hakkari</option>
                    <option value="Hatay">Hatay</option>
                    <option value="Iğdır">Iğdır</option>
                    <option value="Isparta">Isparta</option>
                    <option value="İstanbul">İstanbul</option>
                    <option value="İzmir">İzmir</option>
                    <option value="Kahramanmaraş">Kahramanmaraş</option>
                    <option value="Karabük">Karabük</option>
                    <option value="Karaman">Karaman</option>
                    <option value="Kars">Kars</option>
                    <option value="Kastamonu">Kastamonu</option>
                    <option value="Kayseri">Kayseri</option>
                    <option value="Kırıkkale">Kırıkkale</option>
                    <option value="Kırklareli">Kırklareli</option>
                    <option value="Kırşehir">Kırşehir</option>
                    <option value="Kilis">Kilis</option>
                    <option value="Kocaeli">Kocaeli</option>
                    <option value="Konya">Konya</option>
                    <option value="Kütahya">Kütahya</option>
                    <option value="Malatya">Malatya</option>
                    <option value="Manisa">Manisa</option>
                    <option value="Mardin">Mardin</option>
                    <option value="Mersin">Mersin</option>
                    <option value="Muğla">Muğla</option>
                    <option value="Muş">Muş</option>
                    <option value="Nevşehir">Nevşehir</option>
                    <option value="Niğde">Niğde</option>
                    <option value="Ordu">Ordu</option>
                    <option value="Osmaniye">Osmaniye</option>
                    <option value="Rize">Rize</option>
                    <option value="Sakarya">Sakarya</option>
                    <option value="Samsun">Samsun</option>
                    <option value="Siirt">Siirt</option>
                    <option value="Sinop">Sinop</option>
                    <option value="Sivas">Sivas</option>
                    <option value="Şanlıurfa">Şanlıurfa</option>
                    <option value="Şırnak">Şırnak</option>
                    <option value="Tekirdağ">Tekirdağ</option>
                    <option value="Tokat">Tokat</option>
                    <option value="Trabzon">Trabzon</option>
                    <option value="Tunceli">Tunceli</option>
                    <option value="Uşak">Uşak</option>
                    <option value="Van">Van</option>
                    <option value="Yalova">Yalova</option>
                    <option value="Yozgat">Yozgat</option>
                    <option value="Zonguldak">Zonguldak</option>
                </select>
                <span class="invalid-feedback"><?php echo $kalkis_il_hata; ?></span>
            </div>
            <div class="col-md-3">
                <label for="kalkis_ilce" class="form-label"></label>
                <select class="form-select bg-light" id="kalkis_ilce" name="kalkis_ilce" required style="border: 0; padding: 5px;">
                    <option value="">Kalkış İlçesini Seçiniz</option>
                    <!-- İlçeler buraya JavaScript ile dinamik olarak eklenecek -->
                </select>
                <span class="invalid-feedback"><?php echo $kalkis_ilce_hata; ?></span>
            </div>
            <div class="col-md-3">
                <label for="varis_il" class="form-label"></label>
                <select class="form-select bg-light" id="varis_il" name="varis_il" required style="border: 0; padding: 5px;">
                    <option value="">Varış İlini Seçiniz</option>
                    <option value="Adana">Adana</option>
                    <option value="Adıyaman">Adıyaman</option>
                    <option value="Afyonkarahisar">Afyonkarahisar</option>
                    <option value="Ağrı">Ağrı</option>
                    <option value="Aksaray">Aksaray</option>
                    <option value="Amasya">Amasya</option>
                    <option value="Ankara">Ankara</option>
                    <option value="Antalya">Antalya</option>
                    <option value="Ardahan">Ardahan</option>
                    <option value="Artvin">Artvin</option>
                    <option value="Aydın">Aydın</option>
                    <option value="Balıkesir">Balıkesir</option>
                    <option value="Bartın">Bartın</option>
                    <option value="Batman">Batman</option>
                    <option value="Bayburt">Bayburt</option>
                    <option value="Bilecik">Bilecik</option>
                    <option value="Bingöl">Bingöl</option>
                    <option value="Bitlis">Bitlis</option>
                    <option value="Bolu">Bolu</option>
                    <option value="Burdur">Burdur</option>
                    <option value="Bursa">Bursa</option>
                    <option value="Çanakkale">Çanakkale</option>
                    <option value="Çankırı">Çankırı</option>
                    <option value="Çorum">Çorum</option>
                    <option value="Denizli">Denizli</option>
                    <option value="Diyarbakır">Diyarbakır</option>
                    <option value="Düzce">Düzce</option>
                    <option value="Edirne">Edirne</option>
                    <option value="Elazığ">Elazığ</option>
                    <option value="Erzincan">Erzincan</option>
                    <option value="Erzurum">Erzurum</option>
                    <option value="Eskişehir">Eskişehir</option>
                    <option value="Gaziantep">Gaziantep</option>
                    <option value="Giresun">Giresun</option>
                    <option value="Gümüşhane">Gümüşhane</option>
                    <option value="Hakkari">Hakkari</option>
                    <option value="Hatay">Hatay</option>
                    <option value="Iğdır">Iğdır</option>
                    <option value="Isparta">Isparta</option>
                    <option value="İstanbul">İstanbul</option>
                    <option value="İzmir">İzmir</option>
                    <option value="Kahramanmaraş">Kahramanmaraş</option>
                    <option value="Karabük">Karabük</option>
                    <option value="Karaman">Karaman</option>
                    <option value="Kars">Kars</option>
                    <option value="Kastamonu">Kastamonu</option>
                    <option value="Kayseri">Kayseri</option>
                    <option value="Kırıkkale">Kırıkkale</option>
                    <option value="Kırklareli">Kırklareli</option>
                    <option value="Kırşehir">Kırşehir</option>
                    <option value="Kilis">Kilis</option>
                    <option value="Kocaeli">Kocaeli</option>
                    <option value="Konya">Konya</option>
                    <option value="Kütahya">Kütahya</option>
                    <option value="Malatya">Malatya</option>
                    <option value="Manisa">Manisa</option>
                    <option value="Mardin">Mardin</option>
                    <option value="Mersin">Mersin</option>
                    <option value="Muğla">Muğla</option>
                    <option value="Muş">Muş</option>
                    <option value="Nevşehir">Nevşehir</option>
                    <option value="Niğde">Niğde</option>
                    <option value="Ordu">Ordu</option>
                    <option value="Osmaniye">Osmaniye</option>
                    <option value="Rize">Rize</option>
                    <option value="Sakarya">Sakarya</option>
                    <option value="Samsun">Samsun</option>
                    <option value="Siirt">Siirt</option>
                    <option value="Sinop">Sinop</option>
                    <option value="Sivas">Sivas</option>
                    <option value="Şanlıurfa">Şanlıurfa</option>
                    <option value="Şırnak">Şırnak</option>
                    <option value="Tekirdağ">Tekirdağ</option>
                    <option value="Tokat">Tokat</option>
                    <option value="Trabzon">Trabzon</option>
                    <option value="Tunceli">Tunceli</option>
                    <option value="Uşak">Uşak</option>
                    <option value="Van">Van</option>
                    <option value="Yalova">Yalova</option>
                    <option value="Yozgat">Yozgat</option>
                    <option value="Zonguldak">Zonguldak</option>
                </select>
                <span class="invalid-feedback"><?php echo $varis_il_hata; ?></span>
            </div>
            <div class="col-md-2">
                <label for="varis_ilce" class="form-label"></label>
                <select class="form-select bg-light" id="varis_ilce" name="varis_ilce" required style="border: 0; padding: 5px;">
                    <option value="">Varış İlçesini Seçiniz</option>
                    <!-- İlçeler buraya JavaScript ile dinamik olarak eklenecek -->
                </select>
                <span class="invalid-feedback"><?php echo $varis_ilce_hata; ?></span>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary btn-block">Ara</button>
            </div>
        </form>
    </div>
</div>
<!-- form bitiş -->






    

    



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.1.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        // JavaScript ile ilçeleri dinamik olarak yüklemek için bir fonksiyon tanımlıyoruz
        function updateIlceler(ilSelect, ilceSelect) {
            // Seçilen il'in değerini alıyoruz
            var secilenIl = ilSelect.value;

            // İlgili ilçe select elementini temizliyoruz
            ilceSelect.innerHTML = "<option value=''>İlçe Seçiniz</option>";

            // Seçilen il'e göre ilçeleri yüklüyoruz
            switch (secilenIl) {
              case "Adana":
    var ilceler = [
        "Aladağ", "Ceyhan", "Çukurova", "Feke", "İmamoğlu", "Karaisalı",
        "Karataş", "Kozan", "Pozantı", "Saimbeyli", "Sarıçam", "Seyhan",
        "Tufanbeyli", "Yumurtalık", "Yüreğir"
    ];
    break;
case "Adıyaman":
    var ilceler = [
        "Besni", "Çelikhan", "Gerger", "Gölbaşı", "Kahta", "Merkez",
        "Samsat", "Sincik", "Tut"
    ];
    break;
case "Afyonkarahisar":
    var ilceler = [
        "Başmakçı", "Bayat", "Bolvadin", "Çay", "Çobanlar", "Dazkırı",
        "Dinar", "Emirdağ", "Evciler", "Hocalar", "İhsaniye", "İscehisar",
        "Kızılören", "Merkez", "Sandıklı", "Sinanpaşa", "Sultandağı", "Şuhut"
    ];

    case "Ağrı":
    var ilceler = [
        "Diyadin", "Doğubayazıt", "Eleşkirt", "Hamur", "Merkez",
        "Patnos", "Taşlıçay", "Tut"
    ];
    break;
case "Aksaray":
    var ilceler = [
        "Ağaçören", "Eskil", "Gülağaç", "Güzelyurt", "Merkez",
        "Ortaköy", "Sarıyahşi", "Sultanhanı"
    ];
    break;
case "Amasya":
    var ilceler = [
        "Göynücek", "Gümüşhacıköy", "Hamamözü", "Merkez", "Merzifon",
        "Suluova", "Taşova"
    ];
    break;
case "Ankara":
    var ilceler = [
        "Akyurt", "Altındağ", "Ayaş", "Balâ", "Beypazarı", "Çamlıdere",
        "Çankaya", "Çubuk", "Elmadağ", "Etimesgut", "Evren", "Gölbaşı",
        "Güdül", "Haymana", "Kalecik", "Kahramankazan", "Keçiören",
        "Kızılcahamam", "Mamak", "Nallıhan", "Polatlı", "Pursaklar",
        "Sincan", "Şereflikoçhisar", "Yenimahalle"
    ];
    break;
case "Antalya":
    var ilceler = [
        "Akseki", "Aksu", "Alanya", "Demre", "Döşemealtı", "Elmalı",
        "Finike", "Gazipaşa", "Gündoğmuş", "İbradı", "Kaş", "Kemer",
        "Kepez", "Konyaaltı", "Korkuteli", "Kumluca", "Manavgat",
        "Muratpaşa", "Serik"
    ];
    break;
case "Ardahan":
    var ilceler = [
        "Çıldır", "Damal", "Göle", "Hanak", "Merkez", "Posof"
    ];
    break;
case "Artvin":
    var ilceler = [
        "Ardanuç", "Arhavi", "Borçka", "Hopa", "Kemalpaşa", "Merkez",
        "Murgul", "Şavşat", "Yusufeli"
    ];
    break;
case "Aydın":
    var ilceler = [
        "Bozdoğan", "Buharkent", "Çine", "Didim", "Efeler", "Germencik",
        "İncirliova", "Karacasu", "Karpuzlu", "Koçarlı", "Köşk",
        "Kuşadası", "Kuyucak", "Nazilli", "Söke", "Sultanhisar",
        "Yenipazar"
    ];
    break;
case "Balıkesir":
    var ilceler = [
        "Altıeylül", "Ayvalık", "Balya", "Bandırma", "Bigadiç", "Burhaniye",
        "Dursunbey", "Edremit", "Erdek", "Gömeç", "Gönen", "Havran",
        "İvrindi", "Karesi", "Kepsut", "Manyas", "Marmara", "Savaştepe",
        "Sındırgı", "Susurluk"
    ];
    break;
case "Bartın":
    var ilceler = [
        "Amasra", "Kurucaşile", "Merkez", "Ulus"
    ];
    break;
case "Batman":
    var ilceler = [
        "Beşiri", "Gercüş", "Hasankeyf", "Kozluk", "Merkez", "Sason"
    ];
    break;
case "Bayburt":
    var ilceler = [
        "Aydıntepe", "Demirözü", "Merkez"
    ];
    break;
case "Bilecik":
    var ilceler = [
        "Bozüyük", "Gölpazarı", "İnhisar", "Merkez", "Osmaneli",
        "Pazaryeri", "Söğüt", "Yenipazar"
    ];
    break;
case "Bingöl":
    var ilceler = [
        "Adaklı", "Genç", "Karlıova", "Kiğı", "Merkez", "Solhan",
        "Yayladere", "Yedisu"
    ];
    break;
case "Bitlis":
    var ilceler = [
        "Adilcevaz", "Ahlat", "Güroymak", "Hizan", "Merkez", "Mutki",
        "Tatvan"
    ];
    break;
case "Bolu":
    var ilceler = [
        "Dörtdivan", "Gerede", "Göynük", "Kıbrıscık", "Mengen", "Merkez",
        "Mudurnu", "Seben", "Yeniçağa"
    ];
    break;
case "Burdur":
    var ilceler = [
        "Ağlasun", "Altınyayla", "Bucak", "Çavdır", "Çeltikçi", "Gölhisar",
        "Karamanlı", "Kemer", "Merkez", "Tefenni", "Yeşilova"
    ];
    break;
case "Bursa":
    var ilceler = [
        "Büyükorhan", "Gemlik", "Gürsu", "Harmancık", "İnegöl", "İznik",
        "Karacabey", "Keles", "Kestel", "Mudanya", "Mustafakemalpaşa",
        "Nilüfer", "Orhaneli", "Orhangazi", "Osmangazi", "Yenişehir",
        "Yıldırım"
    ];
    break;

    case "Çanakkale":
    var ilceler = [
        "Ayvacık", "Bayramiç", "Biga", "Bozcaada", "Çan",
        "Eceabat", "Ezine", "Gelibolu", "Gökçeada", "Lapseki",
        "Merkez", "Yenice"
    ];
    break;
case "Çankırı":
    var ilceler = [
        "Atkaracalar", "Bayramören", "Çerkeş", "Eldivan",
        "Ilgaz", "Kızılırmak", "Korgun", "Kurşunlu", "Merkez",
        "Orta", "Şabanözü", "Yapraklı"
    ];
    break;
case "Çorum":
    var ilceler = [
        "Alaca", "Bayat", "Boğazkale", "Dodurga", "İskilip",
        "Kargı", "Laçin", "Mecitözü", "Merkez", "Oğuzlar",
        "Ortaköy", "Osmancık", "Sungurlu", "Uğurludağ"
    ];
    break;
case "Denizli":
    var ilceler = [
        "Acıpayam", "Babadağ", "Baklan", "Bekilli", "Beyağaç",
        "Bozkurt", "Buldan", "Çal", "Çameli", "Çardak", "Çivril",
        "Güney", "Honaz", "Kale", "Merkez", "Pamukkale",
        "Sarayköy", "Serinhisar", "Tavas"
    ];
    break;
case "Diyarbakır":
    var ilceler = [
        "Bağlar", "Bismil", "Çermik", "Çınar", "Çüngüş", "Dicle",
        "Eğil", "Ergani", "Hani", "Hazro", "Kayapınar", "Kocaköy",
        "Kulp", "Lice", "Silvan", "Sur", "Yenişehir"
    ];
    break;
case "Düzce":
    var ilceler = [
        "Akçakoca", "Cumayeri", "Çilimli", "Gölyaka", "Gümüşova",
        "Kaynaşlı", "Merkez", "Yığılca"
    ];
    break;
case "Edirne":
    var ilceler = [
        "Enez", "Havsa", "İpsala", "Keşan", "Lalapaşa", "Meriç",
        "Merkez", "Süloğlu", "Uzunköprü"
    ];
    break;
case "Elazığ":
    var ilceler = [
        "Ağın", "Alacakaya", "Arıcak", "Baskil", "Karakoçan",
        "Keban", "Kovancılar", "Maden", "Merkez", "Palu",
        "Sivrice"
    ];
    break;
case "Erzincan":
    var ilceler = [
        "Çayırlı", "İliç", "Kemah", "Kemaliye", "Merkez",
        "Otlukbeli", "Refahiye", "Tercan", "Üzümlü"
    ];
    break;
case "Erzurum":
    var ilceler = [
        "Aşkale", "Aziziye", "Çat", "Hınıs", "Horasan",
        "İspir", "Karaçoban", "Karayazı", "Köprüköy",
        "Narman", "Oltu", "Olur", "Palandöken", "Pasinler",
        "Pazaryolu", "Şenkaya", "Tekman", "Tortum", "Uzundere",
        "Yakutiye"
    ];
    break;
case "Eskişehir":
    var ilceler = [
        "Alpu", "Beylikova", "Çifteler", "Günyüzü", "Han",
        "İnönü", "Mahmudiye", "Mihalgazi", "Mihalıççık",
        "Odunpazarı", "Sarıcakaya", "Seyitgazi", "Sivrihisar",
        "Tepebaşı"
    ];
    break;
case "Gaziantep":
    var ilceler = [
        "Araban", "İslahiye", "Karkamış", "Nizip", "Nurdağı",
        "Oğuzeli", "Şahinbey", "Şehitkamil", "Yavuzeli"
    ];
    break;
case "Giresun":
    var ilceler = [
        "Alucra", "Bulancak", "Çamoluk", "Çanakçı", "Dereli",
        "Doğankent", "Espiye", "Eynesil", "Görele", "Güce",
        "Keşap", "Merkez", "Piraziz", "Şebinkarahisar", "Tirebolu",
        "Yağlıdere"
    ];
    break;
case "Gümüşhane":
    var ilceler = [
        "Kelkit", "Köse", "Kürtün", "Merkez", "Şiran", "Torul"
    ];
    break;
case "Hakkari":
    var ilceler = [
        "Çukurca", "Derecik", "Merkez", "Şemdinli", "Yüksekova"
    ];
    break;
case "Hatay":
    var ilceler = [
        "Altınözü", "Antakya", "Arsuz", "Belen", "Defne",
        "Dörtyol", "Erzin", "Hassa", "İskenderun", "Kırıkhan",
        "Kumlu", "Payas", "Reyhanlı", "Samandağ", "Yayladağı"
    ];
    break;
case "Iğdır":
    var ilceler = [
        "Aralık", "Karakoyunlu", "Merkez", "Tuzluca"
    ];
    break;

case "Isparta": 
  var ilceler = [
    "Aksu", "Atabey", "Eğirdir", "Gelendost", "Gönen", 
    "Keçiborlu", "Merkez", "Senirkent", "Sütçüler", 
    "Şarkikaraağaç", "Uluborlu", "Yalvaç", "Yenişarbademli"
];
break;

case "İstanbul": 
  var ilceler = [
    "Adalar", "Arnavutköy", "Ataşehir", "Avcılar", "Bağcılar", 
    "Bahçelievler", "Bakırköy", "Başakşehir", "Bayrampaşa", 
    "Beşiktaş", "Beykoz", "Beylikdüzü", "Beyoğlu", "Büyükçekmece", 
    "Çatalca", "Çekmeköy", "Esenler", "Esenyurt", "Eyüpsultan", 
    "Fatih", "Gaziosmanpaşa", "Güngören", "Kadıköy", "Kağıthane", 
    "Kartal", "Küçükçekmece", "Maltepe", "Pendik", "Sancaktepe", 
    "Sarıyer", "Silivri", "Sultanbeyli", "Sultangazi", "Şile", 
    "Şişli", "Tuzla", "Ümraniye", "Üsküdar", "Zeytinburnu"
];
break;

case "İzmir": 
  var ilceler = [
    "Aliağa", "Balçova", "Bayındır", "Bayraklı", "Bergama", 
    "Beydağ", "Bornova", "Buca", "Çeşme", "Çiğli", "Dikili", 
    "Foça", "Gaziemir", "Güzelbahçe", "Karabağlar", "Karaburun", 
    "Karşıyaka", "Kemalpaşa", "Kınık", "Kiraz", "Konak", 
    "Menderes", "Menemen", "Narlıdere", "Ödemiş", "Seferihisar", 
    "Selçuk", "Tire", "Torbalı", "Urla"
];
break;

case "Kahramanmaras": 
  var ilceler = [
    "Afşin", "Andırın", "Çağlayancerit", "Dulkadiroğlu", 
    "Ekinözü", "Elbistan", "Göksun", "Nurhak", "Onikişubat", 
    "Pazarcık", "Türkoğlu"
];
break;

case "Karabük": 
  var ilceler = [
    "Eflani", "Eskipazar", "Merkez", "Ovacık", "Safranbolu", "Yenice"
];
break;

case "Karaman": 
  var ilceler = [
    "Ayrancı", "Başyayla", "Ermenek", "Kazımkarabekir", 
    "Merkez", "Sarıveliler"
];
case "Kars": 
  var ilceler = [
    "Akyaka", "Arpaçay", "Digor", "Kağızman", "Merkez", 
    "Sarıkamış", "Selim", "Susuz"
];
break;

case "Kastamonu": 
  var ilceler = [
    "Abana", "Ağlı", "Araç", "Azdavay", "Bozkurt", 
    "Cide", "Çatalzeytin", "Daday", "Devrekani", 
    "Doğanyurt", "Hanönü", "İhsangazi", "İnebolu", 
    "Küre", "Merkez", "Pınarbaşı"
];
break;

case "Kayseri": 
  var ilceler = [
    "Akkışla", "Bünyan", "Develi", "Felahiye", 
    "Hacılar", "İncesu", "Kocasinan", "Melikgazi", 
    "Özvatan", "Pınarbaşı", "Sarıoğlan", "Sarız", 
    "Talas", "Tomarza", "Yahyalı", "Yeşilhisar"
];
break;

case "Kilis": 
  var ilceler = [
    "Elbeyli", "Merkez", "Musabeyli", "Polateli"
];
break;

case "Kirikkale": 
  var ilceler = [
    "Bahşili", "Balışeyh", "Çelebi", "Delice", 
    "Karakeçili", "Merkez", "Sulakyurt", "Yahşihan"
];
break;

case "Kirklareli": 
  var ilceler = [
    "Babaeski", "Demirköy", "Kofçaz", "Lüleburgaz", 
    "Merkez", "Pehlivanköy", "Pınarhisar", "Vize"
];
break;

case "Kirsehir": 
  var ilceler = [
    "Akçakent", "Akpınar", "Boztepe", "Çiçekdağı", 
    "Kaman", "Merkez", "Mucur"
];
break;

case "Kocaeli": 
  var ilceler = [
    "Başiskele", "Çayırova", "Darıca", "Derince", 
    "Dilovası", "Gebze", "Gölcük", "İzmit", 
    "Kandıra", "Karamürsel", "Kartepe", "Körfez"
];
break;

case "Konya": 
  var ilceler = [
    "Ahırlı", "Akören", "Akşehir", "Altınekin", 
    "Beyşehir", "Bozkır", "Cihanbeyli", "Çeltik", 
    "Çumra", "Derbent", "Derebucak", "Doğanhisar", 
    "Emirgazi", "Ereğli", "Güneysınır", "Hadim", 
    "Halkapınar", "Hüyük", "Ilgın", "Kadınhanı", 
    "Karapınar", "Karatay", "Kulu", "Meram", 
    "Sarayönü", "Selçuklu", "Seydişehir", "Taşkent", 
    "Tuzlukçu", "Yalıhüyük", "Yunak"
];
break;


case "Kütahya": 
  var ilceler = [
    "Altıntaş", "Aslanapa", "Çavdarhisar", "Domaniç", 
    "Dumlupınar", "Emet", "Gediz", "Hisarcık", "Merkez", 
    "Pazarlar", "Simav", "Şaphane", "Tavşanlı"
];
break;

case "Malatya": 
  var ilceler = [
    "Akçadağ", "Arapgir", "Arguvan", "Battalgazi", "Darende", 
    "Doğanşehir", "Doğanyol", "Hekimhan", "Kale", "Kuluncak", 
    "Merkez", "Pütürge", "Yazıhan", "Yeşilyurt"
]
break;

case "Manisa": 
  var ilceler = [
    "Ahmetli", "Akhisar", "Alaşehir", "Demirci", "Gölmarmara", 
    "Gördes", "Kırkağaç", "Köprübaşı", "Kula", "Merkez", 
    "Salihli", "Sarıgöl", "Saruhanlı", "Selendi", "Soma", 
    "Şehzadeler", "Turgutlu", "Yunusemre"
];
break;

case "Mardin": 
  var ilceler = [
    "Artuklu", "Dargeçit", "Derik", "Kızıltepe", "Mazıdağı", 
    "Merkez", "Midyat", "Nusaybin", "Ömerli", "Savur", "Yeşilli"
];
break;

case "Muğla": 
  var ilceler = [
    "Bodrum", "Dalaman", "Datça", "Fethiye", "Kavaklıdere", 
    "Köyceğiz", "Marmaris", "Menteşe", "Milas", "Ortaca", 
    "Seydikemer", "Ula", "Yatağan"
];
break;

case "Muş": 
  var ilceler = [
    "Bulanık", "Hasköy", "Korkut", "Malazgirt", "Merkez", "Varto"
];
break;

case "Nevşehir": 
  var ilceler = [
    "Acıgöl", "Avanos", "Derinkuyu", "Gülşehir", "Hacıbektaş", 
    "Kozaklı", "Merkez", "Ürgüp"
];
break;

case "Niğde": 
  var ilceler = [
    "Altunhisar", "Bor", "Çamardı", "Çiftlik", "Merkez", "Ulukışla"
];
case "Ordu": 
  var ilceler = [
    "Akkuş", "Altınordu", "Aybastı", "Çamaş", "Çatalpınar", 
    "Çaybaşı", "Fatsa", "Gölköy", "Gülyalı", "Gürgentepe", 
    "İkizce", "Kabadüz", "Kabataş", "Korgan", "Kumru", "Mesudiye", 
    "Perşembe", "Ulubey", "Ünye"
];
break;

case "Osmaniye": 
  var ilceler = [
    "Bahçe", "Düziçi", "Hasanbeyli", "Kadirli", "Merkez", "Sumbas"
];
break;

case "Rize": 
  var ilceler = [
    "Ardeşen", "Çamlıhemşin", "Çayeli", "Derepazarı", "Fındıklı", 
    "Güneysu", "Hemşin", "İkizdere", "İyidere", "Kalkandere", 
    "Merkez", "Pazar"
];
break;

case "Sakarya": 
  var ilceler = [
    "Akyazı", "Arifiye", "Erenler", "Ferizli", "Geyve", 
    "Hendek", "Karapürçek", "Karasu", "Kaynarca", 
    "Kocaali", "Pamukova", "Sapanca", "Serdivan", 
    "Söğütlü", "Taraklı"
];
break;

case "Samsun": 
  var ilceler = [
    "Alaçam", "Asarcık", "Atakum", "Ayvacık", "Bafra", 
    "Canik", "Çarşamba", "Havza", "İlkadım", "Kavak", 
    "Ladik", "Ondokuzmayıs", "Salıpazarı", "Tekkeköy", 
    "Terme", "Vezirköprü", "Yakakent"
];
break;

case "Siirt": 
  var ilceler = [
    "Baykan", "Eruh", "Kurtalan", "Merkez", "Pervari", "Şirvan"
];
break;

case "Sinop": 
  var ilceler = [
    "Ayancık", "Boyabat", "Dikmen", "Durağan", "Erfelek", 
    "Gerze", "Merkez", "Saraydüzü", "Türkeli"
];
break;

case "Sivas": 
  var ilceler = [
    "Akıncılar", "Altınyayla", "Divriği", "Doğanşar", 
    "Gemerek", "Gölova", "Hafik", "İmranlı", "Kangal", 
    "Koyulhisar", "Merkez", "Suşehri", "Şarkışla", 
    "Ulaş", "Yıldızeli", "Zara"
];
break;


case "Şanlıurfa": 
  var ilceler = [
    "Akçakale", "Birecik", "Bozova", "Ceylanpınar", 
    "Eyyübiye", "Halfeti", "Haliliye", "Harran", 
    "Hilvan", "Karaköprü", "Siverek", "Suruç", 
    "Viranşehir"
];
break;

case "Şırnak": 
  var ilceler = [
    "Beytüşşebap", "Cizre", "Güçlükonak", "İdil", 
    "Merkez", "Silopi", "Uludere"
];
break;

case "Tekirdağ": 
  var ilceler = [
    "Çerkezköy", "Çorlu", "Ergene", "Hayrabolu", 
    "Kapaklı", "Malkara", "Muratlı", "Saray", 
    "Süleymanpaşa", "Şarköy"
];
break;

case "Tokat": 
  var ilceler = [
    "Almus", "Artova", "Başçiftlik", "Erbaa", 
    "Merkez", "Niksar", "Pazar", "Reşadiye", 
    "Sulusaray", "Turhal", "Yeşilyurt", "Zile"
];
break;

case "Trabzon": 
  var ilceler = [
    "Akçaabat", "Araklı", "Arsin", "Beşikdüzü", 
    "Çarşıbaşı", "Çaykara", "Dernekpazarı", 
    "Düzköy", "Hayrat", "Köprübaşı", "Maçka", 
    "Merkez", "Of", "Ortahisar", "Sürmene", 
    "Şalpazarı", "Tonya", "Vakfıkebir", 
    "Yomra"
];
break;

case "Tunceli": 
  var ilceler = [
    "Çemişgezek", "Hozat", "Mazgirt", "Merkez", 
    "Nazımiye", "Ovacık", "Pertek", "Pülümür"
];
break;

case "Uşak": 
  var ilceler = [
    "Banaz", "Eşme", "Karahallı", "Merkez", 
    "Sivaslı", "Ulubey"
];
break;

case "Van": 
  var ilceler = [
    "Başkale", "Çaldıran", "Çatak", "Edremit", 
    "Erciş", "Gevaş", "Gürpınar", "İpekyolu", 
    "Merkez", "Muradiye", "Özalp", "Saray"
];
break;

case "Yalova": 
  var ilceler = [
    "Altınova", "Armutlu", "Çınarcık", "Çiftlikköy", 
    "Merkez", "Termal"
];
break;

case "Yozgat": 
  var ilceler = [
    "Akdağmadeni", "Aydıncık", "Boğazlıyan", 
    "Çandır", "Çayıralan", "Çekerek", "Kadışehri", 
    "Merkez", "Saraykent", "Sarıkaya", "Sorgun", 
    "Şefaatli", "Yenifakılı", "Yerköy"
];
break;

case "Zonguldak": 
  var ilceler = [
    "Alaplı", "Çaycuma", "Devrek", "Gökçebey", 
    "Kilimli", "Merkez"
];





    break;
// Diğer illeri buraya ekleyebilirsiniz

                default:
                    var ilceler = [];
            }

            // İlçeleri select elementine ekliyoruz
            for (var i = 0; i < ilceler.length; i++) {
                var option = document.createElement("option");
                option.text = ilceler[i];
                option.value = ilceler[i];
                ilceSelect.appendChild(option);
            }
        }

        // Sayfa yüklendiğinde çalışacak olan fonksiyon
        window.onload = function () {
            var kalkis_il = document.getElementById("kalkis_il");
            var varis_il = document.getElementById("varis_il");
            var kalkis_ilce = document.getElementById("kalkis_ilce");
            var varis_ilce = document.getElementById("varis_ilce");

            // Kalkış il select elementine onchange event'i ekliyoruz
            kalkis_il.onchange = function () {
                updateIlceler(kalkis_il, kalkis_ilce);
            };

            // Varış il select elementine onchange event'i ekliyoruz
            varis_il.onchange = function () {
                updateIlceler(varis_il, varis_ilce);
            };

            // İlk yüklendiğinde ilçeleri yüklemek için çağırıyoruz
            updateIlceler(kalkis_il, kalkis_ilce);
            updateIlceler(varis_il, varis_ilce);
        };

        
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
