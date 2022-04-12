<?php 

    echo '    <title>DFR | Donor List</title>
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
    <a href="receiverList.php" class="move"> Receiver List </a>
    <a href="donorList.php" class="move" id="current"> Donor List </a>
    <a href="contact.html" class="move"> Contact Us </a>
    </div>';

    session_start(); 

    $link = mysqli_connect('localhost', 'root', '', 'donation fund raiser');  

    if(!$link)
    { 
        die('Failed to connect to server: ');
    } 

    $qry = 'SELECT * FROM `don` WHERE Status=1';
    $result1 = mysqli_query($link, $qry);

    echo '<br><br><table width="85%" border="1" align="center"> 
    <tr class = "heading">
    <th >Name</th>
    <th> Amount Donating</th> 
    <th> DATE & TIME </th>
    <tr>';

    while (($row = $result1->fetch_assoc()))
    {
        echo '<tr style="text-align:center;"> 
        <td>'.$row['Name'].'</td>
        <td>'.$row['Amount donating'].'</td> 
        <td>'.$row['DATE & TIME'].'</td> 
        </tr>'; 
    }
    echo '</table><br><br>';

    echo '<div id="footer">
    <footer>
        <p id="footer-text"> Copyright &#169; to DFR - IIITDMJ </p>
    </footer>
    </div>';
?>
