<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $user_data = $username . ":" . $password . PHP_EOL;
    file_put_contents('users.txt', $user_data, FILE_APPEND);
    echo "Registrationed for hangman ";
}
?>