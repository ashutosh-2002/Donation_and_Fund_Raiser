
<?php 
session_start(); 
session_unset(); 
session_destroy(); 
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DFR | Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">


</head>


<body>
    <div id="title">
        Donation and Fund Raiser
    </div>

    <div id="nav">
        <a href="index.html" class="move"> Home </a>
        <a href="admin.php" class="move" id="current"> Admin </a>
        <a href="receiver.php" class="move"> Receiver Registration </a>
        <a href="donor.php" class="move"> Donor Registration </a>
        <a href="receiverList.php" class="move"> Receiver List </a>
        <a href="donorList.php" class="move"> Donor List </a>
        <a href="contact.html" class="move"> Contact Us </a>
    </div>

    <div id="login" class="background">
        <form action="admincheck.php" method="post">
        <br><br><br><br>
            Username :
            <input type="text" name="uname" placeholder="Enter Your Username" class="input"> <br> <br>
            Password :
            <input type="password" name="pass" placeholder="Enter Your Password" class="input"> <br> <br>
            <input type="submit" name="submit" value ="Login" class="submit btn">
            <br><br><br><br><br><br><br>

        </form>
    </div>

    <div id="footer">
        <footer>
            <p id="footer-text"> Copyright &#169; to DFR - IIITDMJ </p>
        </footer>
    </div>

</body>

</html>