<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_SESSION['uid'])) {
    $email=$_SESSION['uid'];
        include 'Conn.php';
        $psd = $_POST['opsd'];
        $sql = "SELECT * FROM login WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];
            if (password_verify($psd, $hashedPassword)) {
                echo 'Old Password Correct';
            } else {
                echo 'Old Password Incorrect';
            }
        }
    }
}
?>