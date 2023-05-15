<?php
session_start();
require_once("../db+php/connect.php");
$connect = mysqli_connect('localhost', 'root', '', 'taxi');
if (!$connect) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Выполнение запроса для получения данных заказов
$query = "SELECT * FROM trip WHERE flag = 1";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Ошибка выполнения запроса: " . mysqli_error($connect));
}

$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}

// Закрытие соединения с базой данных
mysqli_close($connect);

// Возвращение данных в формате JSON
echo json_encode($orders);
?>