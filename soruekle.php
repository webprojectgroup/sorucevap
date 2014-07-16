<?php
include("dbBaglan.php");
include("soruEkleForm.php");
 //include(""); session bilgisi için kullanýlacak dosya

$soru_texti=$_POST['soru_texti'];
$secenek1=$_POST['secenek1'];
$secenek2=$_POST['secenek2'];
$secenek3=$_POST['secenek3'];
$secenek4=$_POST['secenek4'];
$sec=$_POST['sec'];

//$kategori_ismi=$_POST['kategori']; yanlýþ

$zorluk = $_POST['zorluk'];

$onay= 1;

//soru tablosuna
//ekleyen_fk
//soru_kategori_fk
//zorluk_derecesi fk

//soru tablosuna
//$ekleyen_fk=$_SESSION['uye_id'];
$ekleyen_fk=1;

//$zorluk_derecesi_fk=$_SESSION['views'];

$gecici=0;
$query=  "INSERT INTO soru(soru,ekleyen_fk,soru_kategori_fk,zorluk_derecesi_fk,onay) 
		VALUES ('" .$soru_texti ."','" .$ekleyen_fk ."','" .$_POST['kategori']  ."','" .$gecici ."','" .$onay ."')";

mysqli_query($db_baglanti_durumu,$query);

echo "sorgu=" ."mysqli_query(SELECT id,soru FROM soru WHERE soru=".$soru_texti );
//$row=mysqli_fetch_array(mysqli_query(SELECT id,soru FROM soru WHERE soru=$soru_texti ));


	echo "sorunun idsi=" .$row['id'];			
echo $query;

//secenekler tablosuna
//id
//dogru_mu
//secenek
//soru_fk
switch($_POST['sec'])
{
case 1:
$dogru_mu1=1;
$dogru_mu2=0;
$dogru_mu3=0;
$dogru_mu4=0;
$dogru_mu5=0;

break;
case 2:
$dogru_mu1=0;
$dogru_mu2=1;
$dogru_mu3=0;
$dogru_mu4=0;
$dogru_mu5=0;


break;
case 3:
$dogru_mu1=0;
$dogru_mu2=0;
$dogru_mu3=1;
$dogru_mu4=0;
$dogru_mu5=0;

break;
case 4:
$dogru_mu1=0;
$dogru_mu2=0;
$dogru_mu3=0;
$dogru_mu4=1;
$dogru_mu5=0;

break;
case 5:
$dogru_mu1=0;
$dogru_mu2=0;
$dogru_mu3=0;
$dogru_mu4=0;
$dogru_mu5=1;

break;
}

$query= "INSERT INTO secenekler(dogru_mu,secenek,soru_fk) 
	     VALUES ('" . $dogru_mu1 ."','" .$_POST['secenek1'] ."','" .$gecici ."'),
		    ('" . $dogru_mu2 ."','" .$_POST['secenek2'] ."','" .$gecici ."'),
		    ('" . $dogru_mu3 ."','" .$_POST['secenek3'] ."','" .$gecici ."'),
		    ('" . $dogru_mu4 ."','" .$_POST['secenek4'] ."','" .$gecici ."'),
		    ('" . $dogru_mu5 ."','" .$_POST['secenek5'] ."','" .$gecici ."');";
mysqli_query($db_baglanti_durumu,$query);

//soru kategorileri tablosundan
//id
//kategori_ismi
//cekilerek soru kategorisifk ona gore alýnýp id degeri oraya basýlacak

?>