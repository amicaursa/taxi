<?php
session_start();
require_once("../db+php/connect.php");

$days = $_POST['days'];
$mail = $_POST['mail'];
$id = explode(",",$_POST['hid_id']);
$start_data = $_POST['find_data'];
$address = $_POST['dispatch_address'];
$user = intval($_SESSION['user']["all"]['ID']);
$road_time = new DateTime($start_data);
$start_data = new DateTime($start_data);
date_add($road_time, date_interval_create_from_date_string("$days days"));
$start_data = $start_data->format('Y-m-d H:i:s');
$road_time = $road_time->format('Y-m-d H:i:s');

$cu = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * from car_user c
                    where c.user_id = $id[1] and c.car_id = $id[0];"));
$cu_id = intval($cu['ID']);
$payment = intval($cu['increase']) * intval($days) * 1.333;

$auto = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * from car c
                    where c.ID = $id[0];"));
$dr_name = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * from car_user c left join user u on u.ID=c.user_id
where c.user_id = $id[1] and c.car_id = $id[0];"));

print_r($dr_name['name']);
mysqli_query($connect, "INSERT INTO `trip`(`date`, `user_id`, `car_user_id`, `road_time`, `dispatch_address`, `payment`)
        VALUES ('$start_data', '$user' , '$cu_id', '$road_time', '$address', '$payment')");
$_SESSION['order'] = ["approve" => true]; 
    $from = "sergey.shcha@gmail.com";
    $to = $mail;
    $subj = "Аренда автомобиля";
    $msg = '<h2>Добрый день! Рады, что вы выбрали нашу компанию. Ниже представлена информация о вашем заказе:</h2>
    <table style=>
    <tr><td>Название автомобиля</td><td>' . $auto['name']. '</td></tr>
    <tr><td>Имя водителя</td><td>' . $dr_name['surname'] . ' ' . $dr_name['name'] .' '. $dr_name['patronymic'] . '</td></tr>
    <tr><td>Адрес отправления</td><td>'.  $address .'</td></tr>
    <tr><td>Дата начала аренды</td><td>' . $start_data . '</td></tr>
    <tr><td>Дата окончания аренды</td><td> ' . $road_time. '</td></tr>
    <tr><td>Общая стоимость</td><td> ' . $payment . '$</td></tr>
    </table>';
    $hdr = "Content-type: text/html; charset=utf-8\r\n" . "From: $from" . "\r\n" . "Reply-To: $from" . "\r\n" . "X-Mailer: PHP/" . phpversion();
    mail($to, $subj, $msg, $hdr);
    
header('Location: ../main_pages/orders.php');

?>