<html>
<body>
<?php
include("dbBaglan.php");

//sürenin hesaplanmasý.

$soruSayisi=$_POST['soruSayisi'];
$zorluk=$_POST['zorluk'];
$kategori=$_POST['kategori'];

// aldýgý tablonun o kolonundaki en büyük deðeri dondürenfonksiyon
function en_buyuk_deger($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi){
$query= "SELECT MAX(".$kolon_ismi.") FROM " .$tablo_ismi ;
$sonuc=mysqli_query($db_baglanti_degiskeni,$query);
$satir=mysqli_fetch_array ($sonuc);
$en_buyuk_deger=$satir[0];
return $en_buyuk_deger;
}

// aldýgý tablonun o kolonundaki en küçük deðerini dondüren fonksiyon
function en_kucuk_deger($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi){
$query= "SELECT MIN(".$kolon_ismi.") FROM ".$tablo_ismi;
$sonuc=mysqli_query($db_baglanti_degiskeni,$query);
$satir=mysqli_fetch_array ($sonuc);
$en_kucuk_deger=$satir[0];
return $en_kucuk_deger;
}

 
//aldýgý arrayde belli bir deger var mý yok mu onu dondurecek fonksiyon
function arrayde_varmi($aranacak_deger,$array ){
if(array_key_exists($array,$aranacak_deger)){return TRUE;}
else{return FALSE;}

}


//veritabanýnda verilen kolonda aranacak deger in olup olmadýgýný dondurecek fonksiyon
function bu_varmi($db_baglanti_degiskeni,$aranacak_deger,$tablo_ismi,$kolon_ismi){
$sorgu="SELECT ".$kolon_ismi ." FROM ".$tablo_ismi. " WHERE ".$kolon_ismi."='".$aranacak_deger ."' LIMIT 1" ;
$sonuc=mysqli_query($db_baglanti_degiskeni,$sorgu);
$satir=mysqli_fetch_array ($sonuc);

if( isset($satir[0])){return TRUE;}
else{return FALSE;}

}
//aldýgý tablonun kolonundan istenen sayýda rastgele id degeri uretecek ve bunu array olarak döndürecek
function rastgele_id($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi,$istenen_deger_sayisi){
$rastgele_idler=array();
$min=en_kucuk_deger($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi);
$max=en_buyuk_deger($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi);
$counter=1;
while($counter<=$istenen_deger_sayisi){
$rastgele_sayi=rand($min,$max); //id aralýgýnda rastgele sayý elde edildi
if (bu_varmi($db_baglanti_degiskeni,$rastgele_sayi,$tablo_ismi,$kolon_ismi)){

if(!arrayde_varmi($rastgele_idler,$rastgele_sayi)){
$counter=$counter+1;
array_push($rastgele_idler,$rastgele_sayi);
}
}

else{}

}

return $rastgele_idler;
}
 foreach (rastgele_id($db_baglanti_durumu,"soru","id",3) as $value){echo " ". $value ." ";}

?>

</body>
</html>