<?php
// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'conn.php';
$query = "SELECT * FROM rooms";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/nav.css">

</head>

<body>
    <div class="top">
        <p class="immg">
            <img src="IMAGE/logo.png" alt="">
        </p>
        <nav>
        <ul>
        <li><a href="Home.php">Home</a></li>
        <li><a href="Dashboard.php">Rooms</a></li>
        <li><a href="Home.php#Contacts">Contact</a></li>
        <li><a href="Home.php#menu" href="#">Menu</a></li>
       
      </ul>
        </nav>
        <p >
        <a href="signup.php"><button class="abtn" name='Login'>+ ADD</button>  </a>
        <?php 
        if (isset($_SESSION['uid'])) { ?>
           
            <a href="user.php"><button class="abtn" name='Login'>YOU</button>  </a>
        <?php 
        }else{
            ?>
          <a href="LoginUser.php"><button class="abtn" name='Login'>LOGIN</button>  </a>
        <?php  }
        ?>
        </p>
    </div>

</body>
</html>
