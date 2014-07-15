<html>
<body>


<?php
include("kayitForm.php");

if(isset($_POST['submit'])){
    # connect to the database here
    include("dbBaglan.php");
    

    
    # search the database to see if the user name has been taken or not
    $query = sprintf("SELECT uye_adi FROM Uyeler WHERE uye_adi='%s' LIMIT 1",mysqli_real_escape_string($db_baglanti_durumu,$_POST['uye_adi']));
    $sql = mysqli_query($db_baglanti_durumu,$query);
    $row = mysqli_fetch_array($db_baglanti_durumu,$sql);
    #check too see what fields have been left empty, and if the passwords match
    if($row||empty($_POST['uye_adi'])|| empty($_POST['ad'])||empty($_POST['soyad'])|| empty($_POST['eposta'])||empty($_POST['sifre'])|| empty($_POST['sifre_yeniden'])||$_POST['sifre']!=$_POST['sifre_yeniden']){
        # if a field is empty, or the passwords don't match make a message
        $error = '<p>';
        if(empty($_POST['uye_adi'])){
            $error .= 'Kullanici adi bos gecilemez<br>';
        }
        if(empty($_POST['ad'])){
            $error .= 'Isim bos gecilemez<br>';
        }
        if(empty($_POST['soyad'])){
            $error .= 'Soyad bos gecilemez<br>';
        }
        if(empty($_POST['eposta'])){
            $error .= 'Eposta bos gecilemez<br>';
        }
        if(empty($_POST['sifre'])){
            $error .= 'Parola bos gecilemez<br>';
        }
        if(empty($_POST['sifre_yeniden'])){
            $error .= 'Parolani yeniden yazmalisin<br>';
        }
        if($_POST['sifre']!=$_POST['sifre_yeniden']){
            $error .= 'Parolalar eslesmedi<br>';
        }
        if($row){
            $error .= 'Kullanici ismi zaten var<br>';
        }
        $error .= '</p>';
    }
    else{
        # If all fields are not empty, and the passwords match,
        # create a session, and session variables,

        $query = sprintf("INSERT INTO Uyeler (uye_adi,ad,soyad,eposta,sifre,cep_tel,dogum_tarihi,rol_fk,onay_kodu)
					VALUES('%s','%s','%s','%s',MD5('%s'),'%s','%s','%s','%s')",
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['uye_adi']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['ad']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['soyad']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['eposta']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['sifre']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['cep_tel']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['dogum_tarihi']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['rol_fk']),
            rand()
            
            )or die(mysqli_error());
        $sql = mysqli_query($db_baglanti_durumu,$query);
        # Redirect the user to a login page
        header("Location: login.php");
        exit;
    }
}
# echo out each variable that was set from above,
# then destroy the variable.
if(isset($error)){
    echo $error;
    unset($error);
}

//üyeligin son adýmý olarak kullanýcýya dogrulama maili gönderme (rastgele fonksiyonla üretilen sayýnýn md5 hashinin alýnmasýyla oluþan string mailolarak gönderilecek)
//mailden gelen hash ile onay kodu kýsmýndaki degerin hash kodunun karsýlastýrýlmasý ve ona gore kaydýn tamamlanmasý

header("Location: kayitForm.php");
  ?>
<!-- Start your HTML/CSS/JavaScript here -->


 
  


</body>
</html>