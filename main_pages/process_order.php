<?php
session_start();
require_once("../db+php/connect.php");
$connect = mysqli_connect('localhost', 'root', '', 'taxi');
if (!$connect) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
// Получение данных формы
$place_plant = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['place_plant']), ENT_QUOTES, 'UTF-8');
$place_arrival = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['place_arrival']), ENT_QUOTES, 'UTF-8');
$payment = intval($_POST['payment']);
$date_p = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['date_p']), ENT_QUOTES, 'UTF-8');
$date_p = date("Y-m-d", strtotime($date_p));
$time_p = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['time_p']), ENT_QUOTES, 'UTF-8');
$time_p = date("H:i:s", strtotime($time_p));
$user_id = $_SESSION['user']['all']['ID'];
$login_n = $_SESSION['user']['all']['login'];

// Подготовка и выполнение SQL-запроса
mysqli_query($connect, "INSERT INTO trip (user_id, login_n, place_plant, place_arrival, payment, date_p, time_p) VALUES ('$user_id', '$login_n', '$place_plant', '$place_arrival', '$payment', '$date_p', '$time_p')");
header("Location: orders.php");
?>