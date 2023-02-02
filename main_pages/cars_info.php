<!DOCTYPE html>
<?php
if (!$_COOKIE['emp-type']) {
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
    <link rel="stylesheet" href="../styles/car-info-style.css">
</head>

<body>
    <?php include "../main_pages/header.php" ?>
    <main>
        <?php session_start();
        if (!$_SESSION['user']) {
            header('Location: ../profile/login.php');
        }
        if ($_SESSION['user']['all']['employee_type_id'] != 3) {
            header('Location: ../index.php');
        }
        ?>
        <h1 align='center'>Автомобили:</h1>
        <?php
        $db = new PDO('mysql:host=127.0.0.1;dbname=taxi', 'root', '');

        $stmt = $db->prepare("SELECT  c.image , cb.brand, c.name, cs.class, ct.type, ct.capacity, c.reg_number, u.login, c.vin_number, c.ID
        from car c
        left join car_type ct on c.car_type_id = ct.ID
        left JOIN car_class cs on c.car_class_id=cs.ID
        LEFT JOIN car_brand cb on c.car_brand_id = cb.ID
        LEFT JOIN user u on c.mechanic_id = u.ID");
        $stmt->execute();
        $all_cars = $stmt->fetchAll();
        echo ' <form action="../queries/car-del.php" method="post" class="post-form"><table class="order-table">
        <tr>
            <td>Превью</td>
            <td>Бренд</td>
            <td>Название</td>
            <td>Класс</td>
            <td>Тип</td>
            <td>Вместимость</td>
            <td>Рег. номер</td>
            <td>Логин механика</td>
            <td>VIN номер</td>
        </tr>';
        for ($i = 0; $i < count($all_cars); $i++) {
            echo '<tr><td><img src="' . $all_cars[$i][0] . '" alt="img" class="car-pics"></td><td>' . $all_cars[$i][1] . '</td><td>'
                . $all_cars[$i][2] . '</td><td> ' . $all_cars[$i][3] . '</td><td> ' . $all_cars[$i][4] . '</td><td> '
                . $all_cars[$i][5] . '</td><td> ' . $all_cars[$i][6] . '</td><td> '  . $all_cars[$i][7] . '</td><td> ' . $all_cars[$i][8] .
                '</td><td> <input type="checkbox" class="del_check" name="' . $all_cars[$i][9] . '"value="' . $all_cars[$i][9] . '"></input></td></tr>';
        }
        echo '</table><input type="submit" value="Удалить"></input></form>';
        ?>
        <form action="../queries/car-add.php" method="post" class="add_car_form" enctype="multipart/form-data">
            <label>
                <div class="label__text">
                    Регистрационный номер
                </div>
                <input type="text" name="reg_num" required>
            </label>
            <label>
                <div class="label__text">
                    VIN номер
                </div>
                <input type="text" name="vin_num" required>
            </label>
            <label>
                <div class="label__text">
                    Вместимость
                </div>
                <input type="text" name="capa" required>
            </label>
            <label>
                <div class="label__text">
                    Название
                </div>
                <input type="text" name="name" required>
            </label>
            <?php
            $stmt = $db->prepare("SELECT brand, ID from car_brand");
            $stmt->execute();
            $option_car_brand = $stmt->fetchAll();
            echo '
            <label>
            <div class="label__text">
                    Бренд
                    </div>
            <select class="car_brand" name="car_brand" id="car-brand">';
            for($j = 0;$j<count($option_car_brand);$j++)
            {
                echo '<option value="' . $option_car_brand[$j][1] .'" >'.$option_car_brand[$j][0].'</option>';
            }
            echo '</select></label>';       
            ?>
            <?php
            $stmt = $db->prepare("SELECT type, ID from car_type");
            $stmt->execute();
            $option_car_type = $stmt->fetchAll();
            echo '
            <label>
            <div class="label__text">
                    Тип
                    </div>

            <select class="car_type" name="car_type" id="car-type">';
            for($j = 0;$j<count($option_car_type);$j++)
            {
                echo '<option value="' . $option_car_type[$j][1] .'" >'.$option_car_type[$j][0].'</option>';
            }
            echo '</select></label>';       
            ?>
            <?php
            $stmt = $db->prepare("SELECT class, ID from car_class");
            $stmt->execute();
            $option_car_class = $stmt->fetchAll();
            echo '
            <label>
            <div class="label__text">
                    Класс
                    </div>
            <select class="car_class" name="car_class" id="car-class">';
            for($j = 0;$j<count($option_car_class);$j++)
            {
                echo '<option value="' . $option_car_class[$j][1] .'" >'.$option_car_class[$j][0].'</option>';
            }
            echo '</select></label>';       
            ?>
            <?php
            $stmt = $db->prepare("SELECT login, ID from user where employee_type_id = 4");
            $stmt->execute();
            $option_mech_login = $stmt->fetchAll();
            echo '
            <label>
            <div class="label__text">
                    Механик
                    </div>
            <select class="mech_login" name="mech_login" id="mech-login">';
            for($j = 0;$j<count($option_mech_login);$j++)
            {
                echo '<option value="' . $option_mech_login[$j][1] .'" >'.$option_mech_login[$j][0].'</option>';
            }
            echo '</select></label>';       
            ?>
            <input type="file" name="img" style="margin-top: 10px;">
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
<!-- <td>
                    <p style="display: flex;
    margin: 0;
    justify-content: center;">Дней: <span id="dur-days"></span></p>
                    <input type="range" min="1" max="31" value="3" class="dur-slider" id="myRange">
                </td> -->