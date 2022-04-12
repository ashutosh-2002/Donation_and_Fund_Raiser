<?php 

    echo '    <title>DFR | Receiver List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">';

    echo '<link rel="stylesheet" href="style.css">';

    echo '<div id="title">
    Donation and Fund Raiser
    </div>

    <div id="nav">
    <a href="index.html" class="move"> Home </a>
    <a href="admin.php" class="move"> Admin </a>
    <a href="receiver.php" class="move"> Receiver Registration </a>
    <a href="donor.php" class="move"> Donor Registration </a>
    <a href="receiverList.php" class="move" id="current"> Receiver List </a>
    <a href="donorList.php" class="move"> Donor List </a>
    <a href="contact.html" class="move"> Contact Us </a>
    </div>';

    session_start(); 

    $link = mysqli_connect('localhost', 'root', '', 'donation fund raiser');  

    if(!$link)
    { 
        die('Failed to connect to server: ');
    } 

    $qry = 'SELECT * FROM `rec` WHERE Status=1 && `Amount needed`>`Amount Received`';
    $result = mysqli_query($link, $qry);

    echo '<br><br><table border="1" width="98%" align="center"> 
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
    <th> Amount Received </th>
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
        </tr>'; 
    }
    
    echo '</table><br><br>';

    echo '<div id="footer">
    <footer>
        <p id="footer-text"> Copyright &#169; to DFR - IIITDMJ </p>
    </footer>
    </div>';
?>
