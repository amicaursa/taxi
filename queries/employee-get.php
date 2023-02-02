<?php
session_start();
    $type = $_GET['employee-type'];
    setcookie("emp-type", $type, time() + (86400 * 2), "/"); //на 2 дня
    echo json_encode($date);
?>
