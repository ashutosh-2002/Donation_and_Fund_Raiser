<?php
    if (isset($_POST['raadhar'])) 
    {
        session_start(); 

        if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
        {
            if ($_POST['submit'] == 'Update')
            { 
                if(!$_POST['raadhar']) 
                {
                    echo 'Please enter aadhar number.'; 
                }
                else
                { 
                    $validationFlag = true;

                    $raadhar = $_POST['raadhar']; 
                    $amount = $_POST['amount']; 
                    $status = $_POST['status']; 

                    if($validationFlag)
                    {  
                        $link = mysqli_connect('localhost', 'root', '','donation fund raiser'); 

                        if(!$link)
                        { 
                            die('Failed to connect to server: '); 
                        } 
                    }
                    
                    if(empty($_POST['amount']) && $_POST['amount'] != 0)
                    { }
                    else
                    { 
                        $update1 = "UPDATE rec SET `Amount Received` = '$amount' WHERE `Aadhar Number` = '$raadhar'"; 

                        $results = mysqli_query($link, $update1); 

                        if($results == FALSE)
                        { 
                            echo mysqli_error($link) . '<br>'; 
                        }
                        else
                        {
                            echo "<script>alert('Amount updated successfully!')</script>";
                        }    
                    } 

                    if(empty($_POST['status']) && $_POST['status'] != 0)
                    { }
                    else
                    { 
                        $update2 = "UPDATE rec SET `Status` = '$status' WHERE `Aadhar Number` = '$raadhar'"; 

                        $results = mysqli_query($link, $update2);

                        if($results == FALSE) 
                        {
                            echo mysqli_error($link) . '<br>'; 
                        }
                        else 
                        {
                            echo "<script>alert('Receiver Approval successfull!')</script>";
                        }
                    } 
                }  
            } 

            if ($_POST['submit'] == 'Delete')
            { 

                if(!$_POST['raadhar']) 
                {
                    echo 'Please enter aadhar number.'; 
                }
                else
                { 
                
                    $raadhar = $_POST['raadhar'];
                    $amount = $_POST['amount']; 
                    $status = $_POST['status']; 

                    $link = mysqli_connect('localhost', 'root', '','donation fund raiser'); 
                    $delete = "DELETE FROM rec WHERE `Aadhar Number` = '$raadhar'"; 
                
                    if(!$link)
                    { 
                        die('Failed to connect to server: '); 
                    } 
                
                    $results = mysqli_query($link, $delete); 

                    if($results == FALSE) 
                    {
                        echo mysqli_error() . '<br>'; 
                    }
                    else 
                    {
                        echo "<script>alert('Receiver Rejection successfull!')</script>"; 
                    }
                } 
            } 
        }

        else
        { 
            header('location:admin.html'); 
            exit(); 
        } 
    }
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

    
        <h1>Receiver Updation/Deletion Form</h1>
        <div id = login>
        <form action="receiverChange.php" method="post">
            Aadhar Number * :
            <br><input type="text" name="raadhar" placeholder="Enter Receivers's Aadhar Number" class="input" maxlength="15"><br><br>

            Amount Received :
            <br><input type="text" name="amount" placeholder="Enter Receiver's Amount Received" class="input" maxlength="15"><br><br>

            Status :
            <br><input type="text" name="status" placeholder="Enter Donor's New Status" class="input" maxlength="15"><br><br>

            <input type="submit" name="submit" value="Update" class="btn">
            <input type="submit" name="submit" value="Delete" class="btn">


        </form>
    </div>

    <form action="logout.php" method="post">
        <br><br><br><input type="submit" name="submit" value ="Logout" class="submit btn"  style="width: 350px;"><br><br>
    </form>

    <div id="footer">
        <footer>
            <p id="footer-text"> Copyright &#169; to DFR - IIITDMJ </p>
        </footer>
    </div>
</body>


</html>