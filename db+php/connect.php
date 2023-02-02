<?php
$connect = mysqli_connect('127.0.0.1', 'root', '', 'taxi');
//адрес сервера, имя пользователя, пароль, имя базы данных
if ($connect == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}

// $connect = mysqli_connect('localhost', 'dokukinemi_taxi2', 'qqqqqqqq000Q', 'dokukinemi_taxi2'); 
// //адрес сервера, имя пользователя, пароль, имя базы данных
// if (!$connect) {
// die('err database connect');
// }