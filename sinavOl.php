<html>
<body>
<?php
include("dbBaglan.php");

//s�renin hesaplanmas�.

$soruSayisi=$_POST['soruSayisi'];
$zorluk=$_POST['zorluk'];
$kategori=$_POST['kategori'];

// ald�g� tablonun o kolonundaki en b�y�k de�eri dond�renfonksiyon
function en_buyuk_deger($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi){
$query= "SELECT MAX(".$kolon_ismi.") FROM " .$tablo_ismi ;
$sonuc=mysqli_query($db_baglanti_degiskeni,$query);
$satir=mysqli_fetch_array ($sonuc);
$en_buyuk_deger=$satir[0];
return $en_buyuk_deger;
}

// ald�g� tablonun o kolonundaki en k���k de�erini dond�ren fonksiyon
function en_kucuk_deger($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi){
$query= "SELECT MIN(".$kolon_ismi.") FROM ".$tablo_ismi;
$sonuc=mysqli_query($db_baglanti_degiskeni,$query);
$satir=mysqli_fetch_array ($sonuc);
$en_kucuk_deger=$satir[0];
return $en_kucuk_deger;
}

 
//ald�g� arrayde belli bir deger var m� yok mu onu dondurecek fonksiyon
function arrayde_varmi($aranacak_deger,$array ){
if(array_key_exists($array,$aranacak_deger)){return TRUE;}
else{return FALSE;}

}


//veritaban�nda verilen kolonda aranacak deger in olup olmad�g�n� dondurecek fonksiyon
function bu_varmi($db_baglanti_degiskeni,$aranacak_deger,$tablo_ismi,$kolon_ismi){
$sorgu="SELECT ".$kolon_ismi ." FROM ".$tablo_ismi. " WHERE ".$kolon_ismi."='".$aranacak_deger ."' LIMIT 1" ;
$sonuc=mysqli_query($db_baglanti_degiskeni,$sorgu);
$satir=mysqli_fetch_array ($sonuc);

if( isset($satir[0])){return TRUE;}
else{return FALSE;}

}
//ald�g� tablonun kolonundan istenen say�da rastgele id degeri uretecek ve bunu array olarak d�nd�recek
function rastgele_id($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi,$istenen_deger_sayisi){
$rastgele_idler=array();
$min=en_kucuk_deger($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi);
$max=en_buyuk_deger($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi);
$counter=1;
while($counter<=$istenen_deger_sayisi){
$rastgele_sayi=rand($min,$max); //id aral�g�nda rastgele say� elde edildi
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