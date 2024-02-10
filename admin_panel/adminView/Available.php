
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <!-- <link rel="stylesheet" href="../CSS/EditUser.css"> -->
    <!-- <link rel="stylesheet" href="../CSS/profile.css"> -->
    <link rel="stylesheet" href="asset/ajaxworkplace.css"> 
    <link rel="stylesheet" href="asset/style.css"> 


</head>
<body>
        <div class="accessories">
    <fieldset>
    <legend>List of Renter</legend>
    <?php
     include "../config/conn.php";
     $sql="select * from rooms where availability='yes'";
     $exe=mysqli_query($conn,$sql);
     if($exe) {
    
           


    echo '<table>';
    echo "<tr> <th>SN </th> 
    <th>type</th>
     <th>Location</th> 
    <th>price</th>
     <th> Actions </th>
      </tr>";
      $count=1; 

      while ($rows = $exe->fetch_assoc()) {
        $rid = $rows['roomno'];

echo '<div id="details">';
echo "<tr>";
echo "<td >". $count."</td>
 <td>". $rows['type']."</td> 
 <td>". $rows['location']."</td> 
 <td>". $rows['price']."</td>
 <td id='action'><a href='../UpdateRoom.php?rid=" . $rid . "'><Button >Update</Button></a>
 <a href='../enquire.php?rid=" . $rid . "'><Button >Details</Button></a>
 <a href='../Deleteroom.php?rid=" . $rid . "'><Button >Delete</Button></a> </td>";
echo "</tr>"; 
$count++;
      }
echo "<tr>"; 
echo "<td  colspan='6'>" . "<a href='../Addroom.php'>"."<Button type='button'> ADD </Button></a>"."</td> </tr>";


echo "</table>";
}
?>
 </div>
        </fieldset>
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