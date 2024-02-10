<?php
    require "nav.php";
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
    <link rel="stylesheet" href="CSS/final.css">
</head>
<body>
    <div class="disp">
        <img src="IMAGE/banner.png" alt="">
    </div>
    <form action="Search.php" method='post'>
        <div class="search">
            <p>FIND THE ROOM</p>
            <p>TYPE
                <select name="type" id="type">
                    <option value="SELECT">SELECT</option>
                    <option value="SINGLE">Single</option>
                    <option value="SHARED">Shared</option>
                    <option value="TRIPLE">Triple</option>
                    <option value="FAMILY">Family</option>
                    <option value="FLAT">Flat</option>
                </select>
            </p>
            <p>PRICE
                <select name="price" id="price">
                    <option value="Price">Range</option>
                    <option value="Below 1000">Below RS1000</option>
                    <!-- Add other options -->
                </select>
            </p>
            <p>LOCATION
                <input type='text' name='location'>
            </p>
            <p>
                <input type="submit" value="Explore Rooms" name="search">
            </p>
        </div>
    </form>

    <div class="container">
        <?php
        if ($data) {
            while ($temp = mysqli_fetch_assoc($data)) {
                ?>
                <div class="box">
                    <div class="img">
                        <?php if (!empty($temp['image'])): ?>
                            <img src="<?php echo $temp['image']; ?>">
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
                            <?php if ($temp['availability'] == 'yes' || $temp['availability'] == 'Yes'): ?>
                                <a href="enquire.php?id=<?php echo $temp['roomno']; ?>"><button>Enquire</button></a>
                                <a href="LoginT.php?id=<?php echo $temp['roomno']; ?>"><button>Book</button></a>
                            <?php else: ?>
                                <a href="enquire.php?id=<?php echo $temp['roomno']; ?>"><button>Enquire</button></a>
                                <a><button class='ebooked'>Booked</button></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            echo "Error executing the query: " . mysqli_error($conn);
        }
        ?>
    </div>
</body>
</html>
