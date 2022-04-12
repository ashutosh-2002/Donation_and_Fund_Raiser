<?php
    
    echo '    <title>DFR | Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">';

    echo '<link rel="stylesheet" href="style.css">';

    echo '
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
    </div>';

    session_start(); 
    
    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
    { 
        $link = mysqli_connect('localhost', 'root', '','donation fund raiser');  
        
        if(!$link)
        { 
            die('Failed to connect to server: ');
        } 

        $qry = 'SELECT * FROM rec'; 
        $result = mysqli_query($link, $qry);

        echo '<h1>The Receiver\'s requests are  - </h1>';

        echo '<table width="98%" border="1" align="center"> 

        <tr class = "heading">
        <th>Aadhar Number</th> 
        <th>Name</th>
        <th> Mobile Number </th> 
        <th> Address </th> 
        <th> Task </th> 
        <th> Amount needed </th> 
        <th> 	Bank name </th> 
        <th> Account no. </th>
        <th> IFSC </th> 
        <th> DATE & TIME </th> 
        <th>Amount Received</th>

        <th>Status </th>  
        </tr>';

        while (($row1 = $result->fetch_assoc()))
        { 
            echo '<tr style="text-align:center;"> 
            <td>'.$row1['Aadhar Number'].'</td>
            <td>'.$row1['Name'].'</td>
            <td>'.$row1['Mobile Number'].'</td> 
            <td>'.$row1['Address'].'</td> 
            <td>'.$row1['Task'].'</td> 
            <td>'.$row1['Amount needed'].'</td> 
            <td>'.$row1['Bank name'].'</td> 
            <td>'.$row1['Account no.'].'</td> 
            <td>'.$row1['IFSC'].'</td> 
            <td>'.$row1['DATE & TIME'].'</td>
            <td>'.$row1['Amount Received'].'</td>
            <td>'.$row1['Status'].'</td> 
            </tr>'; 
        }
        echo '</table>';

        echo '<br><form action="receiverChange.php" method="post">
        <input type="submit" name="submit" value ="Update/Delete" class="submit btn">
        </form><br><br><br><br>';

        $qry1 = 'SELECT * FROM don'; 
        $result1 = mysqli_query($link, $qry1);

        echo '<h1>The Donor\'s requests are  - </h1>';

        echo '<table width="98%" border="1" align="center"> 
        <tr  class="heading">
        <th>Aadhar Number</th> 
        <th>Name</th>
        <th> Mobile Number </th> 
        <th> Address </th> 
        <th> Receiver Aadhar</th> 
        <th> Amount Donating</th> 
        <th> Google Drive Link of Photo of Donation</th> 
        <th> DATE & TIME </th> 
        <th>Status </th>
        </tr>';

        while (($row = $result1->fetch_assoc()))
        {
            echo '<tr  style="text-align:center;"> 
            <td>'.$row['Aadhar Number'].'</td>
            <td>'.$row['Name'].'</td>
            <td>'.$row['Mobile Number'].'</td> 
            <td>'.$row['Address'].'</td> 
            <td>'.$row['Receiver Aadhar'].'</td> 
            <td>'.$row['Amount donating'].'</td> 
            <td>'.$row['Google Drive Link of Photo of Donation'].'</td> 
            <td>'.$row['DATE & TIME'].'</td> 
            <td>'.$row['Status'].'</td> 
            </tr>'; 
        }
        echo '</table>';

        $result1 = mysqli_query($link, $qry1);

        echo '<br><form action="donorChange.php" method="post">
        <input type="submit" name="submit" value ="Update/Delete" class="submit btn">
        </form><br><br><br><br>';

        echo '
        <form action="logout.php" method="post">
        <input type="submit" name="submit" value ="Logout" class="submit btn" style="width: 350px;">
        </form>';

        echo '    <div id="footer">
        <footer>
            <p id="footer-text"> Copyright &#169; to DFR - IIITDMJ </p>
        </footer>
        </div>';
    }
    else
    { 
        header('location:admin.php'); 
        exit(); 
    } 
?>