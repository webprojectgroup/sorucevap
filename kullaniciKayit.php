<html>
<body>


<?php
include("kayitForm.php");

if(isset($_POST['submit'])){
    # connect to the database here
    include("dbBaglan.php");
    

    
    # search the database to see if the user name has been taken or not
    $query = sprintf("SELECT uye_adi FROM deneme WHERE uye_adi='%s' LIMIT 1",mysqli_real_escape_string($db_baglanti_durumu,$_POST['uye_adi']));
    $sql = mysqli_query($db_baglanti_durumu,$query);
    $row = mysqli_fetch_array($db_baglanti_durumu,$sql);
    #check too see what fields have been left empty, and if the passwords match
    if($row||empty($_POST['uye_adi'])|| empty($_POST['ad'])||empty($_POST['soyad'])|| empty($_POST['eposta'])||empty($_POST['password'])|| empty($_POST['re_password'])||$_POST['password']!=$_POST['re_password']){
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
        if(empty($_POST['password'])){
            $error .= 'Parola bos gecilemez<br>';
        }
        if(empty($_POST['re_password'])){
            $error .= 'Parolani yeniden yazmalisin<br>';
        }
        if($_POST['password']!=$_POST['re_password']){
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

        $query = sprintf("INSERT INTO deneme (uye_adi,ad,soyad,eposta,sifre)
					VALUES('%s','%s','%s','%s',MD5('%s'))",
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['uye_adi']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['ad']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['soyad']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['eposta']),
            mysqli_real_escape_string($db_baglanti_durumu,$_POST['password']))or die(mysqli_error());
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

echo "çeko";
header("Location: kayitForm.php");
  ?>
<!-- Start your HTML/CSS/JavaScript here -->


 
  


</body>
</html>