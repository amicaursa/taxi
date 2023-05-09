<?php
session_start();
require_once("../db+php/connect.php");
$connect = mysqli_connect('localhost', 'root', '', 'taxi');
if (!$connect) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

$login = $_POST['login'];
$pass = $_POST['password'];
$phone = $_POST['phone_number'];

if (empty($phone) || empty($login) || empty($pass)) {
    $_SESSION['reg_message'] = "Пожалуйста, заполните все поля";
    header('Location: ../profile/registerpage.php');
    exit();
} else {
    $checkQuery = "SELECT * FROM user WHERE `login` = '$login'";
    $checkResult = mysqli_query($connect, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['reg_message'] = "Данный логин уже занят. Пожалуйста, выберите другой логин.";
        header('Location: ../profile/registerpage.php');
        exit();
    } else {
        mysqli_query($connect, "INSERT INTO user (employee_type_id, phone_number, `login`, `password`) VALUES (1, '$phone', '$login', '$pass')");
        $all_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login'"));//all info
        $_SESSION['user'] = ["all" => $all_info];
        header('Location: ../index.php');
    }
}
?>