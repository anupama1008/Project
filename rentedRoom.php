<?php 
require_once "nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/EditUser.css">
    <link rel="stylesheet" href="CSS/profile.css">
</head>
<body>
    <div class="accessories">
    <fieldset>
    <legend>List of Room</legend>
    <?php


if (isset($_SESSION['uid'])) {
    $email = $_SESSION['uid'];
        include 'Conn.php';
        $sql = "SELECT * FROM login WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          
        }
        $sql1 = "SELECT * FROM booking WHERE tid = (SELECT tid FROM tenant WHERE temail = '$email')";
        $result1 = mysqli_query($conn, $sql1);
    // $sql1=`select * from booking where tid = ("select tid from tenant where temail='$email' " `;
    //  $result1=mysqli_query($conn,$sql1);
}
else{
    header('Location:Dashboard.php');
}
    if ( mysqli_num_rows($result1) > 0) {
    echo '<table>';
    echo "<tr>";
    while ($rows = $result1->fetch_assoc()) {
        $rid = $rows['roomno'];
        $sq = "SELECT * FROM rooms WHERE roomno = '$rid'";
        $res = mysqli_query($conn, $sq);
       $data= mysqli_fetch_assoc($res);

        echo '<div id="details">';
        echo "<tr>";
        echo "<td colspan='2'><hr></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='room-type-cell' >" . "Room Type: ".$data['type']. "<br> Location: ".$data['location']."</td>";
        echo "<td colspan=2><a href='enquire.php?id=" . $rows['roomno'] . "'><button>View Room</button></a></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2'><hr></td>";
       }
       echo "</tr>";
       echo "</table>";
     }
     else{
        echo "No rooms Registered by this landlord!";
        }
    ?>
    </div>
    </fieldset>
    </div>
    <div id="confirmation-box">
    <input type="text" name="" id="roomno" disabled>
        <div class="confirmation-message">
            <p>Are you sure you want to proceed with this action?</p>
        </div>
        <div class="button-container">
        <a href='#' onclick='passValue()'><button class="proceed-button">Proceed</button></a>
        <a href='addedRoom.php'><button class="cancel-button">Cancel</button></a>
        </div>
    </div>
</body>
<script>
    function deleteR(id){
        document.getElementById('confirmation-box').style.display='block';
        document.getElementById('roomno').value=id;

    }
    function passValue(){
        var inputValue = document.getElementById("roomno").value;
        var url = "DeleteRoom.php?rid=" + encodeURIComponent(inputValue);
        window.location.href = url;
    }
</script>    
    </div>
</body>
</html>