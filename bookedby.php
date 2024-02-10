<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bookedby.css">
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['uid'])){
        if(isset($_GET['rid'])){
            include 'Conn.php';
            $rid=$_GET['rid'];
            $sql="SELECT * FROM booking,tenant WHERE booking.tid=tenant.tid AND booking.roomno=$rid";
            $result=$conn->query($sql);

            if ($result === false) {
                die('Error: ' . $conn->error);
            }

            if($result->num_rows > 0) {
                $row=$result->fetch_assoc();
                $tname=$row['tname'];
                $tphone=$row['tphone'];
                $temail=$row['temail']; 
                echo "<table>";
                echo "<tr><th colspan=2>Tenant Information</th></tr>";
                echo "<tr><td>Name:</td><td>$tname</td></tr>";
                echo "<tr><td>Phone:</td><td>$tphone</td></tr>";
                echo "<tr><td>Email:</td><td>$temail</td></tr>";
                echo "<tr>"; 
                echo "<td colspan=2>"; 
                echo "<div class='button-container'>";
                echo "<button class='view-room-button' onclick='window.location.href=\"enquire.php?rid=$rid\"'>View Room</button>";
                echo "</div>";
                echo"</td></tr>";
                echo "</table>";
            }
        }
    }
    ?>
</body>
</html>
