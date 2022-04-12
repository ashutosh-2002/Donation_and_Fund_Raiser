<?php
    if (isset($_POST['daadhar'])) 
    {
        session_start(); 
        
        if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
        {
            if ($_POST['submit'] == 'Update')
            { 
                if(!$_POST['daadhar']) 
                {
                    echo 'Please enter the aadhar number.'; 
                }
                else
                { 
                    $validationFlag = true;
                    $daadhar = $_POST['daadhar'];  
                    $status = $_POST['status']; 

                    if($validationFlag)
                    { 
                        $link = mysqli_connect('localhost', 'root', '','donation fund raiser'); 

                        if(!$link)
                        { 
                            die('Failed to connect to server: '); 
                        } 
                    }

                    if(empty($_POST['status']) && $_POST['status'] != 0)
                    { }
                    else
                    {
                        $update = "UPDATE don SET `Status` = '$status' WHERE `Aadhar Number` = '$daadhar'"; 
                        $results = mysqli_query($link, $update);
                        if($results == FALSE) 
                        echo mysqli_error($link) . '<br>'; 
                        else 
                        echo "<script>alert('Donor verification successfull!')</script>";
                    } 
                }  
            } 


            if ($_POST['submit'] == 'Delete')
            { 
                if(!$_POST['daadhar'])
                { 
                    echo 'Please enter the aadhar number.'; 
                }
                else
                { 
                    $daadhar = $_POST['daadhar'];
                    $link = mysqli_connect('localhost', 'root', '','donation fund raiser'); 
                    $delete = "DELETE FROM don WHERE `Aadhar Number` = '$daadhar' && `Status`=0 "; 
                    
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
                        echo "<script>alert('Donor rejection successfull!')</script>";
                    }
                } 
            } 
        }
        else
        { 
            header('location:admin.php'); 
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

    <h1>Donor Approval/Rejection </h1> 

    <div id="login">
        <form action="donorChange.php" method="post"> 
            Aadhar Number * :
            <br><input type="text" name="daadhar" placeholder="Enter Donor's Aadhar Number" class="input" maxlength="15"><br><br>

            Status :
            <br><input type="text" name="status" placeholder="Enter Donor's New Status" class="input" maxlength="15"><br><br> 
            
            <input type="submit" name="submit" value="Update" class="btn">
            <input type="submit" name="submit" value="Delete" class="btn">
        </form>
    </div> 

    <form action="logout.php" method="post">
        <br><br><br><input type="submit" name="submit" value ="Logout" class="submit btn" style="width: 350px;"><br><br>
    </form>

    <div id="footer">
        <footer>
            <p id="footer-text"> Copyright &#169; to DFR - IIITDMJ </p>
        </footer>
    </div>

</body> 
</html>
