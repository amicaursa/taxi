<?php
session_start();
require_once("../db+php/connect.php");
    $user_id = $_GET['user_id'];
    $car_id = $_GET['car_id'];
    $cur_car = mysqli_query($connect, "SELECT CONCAT(cb.brand, ' ', c.name) car_name, CONCAT(u.surname, ' ', u.name, ' ', IFNULL(u.patronymic, '')) name, c.image, cu.increase
    FROM `car_user` cu
    LEFT join car c on c.ID = cu.car_id
    LEFT JOIN user u on u.ID =  cu.user_id
    LEFT JOIN car_brand cb on cb.ID = c.car_brand_id
    WHERE cu.user_id = $user_id AND cu.car_id = $car_id;");
    //$cur_car = sprintf("CALL CarTrip(%s, %s)", $user_id, $car_id);
    $cur_car = mysqli_fetch_assoc($cur_car);
    echo json_encode($cur_car);
?>
