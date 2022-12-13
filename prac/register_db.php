<?php
session_start();
include('server.php');
$errors = array();

if (isset($_POST['reg_user'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['username_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    if (empty($username)){
        array_push($errors,"Username is required");
    }
    if (empty($email)){
        array_push($errors,"email is required");
    }
    if (empty($password_1)){
        array_push($errors,"Password is required");
    }
    if (empty($password_2)){
        array_push($errors,"The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result){
        if ($result['$username'] === $username){
            array_push($errors,"Username is already exits");
        }
        if ($result['$email'] === $email){
            array_push($errors,"Email is already exits");
        }
    }
    if (count($errors) == 0){
        $password = md5($password);
        $sql = "INSERT INTO (username, email, password) VALUES ('$username', '$email', '$password')'";
        $result = mysqli_query($conn,$sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header("Location: index.php");
        }else {
            array_push($errors, "Username or email aredy exits");
            $_SESSION['error'] = "Username or email aredy exits";
            header("Location: register.php");
        }
    }
 ?>