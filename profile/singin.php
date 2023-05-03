<?php
session_start();
unset($_SESSION['log_fail']);
require_once("../db+php/connect.php");

$login = $_POST['login'];
$pass = $_POST['password'];

$check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$pass';");


if ($check_user && mysqli_num_rows($check_user) > 0) {

$user = mysqli_fetch_assoc($check_user);
//$u_type = $user['employee_type_id'];

    if ($login == $user["login"] && $pass == $user["password"]) {
        //$user_type = mysqli_query($connect, "SELECT * FROM `employee_type` WHERE `ID` = '$u_type';");
        $_SESSION['user'] = ["all" => $user];
        //$_SESSION['user'] = ["type" => mysqli_fetch_assoc($user_type)];
        header('Location: ../index.php');
    }

    }
    else {
        $_SESSION['log_fail'] = "Введён неверный логин или пароль";
        header('Location: ../profile/login.php');
    }
?>