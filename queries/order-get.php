<?php
session_start();
    $type = $_GET['car_type'];
    if($_GET['find_data'])
    {
        $date = $_GET['find_data'];
        setcookie("date", $date, time() + (86400 * 2), "/"); //на 2 дня
    }
    setcookie("type", $type, time() + (86400 * 2), "/"); //на 2 дня
    $_GET['car_type'];
    echo json_encode($date);
?>
