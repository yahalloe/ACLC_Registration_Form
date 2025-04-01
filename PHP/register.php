<?php
include "config.inc.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
 
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  
    $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

    if (mysqli_num_rows($verify_query) > 0) {
        echo "<div class='message'>
                This email is already in use. Try another one!
              </div><br>
        <a href='javascript:history.back();'><button class='btn'>Go Back</button></a>";
    } else {
       
        $insert_query = "INSERT INTO users (Username, Email, Age, pwd) VALUES ('$username', '$email', '$age', '$password')";
        
        if (mysqli_query($con, $insert_query)) {
            echo "<div class='message'>
                    Registration Successful!
                  </div><br>;
            <a href='../HTML/index.php'><button class='btn'>Login Now</button></a>";
        } else {
            echo "<div class='message'><p>Error Occurred: " . mysqli_error($con) . "</p></div>";
        }
    }
} 
?>
