<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Loggin System</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <h2>Login</h2>
    <form action="loginbd.php" method="post">
    <?php include ('error.php');?>
    <?php if (isset($_SESSION['error.php'])):?>
        <h3>
        <?php
            echo $_SESSION['error.php'];
            unset ($_SESSION['error.php']);
        ?>
    <?php endif ?>
        </h3>
        <label for="username">Username</label>
        <input type="text" name="username">

        <label for="password">Password</label>
        <input type="password" name="password">

        <button type="submit" name="login_user" class="btn">Login</button>
        <p>Already a member?<a href="register.php">Sign Up</a></p>
    </form>
</body>
</html>