<?php
session_start();
include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register System</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <h2>Register</h2>
    <form action="register_db.php" method="post">
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

        <label for="email">email</label>
        <input type="text" name="email">

        <label for="password_1">Password</label>
        <input type="text" name="username">

        <label for="password_2">C Password</label>
        <input type="password" name="password_2">

        <button type="submit" name="reg_user" class="btn">Register</button>
        <p>Already a member?<a href="login.php">Sign In</a></p>
    </form>
</body>
</html>