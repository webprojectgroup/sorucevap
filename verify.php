 <?php
if(isset($_POST['submit'])){
    $dbHost = "localhost";        //Location Of Database usually its localhost
    $dbUser = "root";            //Database User Name
    $dbPass = "";            //Database Password
    $dbDatabase = "soru_cevap";    //Database Name
    
    $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database.");
    //Connect to the databasse
    //mysqli_select_db($dbDatabase, $db)or die("Couldn't select the database.");
    //Selects the database
    
    /*
    The Above code can be in a different file, then you can place include'filename.php'; instead.
    */
    
    //Lets search the databse for the user name and password
    //Choose some sort of password encryption, I choose sha256
    //Password function (Not In all versions of MySQL).
    $usr = mysqli_real_escape_string($db,$_POST['username']);
    $pas = hash('sha256', mysqli_real_escape_string($db,$_POST['password']));
    $sql = mysqli_query($db,"SELECT * FROM deneme 
        WHERE uye_adi='$usr' AND
        sifre='PASSWORD($pas)'
        LIMIT 1");
    if(mysqli_num_rows($sql) == 1){
        $row = mysqli_fetch_array($db,$sql);
        session_start();
        $_SESSION['username'] = $row['uye_adi'];
        $_SESSION['fname'] = $row['ad'];
        $_SESSION['lname'] = $row['soyad'];
        $_SESSION['logged'] = TRUE;
        header("Location: userspage.php"); // Modify to go to the page you would like
        exit;
    }else{
        header("Location: loginpage.php");
        exit;
    }
}else{    //If the form button wasn't submitted go to the index page, or login page
    header("Location: index.php");    
    exit;
}
?> 