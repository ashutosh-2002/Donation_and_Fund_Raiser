<?php 
if ($_POST['submit'] == 'Login')
{ 
    $login = $_POST['uname']; 
    $password = $_POST['pass'];

    if($login && $password)
    { 
        if($login == 'dfr' && $password =='12345')
        { 
            $count = 1; 
        } 
        else
        { 
            include('admin.php'); 
            echo '<center>Incorrect Username or Password !!!<center>';
            exit(); 
        } 

        if( $count == 1)
        { 
            session_start(); 
            $_SESSION['IS_AUTHENTICATED'] = 1; 
            header('location:adminPage.php'); 
        } 
        else
        { 
            include('admin.php'); 
            echo '<center>Incorrect Username or Password !!!<center>'; 
            exit(); 
        } 
    } 
    else
    { 
        include('admin.php'); 
        echo '<center>Username or Password missing!!</center>'; 
        exit(); 
    } 
} 
else
{ 
    header("location: admin.php"); 
    exit(); 
} 
?>
