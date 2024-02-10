<?php
require_once "nav.php";
include 'Conn.php';

if (isset($_GET['tid'])) {
    $tid = $_GET['tid'];
    
  
    $sql3 = "DELETE  FROM booking where tid = '$tid'";
    $sql4 = "DELETE  FROM tenant where tid = '$tid'";


    
    if ($conn->query($sql3) && $conn->query($sql4)) {
        header("Location: adminsucess.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_GET['lid'])) {
    $lid = $_GET['lid'];
    $sql1 = "SELECT * FROM rooms WHERE lid = '$lid'";
    $exe1 = mysqli_query($conn, $sql1);
    
    if (mysqli_num_rows($exe1) > 0) {
        while ($data = mysqli_fetch_assoc($exe1)) {
            $rno = $data['roomno'];
            
            // Corrected SQL query
            $sql = "DELETE FROM booking WHERE roomno = '$rno'";
            mysqli_query($conn, $sql);
        }
    }
    
    // Separate DELETE statements for each table
   
    $sql5 = "DELETE FROM rooms WHERE lid = '$lid'";
    $sql4 = "DELETE FROM landlord WHERE lid = '$lid'";
    
    if ($conn->query($sql4) && $conn->query($sql5)) {
        header("Location: adminsucess.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
