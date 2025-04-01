<?php
session_start();
include "../PHP/config.inc.php";

if (!isset($_SESSION["username"])) {
    echo "<script>
        alert('Invalid request!');
        window.location.href = 'index.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">

    <title>Home</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">
            <!-- todo make a profile page? -->
            <a href="#"><button class="btn">Change Profile</button></a>
            <a href="../PHP/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>

    <main>
        <?php
        $username = $_SESSION["username"];
        $query = "SELECT email, age FROM users WHERE username = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row["email"];
            $age = $row["age"];
        } else {
            $email = "Not found";
            $age = "Not found";
        }

        $stmt->close();
        ?>

        <div class="main-box top">

            <div class="top">

                <div class="box">
                    <p>Hello <b><?php echo htmlspecialchars($username); ?></b>, Welcome</p>
                </div>

                <div class="box">
                    <p>Your email is <b><?php echo htmlspecialchars($email); ?></b>.</p>
                </div>
            </div>

            <div class="bottom">

                <div class="box">
                    <p>And you are <b><?php echo htmlspecialchars($age); ?> years old</b>.</p>
                </div>
            </div>

        </div>
    </main>
</body>

</html>