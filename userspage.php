<?php
session_start();
if(!$_SESSION['logged']){
    header("Location: loginpage.php");
    exit;
}
echo 'Welcome, '.$_SESSION['username'];
?> 