<?php
require_once "nav.php";
 include 'Conn.php';
 if(isset($_GET['tid'])){


$tid=$_GET['tid'];
$sql="select * from  tenant where tid='$tid'";
$exe=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($exe);
$em=$data['temail'];

//taking id of user to update further details
$sql="select * from  login where email='$em'";
$exe=mysqli_query($conn,$sql);
$dataa=mysqli_fetch_assoc($exe);
$tempid=$dataa['id'];


if (isset($_POST['update'])) {
   
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone=$_POST['phone'];

    $sql = "SELECT * FROM login WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 1) {
        header("Location: aupdate.php?err=1");
    } else {    
        $sql = "update login set name='$name', email='$email' , phone='$phone' where id='$tempid' ";
        $sqll="update tenant set tname='$name' , temail='$email', tphone='$phone' where tid='$tid'";
        if ($conn->query($sql) && $conn->query($sqll) ) {
            header("Location:adminsucess.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>
<body>
    <div class="container">
        <div class="motto">
            <img src="IMAGE/Room.jpg" alt="Room Picture">
            <h3>FEELS LIKE HOME.</h3>
            <p>Chhaano Room Renting System</p>
        </div>
        <div class="formbox">
            <div class='logo'>
                <div id='image'><img src="IMAGE/logo_transparent.png" alt=""></div>
                <div id='tag'><h2>CHHAANO</h2></div>
            </div>
            <h3>Update Tenant Details</h3>
            <div class="inputbox">
                <div class="error">
                    <?php
                    if (isset($_GET['err'])) {
                        echo "Email Already Exists";
                    }
                    ?>
                </div>
                <form name="myform" onsubmit="return validateform();" method="post">
                    <div class="formdesign" id="name">
                        <input type="text" name="name" value="<?php echo $data['tname'] ?>">
                        <p class="formerror error"></p>
                    </div>
                    <div class="formdesign" id="email">
                        <input type="text" name="email" value="<?php echo $data['temail'] ?>">
                        <p class="formerror error"></p>
                    </div>
                    <div class="formdesign" id="phone">
                        <input type="text" name="phone" value="<?php echo $data['tphone'] ?>">
                        <p class="formerror error"></p>
                    </div>
                    <div class="btn">
                        <input type="submit" class="btn" value="Update" name="update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
}elseif(isset( $_GET['lid'])){
    $lid=$_GET['lid'];
$sql="select * from  landlord where lid='$lid'";
$exe=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($exe);
$em=$data['lemail'];

//taking id of user to update further details
$sql="select * from  login where email='$em'";
$exe=mysqli_query($conn,$sql);
$dataa=mysqli_fetch_assoc($exe);
$tempid=$dataa['id'];


if (isset($_POST['update'])) {
   
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone=$_POST['phone'];

    $sql = "SELECT * FROM login WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 1) {
        header("Location: aupdate.php?err=1");
    } else {    
        $sql = "update login set name='$name', email='$email' , phone='$phone' where id='$tempid' ";
        $sqll="update landlord set lname='$name' , lemail='$email', lphone='$phone' where lid='$lid'";
        if ($conn->query($sql) && $conn->query($sqll) ) {
            header("Location:adminsucess.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>
<body>
    <div class="container">
        <div class="motto">
            <img src="IMAGE/Room.jpg" alt="Room Picture">
            <h3>FEELS LIKE HOME.</h3>
            <p>Chhaano Room Renting System</p>
        </div>
        <div class="formbox">
            <div class='logo'>
                <div id='image'><img src="IMAGE/logo_transparent.png" alt=""></div>
                <div id='tag'><h2>CHHAANO</h2></div>
            </div>
            <h3>Update Tenant Details</h3>
            <div class="inputbox">
                <div class="error">
                    <?php
                    if (isset($_GET['err'])) {
                        echo "Email Already Exists";
                    }
                    ?>
                </div>
                <form name="myform" onsubmit="return validateform();" method="post">
                    <div class="formdesign" id="name">
                        <input type="text" name="name" value="<?php echo $data['lname'] ?>">
                        <p class="formerror error"></p>
                    </div>
                    <div class="formdesign" id="email">
                        <input type="text" name="email" value="<?php echo $data['lemail'] ?>">
                        <p class="formerror error"></p>
                    </div>
                    <div class="formdesign" id="phone">
                        <input type="text" name="phone" value="<?php echo $data['lphone'] ?>">
                        <p class="formerror error"></p>
                    </div>
                    <div class="btn">
                        <input type="submit" class="btn" value="Update" name="update">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php 

};
?>

</body>

<script>
function validateform() {
    clearerr();
    var returnval = true;

    var name = document.forms['myform']['name'].value.trim();
    var email = document.forms['myform']['email'].value.trim();
    var pass = document.forms['myform']['psd'].value.trim();
    var cpass = document.forms['myform']['cpsd'].value.trim();
    var phone = document.forms['myform']['phone'].value.trim();

    if (name === "") {
        seterror("name", "*Required");
        returnval = false;
    } else {
        if (name.length > 30) {
            seterror("name", "Limit(30) Exceeded");
            returnval = false;
        } else if (!/^[A-Za-z\s.'-]+$/.test(name)) {
            seterror("name", "*Invalid Name");
            returnval = false;
        }
    }

    if (email === "") {
        seterror("email", "*Required");
        returnval = false;
    } else if (!/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(email)) {
        seterror("email", "*Invalid Email");
        returnval = false;
    }

    if (pass === "") {
        seterror("pass", "*Required");
        returnval = false;
    } else if (pass.length < 8) {
        seterror("pass", "*Required Length(8)");
        returnval = false;
    }else if(pass.length >16){
        seterror("pass","*exceeds limit");
        returnval=false;
    }
    

    if (cpass === "") {
        seterror("cpass", "*Required");
        returnval = false;
    } else if (cpass !== pass) {
        seterror("cpass", "Password Not Matched");
        returnval = false;
    }

    if (phone === "") {
        seterror("phone", "*Required");
        returnval = false;
    } else if (!/^(?:\+977|0)?[1-9]\d{9}$/.test(phone)) {
        seterror("phone", "*Invalid Phone Number");
        returnval = false;
    }

    return returnval;
}

function seterror(id, error) {
    var ele = document.getElementById(id);
    ele.getElementsByClassName("formerror")[0].innerHTML = error;
}

function clearerr() {
    var errors = document.getElementsByClassName('formerror');
    for (var i = 0; i < errors.length; i++) {
        errors[i].innerHTML = "";
    }
}

function clearError(id) {
    seterror(id, "");
}

document.forms['myform']['name'].addEventListener('input', function() {
    clearError('name');
});

document.forms['myform']['email'].addEventListener('input', function() {
    clearError('email');
});

document.forms['myform']['psd'].addEventListener('input', function() {
    clearError('pass');
});

document.forms['myform']['cpsd'].addEventListener('input', function() {
    clearError('cpass');
});

document.forms['myform']['phone'].addEventListener('input', function() {
    clearError('phone');
});

document.forms['myform'].addEventListener('submit', function(event) {
    // event.preventDefault();

    var isValid = validateform();

    if (isValid) {
        this.submit();
    }
});
</script>
</html>
