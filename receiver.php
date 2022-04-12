<?php 
    $insert = false;

    if(isset($_POST['raadhar']))
    {
        $server = "localhost";
        $username = "root";
        $password = "";
        $con = mysqli_connect($server, $username, $password);

        if(!$con)
        {
            die("connection to this database failed due to" . mysqli_connect_error());
        }

        $raadhar= $_POST['raadhar'];
        $rname= $_POST['rname'];
        $rMNo= $_POST['rMNo'];
        $raddress= $_POST['raddress'];
        $task= $_POST['task'];
        $amountNeeded= $_POST['amountNeeded'];
        $bname= $_POST['bname'];
        $accno= $_POST['accno'];
        $ifsc= $_POST['ifsc'];

        $sql = "INSERT INTO `donation fund raiser`.`rec` (`Aadhar Number`, `Name`, `Mobile Number`, `Address`, `Task`, `Amount needed`, `Bank name`, `Account no.`, `IFSC`, `DATE & TIME`) 
        VALUES ( '$raadhar', '$rname', '$rMNo', '$raddress', '$task', '$amountNeeded', '$bname', '$accno', '$ifsc', current_timestamp());";

        if($con->query($sql) == true)
        {
            echo "<span style='color:green;'>You have successfully registered for becoming a receiver. If you have a genuine request, it will be updated on the receiver's table. <br>
            &#129310;HOPE FOR THE BEST!&#129310;</span>";
            
            $insert = true;
        }
        else
        {
            echo "INVALID REQUEST !!!!";
            echo '<br>&#10060;&#10060;&#10060;&#10060;';
        }

        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>DFR | Receiver Registration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    .register
    {
        color: black;
        background-image: url(data:image/jpeg;base64,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);
        background-repeat: no-repeat;
        background-size: 100%100%;
    }
 </style>

<body>
    <div id="title">
        Donation and Fund Raiser
    </div>

    <div id="nav">
        <a href="index.html" class="move"> Home </a>
        <a href="admin.php" class="move"> Admin </a>
        <a href="receiver.php" class="move" id="current"> Receiver Registration </a>
        <a href="donor.php" class="move"> Donor Registration </a>s
        <a href="receiverList.php" class="move"> Receiver List </a>
        <a href="donorList.php" class="move"> Donor List </a>
        <a href="contact.html" class="move"> Contact Us </a>
    </div>

    <div class="register">
       
        <form action="receiver.php" method="post" >
            Aadhar Number : <br>
            <input type="text" name="raadhar" placeholder="Enter Your Aadhar Number" class="input" id="raadhar" > <br> <br>
            Name : <br>
            <input type="text" name="rname" placeholder="Enter Your Name" class="input" id="rname" >  <br> <br>
            Mobile Number : <br>
            <input type="text" name="rMNo" placeholder="Enter Your Mobile Number" class="input" id="rMNo"> <br> <br>
            Address : <br>
            <input type="text" name="raddress" placeholder="Enter Your Address" class="input" id="raddress"> <br> <br>
            Task : <br>
            <input type="text" name="task" placeholder="Enter Your Task" class="input" id="task"> <br> <br>
            Amount needed : <br>
            <input type="text" name="amountNeeded" placeholder="Enter Your Amount Needed" class="input" id="amountNeeded"> <br> <br>
            Bank Name : <br>
            <input type="text" name="bname" placeholder="Enter Your Bank Name" class="input" id="bname"> <br> <br>
            Account Number : <br>
            <input type="text" name="accno" placeholder="Enter Your Account Number" class="input" id="accno"> <br> <br>
            IFSC Number : <br>
            <input type="text" name="ifsc" placeholder="Enter Your IFSC Number" class="input" id="ifsc"> <br> <br>
            <button class="btn">Submit</button> 

        </form>
    </div>


    <div id="footer">
        <footer id=>
            <p id="footer-text"> Copyright &#169; to DFR - IIITDMJ </p>
        </footer>
    </div>
    
</body>

</html>





