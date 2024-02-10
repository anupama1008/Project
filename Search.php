<?php require_once "nav.php"; ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="CSS/nextcard.css">
    <link rel="stylesheet" href="CSS/final.css">

 

</head>
<body>
   
    <div class="disp">
        <img src="IMAGE/logo_transparent.png" alt="">
    </div>
    <form action="#" method="post" onsubmit="return validate()">
        <div class="error"></div>
        <div class="search">
            <p>FIND THE ROOM </p>
            <p>TYPE</p>
            <select name="type" id="type">
                <option value="Selectt">SELECT</option>
                <option value="SINGLE">Single</option>
                <option value="SHARED">Shared</option>
                <option value="TRIPLE">Triple</option>
                <option value="FAMILY">Family</option>
                <option value="FLAT">Flat</option>
            </select>
            <p>PRICE</p>
            <select name="price" id="price">
                <option value="Price">Range</option>
                <option value="Below 1000">Below RS 1000</option>
                <option value="1000">RS 1000</option>
                <option value="2000">RS 2000</option>
                <option value="3000">RS 3000</option>
                <option value="4000">RS 4000</option>
                <option value="5000">RS 5000</option>
                <option value="6000">RS 6000</option>
                <option value="7000">RS 7000</option>
                <option value="8000">RS 8000</option>
                <option value="9000">RS 9000</option>
                <option value="Above 10000">Above RS 10000</option>
            </select>
            <p>LOCATION
                <input type='text' name='location'>
            </p>
            <div>
                <input type="submit" value="Explore Rooms" name="search">
            </div>
        </div>
    </form>

    <div class="container">
    <?php
include 'Conn.php';
if (isset($_POST['search'])) {           //this is from post in search.php and dashboard 
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : 'Selectt';
    $location = isset($_POST['location']) ? $_POST['location'] : '';

    if ($type === 'Selectt') {
        $error = "Please select a valid room type.";
    } else {
        $type = $conn->real_escape_string($type);
        $location = $conn->real_escape_string($location);

        $sql = "SELECT * FROM rooms WHERE type='$type'";

        if ($price !== 'Price') {
            if ($price == 'Below 1000') {
                $sql .= " AND price < 1000 ";
            } elseif ($price == 'Above 10000') {
                $price = intval($price);
                $sql .= " AND price > 10000 ";
            } else {
                $price = intval($price);
                $sql .= " AND price BETWEEN $price AND " . ($price + 999);
            }
        }

        if (!empty($location)) {
            $sql .= " AND location LIKE '%$location%' ";
        }
          $result=mysqli_query($conn,$sql);
    }

    if ( isset($result) && $result->num_rows> 0){
        while ($temp = mysqli_fetch_assoc($result)) {
            $roomno=$temp['roomno'];
               ?>
         
                <div class="box">
                    <div class="img">
                    <?php if (!empty($temp['image'])): ?>
                        <img src="<?php  echo $temp['image']; ?> ">
                        <?php endif; ?>
                    </div>
                    <div class="detail">
                        <?php if (!empty($temp['type'])): ?>
                            <p class="title"><?php echo $temp['type']; ?></p>
                        <?php endif; ?>
                        <?php if (!empty($temp['price'])): ?>
                            <p class="price">price: Rs <?php echo $temp['price']; ?></p>
                        <?php endif; ?>
                        <div class="btn">
                        <a href="enquire.php?id=<?php echo $roomno; ?>"> <button class="child_btn">Enquire</button></a>
                        <?php 
                        $bsql="select * from rooms where roomno ='$roomno' ";
                        $bexe=mysqli_query($conn,$bsql);
                        $bdata=mysqli_fetch_assoc($bexe);
                        if($bdata['availability']=='no'){ ?>
                             <button class="child_btn ebooked">Booked</button>
                          <?php
                        }else{ ?>
                          <a href="LoginT.php?id=<?php echo $roomno; ?>"> <button class="child_btn">Book</button></a>
                          <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
    
            <?php
        }
    }else{
        echo "<h1> SORRY NO SUCH ROOMS AVAILABLE </h1 style='margin-left:40px'>";

       

        


    }





}elseif($_POST['homebtn']){  //this is from home page search page 
 

    $type=$_POST['selected'];
    $sqlh="select * from rooms where type = '$type'";
    $exx = mysqli_query($conn,$sqlh);

    if(isset($exx)){
        while($temp = mysqli_fetch_assoc($exx)){
            ?>
     
            <div class="box">
                <div class="img">
                <?php if (!empty($temp['image'])): ?>
                    <img src="<?php  echo $temp['image']; ?> ">
                    <?php endif; ?>
                </div>
                <div class="detail">
                    <?php if (!empty($temp['type'])): ?>
                        <p class="title"><?php echo $temp['type']; ?></p>
                    <?php endif; ?>
                    <?php if (!empty($temp['price'])): ?>
                        <p class="price">price: Rs <?php echo $temp['price']; ?></p>
                    <?php endif; ?>
                    <div class="btn">
                    <?php 
                        if($temp['availability'] == 'yes' || $temp['availability'] == 'Yes'){ 
                            ?>
                            <a href="enquire.php?id=<?php echo $temp['roomno']; ?>"><button>Enquire</button></a>
                            <a href="LoginT.php?id=<?php echo $temp['roomno']; ?>"><button>Book</button></a>

                            <?php 
                        }else{ ?>
                            <a href="enquire.php?id=<?php echo $temp['roomno']; ?>"><button>Enquire</button></a>
                            <a><button class='ebooked'>Booked</button></a>
                            <?php

                        }
                        ?>

                    <!-- <a href="enquire.php?id=<?php echo $temp['roomno'] ?>"> <button class="child_btn">Enquire</button></a>
                      <a href="LoginT.php?id=<?php echo $temp['roomno'] ?>"> <button class="child_btn">Book</button></a> -->
                    </div>
                </div>
            </div>

        <?php

        }

    }


}
      
            


       
    ?>

       <div class="empty"><?php if(isset($error)) echo $error?></div>
     
    </div>
    <script>
        function validate(){
            if(document.getElementById('type').value=='Selectt'){
                document.querySelector('.error').innerHTML='Type must be specified';
                return false;
            }
        }
    </script>
</body>
</html>
