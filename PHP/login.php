<?php
session_start();
include "config.inc.php";


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $row = mysqli_fetch_assoc($query);

    $hashedpassword = $row['pwd'];

    // Check if user exists
    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $row = mysqli_fetch_assoc($query);

    if ($row) {
        $hashedpassword = $row['pwd'];
        if (password_verify($password, $hashedpassword)) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            header("Location: ../HTML/home.php"); // Redirect to dashboard
            exit();
        } else {
            $error_message = "Invalid Username or Password!";
            header("Location: ../HTML/index.php?error=$error_message");
            exit();
        }
    } else {
        $error_message = "Invalid Username or Password!";
        header("Location: ../HTML/index.php?error=$error_message");
        exit();
    }
}
else {
    header("Location: ../HTML/index.php");
}
?>