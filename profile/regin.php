<?php
session_start();
require_once("../db+php/connect.php");
$connect = mysqli_connect('localhost', 'root', '', 'taxi');
if (!$connect) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['phone_number'];
$login = $_POST['login'];
$pass = $_POST['password'];

if (empty($name) || empty($surname) || empty($phone) || empty($login) || empty($pass)) {
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
        mysqli_query($connect, "INSERT INTO user (`name`, employee_type_id, surname, phone_number, `login`, `password`) VALUES ('$name', 1, '$surname', '$phone', '$login', '$pass')");
        $all_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login'"));//all info
        $_SESSION['user'] = ["all" => $all_info];
        header('Location: ../index.php');
    }
}
?>