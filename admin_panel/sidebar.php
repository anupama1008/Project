<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="120" height="120" alt="Anupamas collection"> 
    <h5 style="margin-top:10px;">Hello Admin : 
    <?php 
     echo $_SESSION['aname'];

     ?>
     </h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href='../Addroom.php' ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#Registered"  onclick="showRegistered()" ><i class="fa fa-users"></i> Registered</a>
    <a href="#Rented"   onclick="showRented()" ><i class="fa fa-th-large"></i> Rented</a>
    <a href="#Available"   onclick="showAvailable()" ><i class="fa fa-th"></i> Available</a>
    <a href="#Users"   onclick="showusers()" ><i class="fa fa-th-list"></i> Users</a>    

  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


