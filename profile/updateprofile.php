<?php
session_start();
unset($_SESSION['reg_message']);
require_once("../db+php/connect.php");

$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];
$pass = $_POST['password'];
$pass_check = $_POST['password_check'];


if($name == '' || $surname == '' || $phone == '' ||  $pass == '' || $pass_check == '')
{
    $_SESSION['reg_message'] = "Пожалуйста, заполните все поля";
    header('Location: ../profile/profile-change.php');
}
else{
    if($pass == $pass_check)
    {
        $login = $_SESSION['user']['all']['login'];
        $get_info = "CALL AboutInfo('$login');";
        mysqli_query($connect, "UPDATE `user` SET `password` = '$pass', `name` = '$name', `surname` = '$surname', `phone_number` = '$phone' WHERE `login` = '$login'");
        $all_info = mysqli_fetch_assoc(mysqli_query($connect, $get_info));//all info
        $_SESSION['user'] = ["all" => $all_info];
        header('Location: ../profile/profile.php');
    }
    else
    {
        $_SESSION['reg_message'] = "Пароли не совпадают :(";
        header('Location: ../profile/profile-change.php');

    }
         

}
?>