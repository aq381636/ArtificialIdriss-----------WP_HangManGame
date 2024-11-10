<?php
session_start();
$user_data_file = 'users.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $message = "";

  
    $users = file($user_data_file, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($existing_username, ) = explode(':', $user);
        if ($existing_username === $username) {
            $message = "Username already exists. Try another.";
            header("Location: register.html");
            exit();
        }
    }

 
    if (!$message) {
        $entry = $username . ":" . password_hash($password, PASSWORD_DEFAULT) . "\n";
        file_put_contents($user_data_file, $entry, FILE_APPEND);
        $_SESSION['username'] = $username;
        header("Location: login.html");
        exit();
    }
}
?>