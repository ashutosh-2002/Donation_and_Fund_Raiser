<?php
    $insert = false;

    if(isset($_POST['daadhar']))
    {
        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password);

        if(!$con)
        {
            die("connection to this database failed due to" . mysqli_connect_error());
        }

        $daadhar = $_POST['daadhar'];
        $dname = $_POST['dname'];
        $dMNo = $_POST['dMNo'];
        $daddress = $_POST['daddress'];
        $receiver = $_POST['receiver'];
        $damount = $_POST['damount'];
        $gdrive = $_POST['gdrive'];

        $sql =" INSERT INTO `donation fund raiser`.`don` ( `Aadhar Number`, `Name`, `Mobile Number`, `Address`, `Receiver Aadhar`, `Amount donating`, `Google Drive Link of Photo of Donation`, `DATE & TIME`)
        VALUES ( '$daadhar', '$dname', '$dMNo', '$daddress', '$receiver', '$damount', '$gdrive', current_timestamp());";

        if($con->query($sql) == true)
        {
            echo "<span style='color:green;'>Thanks! for the donation.&#129309;<br> Once you're transaction is verified it will be updated it on the Donor's list.</span>";
            $insert = true;
        }
        else
        {
            echo "ERROR: $sql <br> $con->error";
            echo '<br>&#10060;&#10060;&#10060;&#10060;';
        }

        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>DFR | Donor Registration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    .register
    {
        background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0GeEn3vCbvtgk7FxMW4zpTA2NF8aMp2suKQ&usqp=CAU"),url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0GeEn3vCbvtgk7FxMW4zpTA2NF8aMp2suKQ&usqp=CAU");
        background-position: left,right;
        background-repeat: no-repeat,no-repeat;
        background-size: 40% 100%,40% 100%;
        color: black;
    }
</style>

<body>
    <div id="title">
        Donation and Fund Raiser
    </div>

    <div id="nav">
        <a href="index.html" class="move"> Home </a>
        <a href="admin.php" class="move"> Admin </a>
        <a href="receiver.php" class="move"> Receiver Registration </a>
        <a href="donor.php" class="move" id="current"> Donor Registration </a>
        <a href="receiverList.php" class="move"> Receiver List </a>
        <a href="donorList.php" class="move"> Donor List </a>
        <a href="contact.html" class="move"> Contact Us </a>
    </div>

    <div class="register">
        <form action="donor.php" method="post" style="margin:0px padding:0px;">
            Aadhar Number : <br>
            <input type="text" name="daadhar" placeholder="Enter Your Aadhar Number" class="input" id="daadhar"> <br>
            <br>
            Name : <br>
            <input type="text" name="dname" placeholder="Enter Your Name" class="input" id="dname"> <br> <br>
            Mobile Number : <br>
            <input type="text" name="dMNo" placeholder="Enter Your Mobile Number" class="input" id="dMNo"> <br> <br>
            Address : <br>
            <input type="text" name="daddress" placeholder="Enter Your Address" class="input" id="daddress"> <br> <br>
            Receiver : <br>
            <input type="text" name="receiver" placeholder="Enter Receiver Aadhar Number" class="input" id="receiver">
            <br> <br>
            Amount donating : <br>
            <input type="text" name="damount" placeholder="Enter Your Amount" class="input" id="damount"> <br> <br>
            Google Drive Link of Photo of Donation : <br>
            <input type="text" name="gdrive" placeholder="Enter Google Drive Link" class="input" id="gdrive"> <br> <br>
            <button class="btn">Submit</button>
        </form>
    </div>


    <div id="footer">
        <footer>
            <p id="footer-text"> Copyright &#169; to DFR - IIITDMJ </p>
        </footer>
    </div>
    
</body>

</html>