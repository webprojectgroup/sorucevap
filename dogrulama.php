 <html>
<body>
 <?php
 
if(isset($_POST['submit'])){
//Connect to the databasse
    include("dbBaglan.php");
    
    //Lets search the databse for the user name and password

    $uye_adi = mysqli_real_escape_string($db_baglanti_durumu,$_POST['uye_adi']);
    $sif = hash('md5', mysqli_real_escape_string($db_baglanti_durumu,$_POST['sifre']));
    $sql = mysqli_query($db_baglanti_durumu,"SELECT uye_adi,ad,soyad,sifre FROM Uyeler 
        WHERE uye_adi='$uye_adi' AND sifre='$sif' LIMIT 1");

        
    if(mysqli_num_rows($sql) == 1){
        $row = mysqli_fetch_array($sql);
  
        session_start();
        $_SESSION['uye_adi'] = $row['uye_adi'];
        $_SESSION['ad'] = $row['ad'];
        $_SESSION['soyad'] = $row['soyad'];
        $_SESSION['logged'] = TRUE;
        header("Location: userspage.php"); // Modify to go to the page you would like
        exit;
    }else{
        header("Location: loginSayfasi.php");
        exit;
    }
}else{    //If the form button wasn't submitted go to the index page, or login page
    header("Location: index.php");    
    exit;
}
?> 

</body>
</html>