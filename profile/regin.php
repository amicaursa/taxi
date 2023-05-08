<?php
session_start();
unset($_SESSION['reg_message']);
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



if($name == '' || $surname == '' || $phone == '' || $login == '' || $pass == '')
{
    $_SESSION['reg_message'] = "Пожалуйста, заполните все поля";
    header('Location: ../profile/registerpage.php');
}
else{
    $check_user = mysqli_query($connect, "SELECT * FROM 'user' WHERE 'login' = '$login'");
    if (!$check_user || mysqli_num_rows($check_user) == 0) {
        mysqli_query($connect, "INSERT INTO `user`(`login`, `employee_type_id`, `password`, `name`, `surname`, `phone_number`)
        VALUES ('$login', 1 ,'$pass','$name','$surname','$phone')");
        $all_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login'"));//all info
        $_SESSION['user'] = ["all" => $all_info];
        header('Location: ../index.php');
    }
    else {  
        $_SESSION['reg_message'] = "Пользователь с таким логином уже существует";
        header('Location: ../profile/registerpage.php');
    }

}
?>

