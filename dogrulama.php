 <html>
<body>
 <?php
 
if(isset($_POST['submit'])){
    include("dbBaglan.php");
    
    
    /*
    
    $dbHost = "localhost";        //Location Of Database usually its localhost
    $dbUser = "root";            //Database User Name
    $dbPass = "";            //Database Password
    $dbDatabase = "soru_cevap";    //Database Name
    
    $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); */
    //Connect to the databasse

    
    /*
    The Above code can be in a different file, then you can place include'filename.php'; instead.
    */
    
    //Lets search the databse for the user name and password
    //Choose some sort of password encryption, I choose sha256
    //Password function (Not In all versions of MySQL).
    $usr = mysqli_real_escape_string($db_baglanti_durumu,$_POST['uye_adi']);
    $pas = hash('md5', mysqli_real_escape_string($db_baglanti_durumu,$_POST['password']));
    $sql = mysqli_query($db_baglanti_durumu,"SELECT uye_adi,ad,soyad,sifre FROM deneme 
        WHERE uye_adi='$usr' AND
        sifre='$pas'
        LIMIT 1");


        
    if(mysqli_num_rows($sql) == 1){
        $row = mysqli_fetch_array($sql);
  
        session_start();
        $_SESSION['uye_adi'] = $row['uye_adi'];
        $_SESSION['fname'] = $row['ad'];
        $_SESSION['lname'] = $row['soyad'];
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