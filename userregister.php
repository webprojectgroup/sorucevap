<html>
<body>


<?php
include("registerform.php");

if(isset($_POST['submit'])){
    # connect to the database here
    include("connectToDB.php");
    

    
    # search the database to see if the user name has been taken or not
    $query = sprintf("SELECT uye_adi FROM deneme WHERE uye_adi='%s' LIMIT 1",mysqli_real_escape_string($db_connection_state,$_POST['user_name']));
    $sql = mysqli_query($db_connection_state,$query);
    $row = mysqli_fetch_array($db_connection_state,$sql);
    #check too see what fields have been left empty, and if the passwords match
    if($row||empty($_POST['user_name'])|| empty($_POST['fname'])||empty($_POST['lname'])|| empty($_POST['email'])||empty($_POST['password'])|| empty($_POST['re_password'])||$_POST['password']!=$_POST['re_password']){
        # if a field is empty, or the passwords don't match make a message
        $error = '<p>';
        if(empty($_POST['user_name'])){
            $error .= 'User Name can\'t be empty<br>';
        }
        if(empty($_POST['fname'])){
            $error .= 'First Name can\'t be empty<br>';
        }
        if(empty($_POST['lname'])){
            $error .= 'Last Name can\'t be empty<br>';
        }
        if(empty($_POST['email'])){
            $error .= 'Email can\'t be empty<br>';
        }
        if(empty($_POST['password'])){
            $error .= 'Password can\'t be empty<br>';
        }
        if(empty($_POST['re_password'])){
            $error .= 'You must re-type your password<br>';
        }
        if($_POST['password']!=$_POST['re_password']){
            $error .= 'Passwords don\'t match<br>';
        }
        if($row){
            $error .= 'User Name already exists<br>';
        }
        $error .= '</p>';
    }
    else{
        # If all fields are not empty, and the passwords match,
        # create a session, and session variables,

        $query = sprintf("INSERT INTO deneme (uye_adi,ad,soyad,eposta,sifre)
            VALUES('%s','%s','%s','%s',PASSWORD('%s'))",
            mysqli_real_escape_string($db_connection_state,$_POST['user_name']),
            mysqli_real_escape_string($db_connection_state,$_POST['fname']),
            mysqli_real_escape_string($db_connection_state,$_POST['lname']),
            mysqli_real_escape_string($db_connection_state,$_POST['email']),
            mysqli_real_escape_string($db_connection_state,$_POST['password']))or die(mysqli_error());
        $sql = mysqli_query($db_connection_state,$query);
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
header("Location: registerform.php");
  ?>
<!-- Start your HTML/CSS/JavaScript here -->


 
  


</body>
</html>