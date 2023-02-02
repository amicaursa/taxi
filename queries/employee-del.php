<?php
session_start();
require_once("../db+php/connect.php");

foreach ($_POST as $key => $value) {
    $check = mysqli_query($connect, "SELECT DISTINCT t.ID FROM car_user cu LEFT JOIN trip t on t.car_user_id = cu.ID WHERE cu.user_id = '$value'");
    $rows = mysqli_num_rows($check);
    $check = mysqli_fetch_all($check);
    if($rows>0)
    {
        for($i = 0;$i < $rows; $i++)
        {
            $a = intval($check[$i][0]);
            mysqli_query($connect, "DELETE from trip where ID = '$a';");
        }
    }
    mysqli_query($connect, "DELETE from car_user cu where cu.user_id = '$value';");
    mysqli_query($connect, "DELETE from employee e
    where e.user_id = '$value';");
    mysqli_query($connect, "DELETE from user u
    where u.ID = '$value';");
}
header('Location: ../main_pages/employee_info.php');

?>