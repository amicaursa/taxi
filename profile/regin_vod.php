<?php
session_start();
require_once("../db+php/connect.php");
$connect = mysqli_connect('localhost', 'root', '', 'taxi');
if (!$connect) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

$name = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['name']), ENT_QUOTES, 'UTF-8');
$surname = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['surname']), ENT_QUOTES, 'UTF-8');
$login = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['login']), ENT_QUOTES, 'UTF-8');
$pass = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['password']), ENT_QUOTES, 'UTF-8');
$phone = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['phone_number']), ENT_QUOTES, 'UTF-8');

if (empty($phone) || empty($login) || empty($pass) || empty($name) || empty($surname)) {
    $_SESSION['reg_message'] = "Пожалуйста, заполните все поля";
    header('Location: ../profile/registerpage_vod.php');
    exit();
} else {
    $checkQuery = "SELECT * FROM user WHERE `login` = '$login'";
    $checkResult = mysqli_query($connect, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['reg_message'] = "Данный логин уже занят. Пожалуйста, выберите другой логин.";
        header('Location: ../profile/registerpage_vod.php');
        exit();
    } else {
        echo "Name: " . $name . "<br>";
echo "Surname: " . $surname . "<br>";
echo "Phone: " . $phone . "<br>";
echo "Login: " . $login . "<br>";
echo "Password: " . $pass . "<br>";
mysqli_query($connect, "INSERT INTO user (`name`, employee_type_id, surname, phone_number, `login`, `password`) VALUES ('$name', 2, '$surname', '$phone', '$login', '$pass')");
        $all_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login'"));//all info
        $_SESSION['user'] = ["all" => $all_info];
        header('Location: ../index.php');
    }
}
?>