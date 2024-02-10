<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    #main{
        width:100%;
        height:100vh;

    }
      #main-container {
  width: 40%;
 
  max-width: 350px;
  height:200px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #757b75;
  padding: 30px 40px 30px;
  text-align: center;
}
h2{
    font-size:40px;
}
input{
    font-size:25px;
    width:350px;
    
}


    </style>
    <link rel="stylesheet" href="../CSS/alogin.css">
</head>
<body>
    <div id="main">
    <div id="main-container">
        <form action="aLogin.php" method="post">
            <h2>Registration!</h2>
           <div id="name">
           <input type="text" value="Successfull Admin Registration" disabled style="text-align: center;">
           </div>
        </form>
    </div>
    </div>
</body>
</html>