<?php
session_start();
unset($_SESSION['log_fail']);
require_once("../db+php/connect.php");

$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$login = mysqli_real_escape_string($connect, $login);
$pass = mysqli_real_escape_string($connect, $pass);

$check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$pass';");

if ($check_user && mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);

    if ($login == $user["login"] && $pass == $user["password"]) {
        $_SESSION['user'] = ["all" => $user];
        header('Location: ../index.php');
    }
}
else {
    $_SESSION['log_fail'] = "Введён неверный логин или пароль";
    header('Location: ../profile/login.php');
}
?>