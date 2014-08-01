<?php

include("dbBaglan.php");


/*
$soruSayisi = $_POST['soruSayisi'];
$zorluk = $_POST['zorluk'];
$kategori = $_POST['kategori'];
*/
//süreyi zorluk derecesine , soru sayısına , kategorisine gore ayarlayacak fonksiyon
// aldıgı tablonun o kolonundaki en büyük değeri dondürenfonksiyon
//null donus engellenmeli
//donus tipi ve girdi tipi ayarlanmalı
function en_buyuk_deger($db_baglanti_degiskeni, $tablo_ismi, $kolon_ismi) {
    $sorgu = "SELECT MAX(" . $kolon_ismi . ") FROM " . $tablo_ismi;
    $sonuc = mysqli_query($db_baglanti_degiskeni, $sorgu);
    $satir = mysqli_fetch_array($sonuc);
    $en_buyuk_deger = $satir[0];
    return $en_buyuk_deger;
}

// aldıgı tablonun o kolonundaki en küçük değerini dondüren fonksiyon
//null donus engellenmeli
//donus tipi ve girdi tipi ayarlanmalı
function en_kucuk_deger($db_baglanti_degiskeni, $tablo_ismi, $kolon_ismi) {
    $sorgu = "SELECT MIN(" . $kolon_ismi . ") FROM " . $tablo_ismi;
    $sonuc = mysqli_query($db_baglanti_degiskeni, $sorgu);
    $satir = mysqli_fetch_array($sonuc);
    $en_kucuk_deger = $satir[0];
    return $en_kucuk_deger;
}

//aldıgı arrayde belli bir deger var mı yok mu onu dondurecek fonksiyon
//donus tipi ve girdi tipi ayarlanmalı
function arrayde_varmi($aranacak_deger, $array) {
    if (array_key_exists($array, $aranacak_deger)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

//veritabanında verilen kolonda aranacak deger in olup olmadıgını dondurecek fonksiyon
//girdi tipi ayarlanmalı
function bu_varmi($db_baglanti_degiskeni, $aranacak_deger, $tablo_ismi, $kolon_ismi) {
    $sorgu = "SELECT " . $kolon_ismi . " FROM " . $tablo_ismi . " WHERE " . $kolon_ismi . "='" . $aranacak_deger . "' LIMIT 1";
    $sonuc = mysqli_query($db_baglanti_degiskeni, $sorgu);
    $satir = mysqli_fetch_array($sonuc);

    if (isset($satir[0])) {
        return TRUE;
    } else {
        return FALSE;
    }
}

//aldıgı tablonun kolonundan istenen sayıda rastgele id degeri uretecek ve bunu array olarak döndürecek
//$istenen degerin buyuklugu ve sistemi yormamasının kontrolü yapılmalı
function rastgele_id($db_baglanti_degiskeni, $tablo_ismi, $kolon_ismi, $istenen_deger_sayisi) {
    $rastgele_idler = array();
    $min = en_kucuk_deger($db_baglanti_degiskeni, $tablo_ismi, $kolon_ismi);
    $max = en_buyuk_deger($db_baglanti_degiskeni, $tablo_ismi, $kolon_ismi);
    $sayac = 1;
    while ($sayac <= $istenen_deger_sayisi) {
        $rastgele_sayi = rand($min, $max); //id aralıgında rastgele sayı elde edildi
        if (bu_varmi($db_baglanti_degiskeni, $rastgele_sayi, $tablo_ismi, $kolon_ismi)) {

            if (!arrayde_varmi($rastgele_idler, $rastgele_sayi)) {
                $sayac = $sayac + 1;
                array_push($rastgele_idler, $rastgele_sayi);
            }
        } 
        else {
            
        }
    }

    return $rastgele_idler;
}
/*
foreach (rastgele_id($db_baglanti_durumu, "soru", "id", 3) as $value) {
    echo " " . $value . " ";
}
*/
 



//yukarıdaki satır döngü silinip sorular ve şıklar rastgele_idler arrayine göre çekilip ekrana bssılacak
?>
<?php

function soru_bas($db, $soru_id) {

    $sorgu1 = "SELECT soru FROM soru WHERE id='" . $soru_id . "'";
    $sonuc1 = mysqli_query($db, $sorgu1);
    $soru_satir = mysqli_fetch_array($sonuc1);
    $soru = $soru_satir['soru'];


    $sorgu2 = "SELECT id,dogru_mu,secenek FROM secenekler WHERE soru_fk='" . $soru_id . "' ORDER BY id";
    $sonuc2 = mysqli_query($db, $sorgu2);

    $secenekler = array();
    for ($i = 1; $i <= mysqli_num_rows($sonuc2); $i++) {
        //isset ile fetchin null dönmediğini kontrol et
        $secenek_satir = mysqli_fetch_array($sonuc2);
        array_push($secenekler, $secenek_satir['secenek']);
        if ($secenek_satir['dogru_mu']) {
            $dogru_cevap = $secenek_satir['secenek'];
        }
    }

    shuffle($secenekler);

    $sorgu3 = "SELECT AVG(begeni) FROM soru_puan WHERE soru_fk='" . $soru_id . "'";
    $sonuc3 = mysqli_query($db, $sorgu3);
    $begeni_satir = mysqli_fetch_array($sonuc3);
    $begeni = ($begeni_satir[0] * 100);
    
    
    ?>
<html>

    <body>

        <form method="post">
            Soru Metni:<?php echo "soru= " . $soru; ?><br/>




            <input type="radio" name="sec" value=0 /><?php echo "A) " . $secenekler["0"]; ?> <br/>


            <input type="radio" name="sec" value=1 /><?php echo "B) " . $secenekler["1"]; ?> <br/>


            <input type="radio" name="sec" value=2/><?php echo "C) " . $secenekler["2"]; ?>  <br/>


            <input type="radio" name="sec" value=3 /><?php echo "D) " . $secenekler["3"]; ?> <br/>


            <input type="radio" name="sec" value=4 /><?php echo "E) " . $secenekler["4"];


echo "<br/> begeni=% " . $begeni;
?> <br/>


            <input type="submit" name="submit" value="Kaydet" />
        </form>
    </body>
</html>



<?php 
if (strcmp((string) $secenekler[$_POST["sec"]], (string) $dogru_cevap) == 0) {//cevap do�ru ise
    echo "dogru";
}
else {//cevap yanl�� ise
    echo "yanlis";
}
        }


soru_bas($db_baglanti_durumu, 1);

?>


