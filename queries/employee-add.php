<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("../db+php/connect.php");

$med_book = $_POST['med_book'];
$SNILS = $_POST['SNILS'];
$pass = $_POST['pass'];
$salary = $_POST['salary'];
$driv_lic = $_POST['driv_lic'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$ph_numb = $_POST['ph_numb'];
$login = $_POST['login'];
$password = $_POST['password'];
$employee_type = $_POST['employee_type'];

mysqli_query($connect, "INSERT INTO `user`(`name`, `employee_type_id`, `surname`, `patronymic`, `phone_number`, `login`, `password`)
VALUES ('$name','$employee_type','$surname','$patronymic','$ph_numb','$login','$password')");
$all_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM user WHERE user.login = '$login'"));//all info
$u_id = $all_info['ID'];
mysqli_query($connect, "INSERT INTO `employee`(`med_book`, `user_id`, `employee_type_id`, `SNILS`, `passport_id`, `salary`, `drive_licence`)
VALUES ('$med_book','$u_id','$employee_type','$SNILS','$pass','$salary','$driv_lic')");
$emp_inf = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * from employee where user_id = '$u_id'"));
$e_id = $emp_inf['ID'];
$a1 = mysqli_query($connect, "UPDATE `user` SET `employee_id`='$e_id';");
header('Location: ../main_pages/employee_info.php');
?>