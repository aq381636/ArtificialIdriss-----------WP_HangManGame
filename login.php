<?php
session_start();
$user_data_file = 'users.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $message = "";

    $users = file($user_data_file, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($existing_username, $hashed_password) = explode(':', $user);
        if ($existing_username === $username && password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        }
    }

  
    header("Location: login.html");
    exit();
}
?>