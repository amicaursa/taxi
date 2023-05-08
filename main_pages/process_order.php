<?php
session_start();
require_once("../db+php/connect.php");
$connect = mysqli_connect('localhost', 'root', '', 'taxi');
if (!$connect) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
// Получение данных формы
$place_plant = $_POST['place_plant'];
$place_arrival = $_POST['place_arrival'];
$payment = $_POST['payment'];
$payment = intval($payment);
$date_p = $_POST['date_p'];
$date_p = date("Y-m-d", strtotime($date_p));
$time_p = $_POST['time_p'];
$time_p = date("H:i:s", strtotime($time_p));
$user_id = $_SESSION['user']['all']['ID'];
$login_n = $_SESSION['user']['all']['login'];

// Подготовка и выполнение SQL-запроса
mysqli_query($connect, "INSERT INTO trip (user_id, login_n, place_plant, place_arrival, payment, date_p, time_p) VALUES ('$user_id', '$login_n', '$place_plant', '$place_arrival', '$payment', '$date_p', '$time_p')");
header("Location: orders.php");
?>