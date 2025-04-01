<?php
$host = "localhost";  
$user = "root";      
$pass = "3414";           
$dbname = "aclc_registration_form";  


$con = mysqli_connect($host, $user, $pass, $dbname);


if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>


