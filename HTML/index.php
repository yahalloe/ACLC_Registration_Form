<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="../HTML/style/style.css">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">
            <header>ACLC LOGIN</header>

            <?php
            if (isset($_GET['error'])) {
                echo '<p style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
            }
            ?>
            <form action="../PHP/login.php" method="post">

                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>