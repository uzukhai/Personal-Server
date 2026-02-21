<?php
    session_start();
    require 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST['username'];
        $pass = md5($_POST['password']);
    
        $checku = mysqli_query($conn, "select username from users where username='$username'");
        $checkp = mysqli_query($conn, "select pass from users where pass='$pass'");
    
        if (mysqli_num_rows($checku) < 1) {
            echo "<script>alert('Username is not correct'); window.location.href = '../login.html';</script>";
        } else if (mysqli_num_rows($checkp) > 0){
            $row2 = mysqli_fetch_assoc($checku);
            $_SESSION['username'] = $row2['username'];
            echo "<script>alert('Login Successful!'); window.location.href = '../main.php';</script>";
        }
        else
        echo "<script>alert('Password is not correct'); window.location.href = '../login.html';</script>";
    
        $conn->close();
    }
?>