<?php
include "config.inc.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

    if (mysqli_num_rows($verify_query) > 0) {
        // Email exists
        echo '
        <head>
            <link rel="stylesheet" href="../HTML/style/style.css">
        </head>
        <div class="container">
            <div class"box">
                <div class="message">
                    This email is already in use. Try another one!
                </div><br>
                <a href="javascript:history.back();">
                    <button class="btn">Go Back</button>
                </a>
            </div>
        </div>';
    } else {
        // Insert user into the database
        $insert_query = "INSERT INTO users (Username, Email, Age, pwd) VALUES ('$username', '$email', '$age', '$password')";

        if (mysqli_query($con, $insert_query)) {
            echo '
            <head>
                <link rel="stylesheet" href="../HTML/style/style.css">
            </head>
            <div class="container">
                <div class"box">
                    <div class="message">
                        Registration Successful!
                    </div><br>
                    <a href="../HTML/index.php"><button class="btn">Login Now</button></a>
                </div>
            </div>';
            
        } else {
            echo "<div class='message'><p>Error Occurred: " . mysqli_error($con) . "</p></div>";
        }
    }
}
?>