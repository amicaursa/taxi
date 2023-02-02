<!DOCTYPE html>
<?php 
            if(!$_COOKIE['emp-type'])
            {
                setcookie("emp-type", "driver", time() + (86400 * 2), "/"); //на 2 дня
                echo '<script> window.location.reload();</script>';
            };
            ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Водители</title>
    <link rel="stylesheet" href="../styles/employee-info-style.css">
</head>

<body>
    <?php include "../main_pages/header.php" ?>
    <main>
        <?php session_start();
        require_once("../db+php/connect.php");
        if (!$_SESSION['user']) {
            header('Location: ../profile/login.php');
        }
        if ($_SESSION['user']['all']['employee_type_id'] != 3) {
            header('Location: ../index.php');
        }
        ?>
        <h1 align='center'>Работники:</h1>
        <form action="" method="get" class="get-form" id='get-form' name="getform">
            <div>
                <label for="employee-type">Выберите тип работника:</label>
                <select class="employee-type" name="employee-type" id="employee-type">
                    <option>driver</option>
                    <option>mechanic</option>
                </select>
            </div>
            <input type="submit" value="Подтвердить" onclick="ftch()" style="margin-left:10px;">
        </form>
        <?php
        $all_workers = mysqli_query($connect, "SELECT et.type, u.name, u.surname, u.patronymic, u.login, u.password, u.ID FROM user u
        LEFT JOIN employee e on u.ID = e.user_id
        LEFT JOIN employee_type et on et.ID = u.employee_type_id;");
        $num_rows = mysqli_num_rows($all_workers);
        $all_workers = mysqli_fetch_all($all_workers);
        echo ' <form action="../queries/employee-del.php" method="post" class="post-form"><table class="order-table">
        <tr>
            <td>ФИО</td>
            <td>Профиль</td>
            <td>Логин</td>
            <td>Пароль</td>
        </tr>';
        for ($i = 0; $i < $num_rows; $i++) {
            if ($all_workers[$i][0] == $_COOKIE['emp-type'])
            {
                echo '<tr><td>' . $all_workers[$i][2] . ' ' . $all_workers[$i][1] . ' ' . $all_workers[$i][3] . '</td><td>'
                    . $all_workers[$i][0] . '</td><td>' . $all_workers[$i][4] . '</td><td>'
                    .  $all_workers[$i][5] .'</td><td><input type="checkbox" class="del_check" name="'.$all_workers[$i][6].'"value="'.$all_workers[$i][6].'"></input></td></tr>';
            }
        }
        echo '</table><input type="submit" value="Удалить"></input></form>';
        ?>
        <form action="../queries/employee-add.php" method="post" class="add_car_form" >
            <label>
                <div class="label__text">
                    Медицинская книжка
                </div>
                <input type="text" name="med_book">
            </label>
            <label>
                <div class="label__text">
                    СНИЛС
                </div>
                <input type="text" name="SNILS" required>
            </label>
            <label>
                <div class="label__text">
                    Серия и номер паспорта
                </div>
                <input type="text" name="pass" required>
            </label>
            <label>
                <div class="label__text">
                    Зарплата
                </div>
                <input type="number" name="salary" required>
            </label>
            <label>
                <div class="label__text">
                    Водительская лицензия
                </div>
                <input type="text" name="driv_lic">
            </label>
            <label>
                <div class="label__text">
                    Имя
                </div>
                <input type="text" name="name" required>
            </label>
            <label>
                <div class="label__text">
                    Фамилия
                </div>
                <input type="text" name="surname" required>
            </label>
            <label>
                <div class="label__text">
                    Отчество
                </div>
                <input type="text" name="patronymic" >
            </label>
            <label>
                <div class="label__text">
                    Номер телефона
                </div>
                <input type="text" name="ph_numb" required>
            </label>
            <label>
                <div class="label__text">
                    Логин
                </div>
                <input type="text" name="login" required>
            </label>
            <label>
                <div class="label__text">
                    Пароль
                </div>
                <input type="text" name="password" required>
            </label>
            <?php
            $db = new PDO('mysql:host=127.0.0.1;dbname=taxi', 'root', '');

            $stmt = $db->prepare("SELECT type, ID from employee_type");
            $stmt->execute();
            $option_emp_type = $stmt->fetchAll();
            echo '
            <label>
            <div class="label__text">
                    Тип работника
                    </div>
            <select class="employee_type" name="employee_type" id="employee-type">';
            for($j = 0;$j<count($option_emp_type);$j++)
            {
                if($option_emp_type[$j][1]!=3 && $option_emp_type[$j][1]!=1){
                echo '<option value="' . $option_emp_type[$j][1] .'" >'.$option_emp_type[$j][0].'</option>';
                }

            }
            echo '</select></label>';       
            ?>
            <input type="submit" value="Подтвердить" style="margin-top: 10px;">
        </form>
    </main>
    <?php include "../main_pages/footer.php" ?>
    <script>
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return decodeURIComponent(parts.pop().split(';').shift());
        }
        let elem = document.getElementById('employee-type');
            elem.value = getCookie('emp-type');
        async function ftch() {
            var oldform = document.forms.getform;
            var formdata = new FormData(oldform);
            let p1 = formdata.get("employee-type");
            let ft = await fetch('../queries/employee-get.php?' + 'employee-type=' + p1)
                .then((response) => {
                    window.location.reload();
                    let elem = document.getElementById('employee-type');
                    elem.value = getCookie('emp-type');
                    return response.json();
                })
                .then((data) => {
                    console.log(data);
                    return data;
                });
        }

    </script>
</body>


</html>