<html>
<body>
<?php
include("dbBaglan.php");

//s�renin hesaplanmas�

$soruSayisi=$_POST['soruSayisi'];
$zorluk=$_POST['zorluk'];
$kategori=$_POST['kategori'];

function en_buyuk_deger($db_baglanti_degiskeni,$tablo_ismi,$kolon_ismi){
$sql = mysqli_query($db_baglanti_degiskeni,"SELECT $kolon_ismi FROM $tablo_ismi ORDER BY $kolon_ismi DESC LIMIT 1 ;");
$satir = mysqli_fetch_array($sql); 
$en_buyuk_deger=$satir['kolon_ismi'];

}
function arrayde_varmi($array, $aranacak_deger){}
function bu_id_varmi($db_baglanti_degiskeni,$aranacak_deger,$tablo_ismi,$kolon_ismi){}


$i=1;

$onaylanan_id=array("1");

while ($i<=$soruSayisi){

	$rastgele_sayi=rand(1,$en_buyuk_id);

	$query="SELECT id FROM soru WHERE id=" .$rastgele_sayi;
	
	$sql=mysqli_query($db_baglanti_durumu,$query);

	echo "uretilen sayi" .$rastgele_sayi ."<br/>" ; 

	if(mysqli_num_rows($sql)==1){
	$counter=1;
	while($counter<=count($onaylanan_id)){
	$onaylanan[$counter]
	if
		$i=$i+1;
		array_push($onaylanan_id,$rastgele_sayi);
	}
	echo "onaylanan". ($i-1)."<br/>";

}
		
				    }				   
				   foreach ($onaylanan_id as $value) { print " " . $value . " ";}
echo $onaylanan_id [6];
?>

</body>
</html>