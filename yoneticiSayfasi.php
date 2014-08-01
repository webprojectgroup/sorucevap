<?php
include 'dbBaglan.php';
/*
// yeni eklenen soruları onaylama gerekirse duzenleme
function soru_düzenle($db, $soru_id) {
    
    $sorgu1 = "SELECT * FROM soru WHERE soru.id='".$soru_id."'";
    $sonuc1 = mysqli_query($db, $sorgu1);
    $soru_eski_satir = mysqli_fetch_array($sonuc1);

    $sorgu2 = "SELECT * FROM secenekler WHERE soru_fk='" . $soru_id . "'";
    $sonuc2 = mysqli_query($db, $sorgu2);
    $sonuc_sayisi=  mysqli_num_rows($sonuc2);
 /*   for ($i=1;i<=$sonuc_sayisi;i++){
    $secenek_array[] = mysqli_fetch_array($sonuc);}*/
    //eski degerleri forma bas submit edilenlerle guncelle
/*
    $sorgu3 = "SELECT * FROM zorluk_derecesi WHERE id='" . $soru_eski_satir["zorluk_derecesi_fk"] . "'";
    $sonuc3 = mysqli_query($db, $sorgu3);
    $zorluk_eski_satir = mysqli_fetch_array($sonuc3);
    
    $sorgu4 = "SELECT * FROM soru_kategorileri WHERE id='" . $soru_eski_satir["soru_kategori_fk"] . "'";
    $sonuc4 = mysqli_query($db, $sorgu4);
    $kategori_eski_satir = mysqli_fetch_array($sonuc4);
    
    print_r ($soru_eski_satir);
    
    ?>
    <form action = "#" method = "post">
            
    Soru Metni:<br /> <textarea name = "soru_texti" rows = "13" cols = "44"   /><?php echo $soru_eski_satir[2]; ?> </textarea><br /><br />

    <input type = "radio" name = "sec" selected value = 1 />
    secenek1: <input type = "text" name = "secenek1" value= <?php echo $secenek_eski_satir["secenek"]; ?> /> <br /><br />

    <input type = "radio" name = "sec" value = 2 />
    secenek2: <input type = "text" name = "secenek2" value= <?php //$secenek_eski_satir ?> /> <br /><br />

    <input type = "radio" name = "sec" value = 3 />
    secenek3: <input type = "text" name = "secenek3" value= <?php //$secenek_eski_satir ?> /> <br /><br />

    <input type = "radio" name = "sec" value = 4/>
    secenek4: <input type = "text" name = "secenek4" value= <?php //$secenek_eski_satir ?> /> <br /><br />

    <input type = "radio" name = "sec" value = 5 />
    secenek5: <input type = "text" name = "secenek5" value= <?php //$secenek_eski_satir ?> /> <br /><br />
    Su anki zorluk derecesi : <?php echo $zorluk_eski_satir["zorluk"]; ?><br />
    zorluk derecesi:
    <select name = "zorluk"  >
    <option value = 1>1</option>
    <option value = 2>2</option>
    <option value = 3>3</option>
    <option value = 4>4</option>
    <option value = 5>5</option>
    </select>
    
   Su anki kategori :  <?php echo $kategori_eski_satir["kategori_ismi"]; ?> <br />
    
    sorunun kategorisi: <select name = "kategori" value= <?php echo $kategori_eski_satir["id"]; ?> >
    <option value = 1>Matematik</option>
    <option value = 2>Fen</option>
    <option value = 3>Kimya</option>
    <option value = 4>Biyoloji</option>
    <option value = 5>Türkçe</option>
    </select>
    <br />
    Suanki Onay durumu: <?php if($soru_eski_satir["onay"]) {echo "onaylanmis" ;} else {echo "onaylanmamis" ;} ?>
    <br />
    <select name = "onay" >
    <option value = 0>onaylanmadi</option>
    <option value = 1>onaylandi</option>
    </select>



    <input type = "submit" name = "submit" value = "Kaydet" />
    </form>
    <?php
    echo $soru_texti;
    
    /*
    $sorgu1="UPDATE soru SET soru='" .$_POST[""]."' , onay='".$_POST[""]. "' , soru_kategori_fk='".$_POST[""]. "' ,
                    
                                                    zorluk_derecesi_fk='".$_POST[""]. "WHERE id='".$_POST[""]."'";
    
    $sorgu2="UPDATE secenekler SET dogru_mu='" .$_POST[""]."' , secenek='".$_POST[""]."' WHERE id='".$_POST[""]."'";
    mysqli_query($db, $sorgu1);
    mysqli_query($db, $sorgu2);
     * 
     
}
soru_düzenle($db_baglanti_durumu, 1);
*/

function soru_onayla($db, $soru_id) {
    $sorgu = "SELECT ";
}

//onay kolonu 0 olan soruları bul ekrana bas,form aracılıgıyla onayla sonra tekrar bak ve
// sil seceneklerinden birini sec gerekli işlemleri yap
// yeni uyeleri ve rollerini onaylama
function yeni_uye_onayla($db, $uye_id) {
    
}

//kullanıcı kayıt sayfasından burayı tetiklemeliyiz.

function uye_duzenle($db, $uye_id) {
    
    $sorgu1 = "SELECT * FROM uyeler WHERE id='" . $uye_id . "'";
    $sonuc1 = mysqli_query($db, $sorgu1);
    $uyeler_eski_satir = mysqli_fetch_array($sonuc1);
    $sorgu2="SELECT * FROM rol WHERE id='".$uyeler_eski_satir["rol_fk"]."'";
    $sonuc2 = mysqli_query($db, $sorgu2);
    $rol_eski_satir=mysqli_fetch_array($sonuc2);

    //eski degerleri forma bas sonra submit edilenleri asagıdaki seklde güncelle
  ?>
    <form action = "#" method = "post">
            
    <p>Nickname: <br /> <input type = "text" name = "uye_adi" value= <?php  echo $uyeler_eski_satir["uye_adi"];  ?> /></p>
    <p>Ad:       <br /> <input type = "text" name = "ad" value= <?php  echo $uyeler_eski_satir ["ad"]; ?> />          </p>
    <p>Soyad: <br /> <input type = "text" name = "soyad" value= <?php  echo $uyeler_eski_satir ["soyad"]; ?> /></p>
    Su anki rol : <?php echo $rol_eski_satir["rol_ismi"]; ?>
    Seciniz: <select name = "rol_fk" >
    <option selected value = 1>ogrenci</option>
    <option value = 2>ogretmen</option>
    </select>
    <p>Email: <br /> <input type = "text" name = "eposta" value= <?php  echo $uyeler_eski_satir["eposta"];  ?> /></p>
    <p>cep telefonu:<br /> <input type = "text" name = "cep_tel" value= <?php  echo $uyeler_eski_satir["cep_tel"];  ?> /></p>
    <p>Dogum tarihi:<br /> <input type = "date" name = "dogum_tarihi" value= <?php  echo $uyeler_eski_satir["dogum_tarihi"];  ?> /></p>
    
    
    <p><input type = "submit" name = "submit" value = "Kaydet" /></p>


    </form >
    <?php
            $sorgu = "UPDATE uyeler SET ad= '".$_POST["ad"]."' , aktif_mi='".$_POST[""]."' , cep_tel='".$_POST["cep_tel"]."' , dogum_tarihi='".$_POST["dogum_tarihi"]."' , 
                                        eposta='".$_POST["eposta"]."' , id='".$_POST[""]."' , onay_kodu='".$_POST[""]."' , rol_fk='".$_POST["rol_fk"]."' , 
                                        sifre='".$_POST[""]."' , soyad='".$_POST["soyad"]."' , uye_adi='".$_POST["uye_adi"]."' WHERE id=123 ";
    $sonuc = mysqli_query($db, $sorgu);
    
}
uye_duzenle($db_baglanti_durumu, 55);

?>
<?php
/*
  //ıstenen uyenın rolunu degıstırme veya askıya alma
  function rol_degistir($db, $uye_id) {
  $sorgu="SELECT rol_fk FROM uyeler WHERE id='".$uye_id."'";
  $sonuc=  mysqli_query($db, $sorgu);
  $rol_satir=  mysqli_fetch_array($sonuc);

  } */

//kullanıcı ismine , adı soyadına göre arama yapıp sonuclar içinden gerekeni işaretleme secenegı sunacak, veritabanında gerekli
// yerler değiştirecek fonksiyon
//arama bilgileri form ile alınacak , doldurulan kutulara göre arama yapacak, sonucları ekrana basıp tekrar secım yaptıracak.

/*
function uye_bul() {
    $uye_id
    $uye_adi
    $ad
    $soyad
    //form ile arama bilgisi al 
}
*/
?>

    
    