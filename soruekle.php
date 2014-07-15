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

/*  $sql = mysqli_query($db_baglanti_durumu,"SELECT uye_adi,ad,soyad,sifre FROM Uyeler 
        WHERE uye_adi='$uye_adi' AND
        sifre='$sif'
        LIMIT 1");
*/

$gecici=0;
$query=  "INSERT INTO soru(soru,ekleyen_fk,soru_kategori_fk,zorluk_derecesi_fk,onay) 
		VALUES ('" .$soru_texti ."','" .$ekleyen_fk ."','" .$_POST['kategori']  ."','" .$gecici ."','" .$onay ."')";

mysqli_query($db_baglanti_durumu,$query);
		
		
echo $query;

//mysqli_query($db_baglanti_durumu,"INSERT INTO soru (id,soru,ekleyen_fk,soru_kategori_fk,zorluk_derecesi_fk,onay) 
//		VALUES('$gecici','$soru_texti','$ekleyen_fk','$_POST['kategori']','$gecici,$onay')");


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

$query= "INSERT INTO secenekler(id,dogru_mu,secenek,soru_fk) 
		    VALUES ('" .$gecici ."','" . $dogru_mu1 ."','" .$_POST['secenek1'] ."','" .$gecici ."'),
		    ('" .$gecici ."','" . $dogru_mu2 ."','" .$_POST['secenek2'] ."','" .$gecici . "'),
		    ('" .$gecici ."','" . $dogru_mu3 ."','" .$_POST['secenek3'] ."','" .$gecici ."'),
		    ('" .$gecici ."','" . $dogru_mu4 ."','" .$_POST['secenek4'] ."','" .$gecici ."'),
		    ('" .$gecici ."','" . $dogru_mu5 ."','" .$_POST['secenek5'] ."','" .$gecici ."');";
mysqli_query($db_baglanti_durumu,$query);

//soru kategorileri tablosuna
//id
//kategori_ismi
//$query="INSERT INTO soru_kategorileri(id,kategori_ismi) 
//		    VALUES ('','')";
//mysqli_query($db_baglanti_durumu,$query);


?>