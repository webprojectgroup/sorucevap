<?php
//mysql baglantisi acma
$db_host= "localhost";
$db_user= "root";
$db_password="";
$db_name="soru_cevap";


$db_connection_state=mysqli_connect ($db_host ,$db_user,$db_password,$db_name);

//hata olmasý durumu
if (!$db_connection_state){
	die("veritabanina baglanilamadi"  .mysqli_error() ) ; //die scripti sonlandirir
	}
	
else{print "baglanti basarili";}

?>