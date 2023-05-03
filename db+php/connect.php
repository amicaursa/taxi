<?php
$connect = mysqli_connect('localhost', 'root', '', 'taxi');
//адрес сервера, имя пользователя, пароль, имя базы данных
if ($connect == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}

// $connect = mysqli_connect('localhost', 'dokukinemi_taxi2', 'qqqqqqqq000Q', 'dokukinemi_taxi2'); 
// //адрес сервера, имя пользователя, пароль, имя базы данных
// if (!$connect) {
// die('err database connect');
// }