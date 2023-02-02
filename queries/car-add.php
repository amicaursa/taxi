<?php
session_start();
require_once("../db+php/connect.php");

$reg_num = $_POST['reg_num'];
$vin_num = $_POST['vin_num'];
$capa = $_POST['capa'];
$name = $_POST['name'];
$car_brand = $_POST['car_brand'];
$car_type = $_POST['car_type'];
$car_class = $_POST['car_class'];
$mech_login = $_POST['mech_login'];
$image = $_POST['img'];
$path = '../pics/' .time(). $_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'], $path);

$tt = mysqli_query($connect, "INSERT INTO `car`(`reg_number`, `mechanic_id`, `car_class_id`, `car_brand_id`, `car_type_id`, `vin_number`, `name`, `image`)
        VALUES ('$reg_num', '$mech_login' , '$car_class', '$car_brand', '$car_type', '$vin_num', '$name', '$path')");
header('Location: ../main_pages/cars_info.php');

?>