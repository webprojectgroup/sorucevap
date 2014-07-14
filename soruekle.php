<?php
include("dbBaglan.php");
include("soruekleform.php");
 //include(""); login bilgisi için kullanýlacak dosya

$soru_texti=$_POST["soru_texti"];
$secenek1=$_POST["secenek1"];
$secenek2=$_POST["secenek2"];
$secenek3=$_POST["secenek3"];
$secenek4=$_POST["secenek3"];
$sec=$_POST["sec"];
$kategori=$_POST["kategori"];
$zorluk=$_POST["zorluk"];
$onay=FALSE;

//soru tablosuna
//ekeleyen fk
//soru kategori fk
//zorluk derecesi fk

//soru tablosuna
$ekleyen_fk=$_SESSION['uye_id'];
//$soru_kategori_fk=$_SESSION['views'];
//$zorluk_derecesi_fk=$_SESSION['views'];

$query="INSERT INTO soru(ekleyen_fk,soru_kategori_fk,zorluk_derecesi_fk) 
		    VALUES ('','','','')";
mysqli_query($db_baglanti_durumu,$query);


//secenekler tablosuna
//id
//dogru_mu
//secenek
//soru_fk
$query="INSERT INTO secenekler(id,dogru_mu,secenek,soru_fk) 
		    VALUES ('','','','')";
mysqli_query($db_baglanti_durumu,$query);

//soru kategorileri tablosuna
//id
//kategori_ismi
$query="INSERT INTO soru_kategorileri(id,kategori_ismi) 
		    VALUES ('','','','')";
mysqli_query($db_baglanti_durumu,$query);


//$query="INSERT INTO tablo_ismi(kolonismi66,kolon_ismi1,kolon_ismi55,kolon_ismi77) VALUES ('66ya_girilecek_deðer','1e','55e','77ye'";
//mysqli_query($db_connection_state,$query);






?>