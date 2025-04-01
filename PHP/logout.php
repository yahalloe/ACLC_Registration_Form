<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cancel'])) {
        header("Location: ../HTML/home.php");
        exit();
    }

    // Only process logout if "confirm" is clicked
    session_unset();
    session_destroy();
    header("Location: ../HTML/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <link rel="stylesheet" href="../HTML/style/style.css">
</head>

<body>
    <style>
        .box{
            padding: 1.25em 5.25em;
        }
    </style>
        <div class="container">
            <div class="box">
                <div class="fieldInput">Are you sure?</div>
                <form method="post">
                    <button class="btn" name="confirm" value="yes">Yes</button>
                    <button class="btn" name="cancel" value="no">No</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>