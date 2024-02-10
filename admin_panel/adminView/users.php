<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/ajaxworkplace.css"> 
    <link rel="stylesheet" href="ad.css"> 


</head>
<body>
<div class="accessories">
    <fieldset>
    <legend>List of Renter</legend>
    <?php
     include "../config/conn.php";
     $sql = "SELECT * FROM tenant";
     $exe = mysqli_query($conn, $sql);

           if ($exe) {
           


    echo '<table>';
    echo "<tr> <th>SN </th> 
    <th>image</th>
     <th>Name</th> 
    <th>Email</th>
     <th>Phone</th> 
     <th>total Rented</th>
     <th > Actions </th>
      </tr>";
      $count=1; 

while ($rows = mysqli_fetch_assoc($exe)) {
$tid = $rows['tid'];

$sqll = "SELECT count(tid) as total FROM booking where tid= '$tid' ";
$exee = mysqli_query($conn, $sqll);
 $data=mysqli_fetch_assoc($exee);
 if($data['total'] > 0){

echo '<div id="details">';
echo "<tr>";
echo "<td >". $count."</td>
 <td> image </td>
 <td>". $rows['tname']."</td> 
 <td>". $rows['temail']."</td> 
 <td>". $rows['tphone']."</td>
 <td>". $data['total'] ." </td> 
 <td><a href='../aupdate.php?tid=" . $tid .
"'><Button >Edit</Button></a>
<a href='../adelete.php?tid=" . $tid . "'><Button>Delete</Button></a></td>";
echo "</tr>"; 
$count++;
 }


}

echo "</table>";
}
?>
 </div>
        </fieldset>
        
       <!-- second table  -->

<fieldset>
<legend>List Of Landlord </legend>
<?php 
$sql = "SELECT * FROM landlord";
$exe = mysqli_query($conn, $sql);

if ($exe) {
    
    echo '<table>';
    echo "<tr>
     <th>SN </th> 
    <th>image</th> 
    <th>Name</th>
     <th>Email</th>
      <th>Phone</th> 
       <th> total Registered</th> 
       <th> Actions </th> 
       </tr>";
       $count=1;
       while ($rows = mysqli_fetch_assoc($exe)) {
        $lid = $rows['lid'];

        $sqll = "SELECT count(lid) as total FROM rooms where lid= '$lid' ";
        $exee = mysqli_query($conn, $sqll);
        $data = mysqli_fetch_assoc($exee);
        if($data['total'] > 0){

        
      

  
           echo '<div id="details">';
           echo "<tr>";
           echo "<td >". $count."</td>
            <td> image </td>
            <td>". $rows['lname']."</td>
             <td>". $rows['lemail']."</td>
              <td>". $rows['lphone']."</td>
               <td>".$data['total']."</td> 
               <td><a href='../aupdate.php?lid=" . $lid ."'><Button >Edit</Button></a>
                    <a href='../adelete.php?lid=" . $lid . "'><Button>Delete</Button></a></td>"; 
          echo "</tr>"; 
          $count++;
        }
        
        }

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
        var url = "../DeleteRoom.php?rid=" + encodeURIComponent(inputValue);
        window.location.href = url;
    }
</script>    
</div>
</body>
</html>




