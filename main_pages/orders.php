<!DOCTYPE html>
<?php
// Фиксация ошибок
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("../db+php/connect.php");
// Проверка наличия/создания cookie на 2 дня
if (!$_COOKIE['date'] || date('Y-m-d') > $_COOKIE['date']) {
    setcookie("date", date('Y-m-d'), time() + (86400 * 2), "/"); 
    echo '<script> window.location.reload();</script>';
};
if (!$_COOKIE['type']) {
    setcookie("type", "Легковой", time() + (86400 * 2), "/"); //на 2 дня
    echo '<script> window.location.reload();</script>';
};
// Получение данных из trip и создание 3 одноименных массивов
$sort_dates = mysqli_fetch_all(mysqli_query($connect, "SELECT car_user_id, date, road_time from trip"));
$sort_dates_ids = array_column($sort_dates, 0);
$sort_dates_start = array_column($sort_dates, 1);
$sort_dates_end = array_column($sort_dates, 2);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказ такси</title>
    <link rel="stylesheet" href="../styles/orders-style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

</head>

<body>
    <div class="popup__bg">
        <form class="popup" action="../queries/order-approve.php" method="post" class="post-form">
            <img src="../pics/icon-close.svg" class="close-popup">
            <img src="../pics/lada.png" class="car-img" id="popup-car-img">

            <label>
                <div class="about_trip" id="auto-name">
                    Лада Гранта
                </div>
                <div class="label__text">
                    Название автомобиля
                </div>
            </label>
            <label>
                <div class="about_trip" id="driver-name">
                    Анатолий Карпов
                </div>
                <div class="label__text">
                    Имя водителя
                </div>
            </label>
            <label>
                <input type="text" name="mail" required>
                <div class="label__text">
                    Ваша почта(для чека)
                </div>
            </label>
            <label>
                <input type="text" name="dispatch_address" required>
                <div class="label__text">
                    Адрес отправления
                </div>
            </label>
            <input type="hidden" name="hid_id" id="car-user-id" value="">
            <label>
                <input type="date" name="find_data" id="date-start" value="<?php echo $_COOKIE['date'] ?>" min="<?php echo date('Y-m-d'); ?>">
                <div class="label__text">
                    Дата начала аренды
                </div>
            </label>
            <label>
                <div class="about_trip" id="trip-price">
                    43-43-43
                </div>
                <div class="label__text">
                    Стоимость аренды
                </div>
            </label>
            <label>
                <p style="display: flex;
            margin: 0;
            justify-content: center;">Дней: <span id="dur-days"></span></p>
                <input type="range" min="1" max="10" value="3" class="dur-slider" id="myRange" name="days">
            </label>
            <button type="submit">Сделать заказ</button>
        </form>
    </div>
    <?php include "../main_pages/header.php" ?>
    <main>
        <?php session_start();
        require_once("../db+php/connect.php");
        if (!$_SESSION['user']) {
            header('Location:../profile/login.php');
        }
        if ($_SESSION['order']['approve']) {
            echo '<div class="done" align="center"> <h2>Заказ успешно оформлен!</h2></div>';
            unset($_SESSION['order']['approve']);
        }
        ?>
        <h1 align='center'>Выберите машину из списка доступных:</h1>
        <form action="" method="get" class="get-form" id='get-form' name="getform">
            <div>
                <label for="ord-car-type">Выберите тип автомобиля:</label>
                <select class="ord-car-type" name="car_type" id="car-type">
                    <option>Эконом</option>
                    <option>Комфорт</option>
                    <option>Рандом</option>
                    <option>Премиум</option>
                    <option>Электрический</option>
                    <option>Грузовой</option>
                </select>
            </div>
            <div>
                <label for="find-data">Выберите дату поездки:</label>
                <input type="date" name="find_data" id="find-data" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
            </div>
            <input type="submit" value="Подтвердить" onclick="ftch()">
        </form>
        <?php
        $cur_date = new DateTime($_COOKIE['date']);
        $cur_date = $cur_date->format('Y-m-d');
        $all_cars = mysqli_query($connect, "SELECT cb.brand, c1.name,  cc.class,  ct.type, u.name, u.surname, ct.capacity, c1.image, cu.user_id, cu.car_id, cu.ID
        from car c1
        RIGHT join car_user as cu on c1.ID = cu.car_id
        LEFT JOIN car_brand as cb on c1.car_brand_id = cb.ID
        LEFT JOIN car_class as cc on c1.car_class_id = cc.ID
        LEFT JOIN car_type as ct on c1.car_type_id = ct.ID
        LEFT JOIN user as u on cu.user_id = u.ID
        where cu.ID not in(SELECT car_user_id from trip where date <= '$cur_date' and road_time >= '$cur_date');");
        $num_rows = mysqli_num_rows($all_cars);
        $all_cars = mysqli_fetch_all($all_cars);
        echo ' <table class="order-table">
        <tr>
            <td>Название</td>
            <td>Класс автомобиля</td>
            <td>Тип автомобиля</td>
            <td>Имя водителя</td>
            <td>Вместительность</td>
            <td>Превью</td>

        </tr>';
        for ($i = 0; $i < $num_rows; $i++) {
            if ($all_cars[$i][3] == $_COOKIE['type']) //$_SESSION['order']['type'] rip
            {
                echo '<tr><td>' . $all_cars[$i][0] . ' ' . $all_cars[$i][1] . '</td><td>'
                    . $all_cars[$i][2] . '</td><td>' . $all_cars[$i][3] . '</td><td>'
                    .  $all_cars[$i][4] . ' ' . $all_cars[$i][5] . '</td><td>'
                    . $all_cars[$i][6] . '</td><td><img src="' . $all_cars[$i][7] . '" alt="img" class="car-pics"></td><td><a hidden>' . $all_cars[$i][8] . ',' . $all_cars[$i][9] . '</a><a href="#" class="open-popup" id="trip-' . $i . '">Заказать машину</a></td></tr>';
            }
        }
        echo '</table>';
        for ($i = 1; $i < 6; $i++) {
            $graph_date_now = new DateTime(date('Y-m'));
            $graph_date = new DateTime(date('Y-m'));
            date_add($graph_date, date_interval_create_from_date_string("$i months"));
            $ji = $i - 1;
            date_add($graph_date_now, date_interval_create_from_date_string("$ji months"));
            $graph_date = $graph_date->format('Y-m-d');
            $graph_date_now = $graph_date_now->format('Y-m-d');
            $orders[$i] = mysqli_fetch_assoc(mysqli_query($connect, "SELECT count(*) as c from trip where date > '$graph_date_now' and date < '$graph_date'"));
        }
        ?>
        <?php 
        if($_SESSION['user']['all']['employee_type_id'] == "3")
        {
            echo '<div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>';
        }
        ?>
        

    </main>
    <?php include "../main_pages/footer.php" ?>

    <script>
        let popupBg = document.querySelector('.popup__bg'); // Фон попап окна
        let popup = document.querySelector('.popup'); // Само окно
        let openPopupButtons = document.querySelectorAll('.open-popup'); // Кнопки для показа окна
        let closePopupButton = document.querySelector('.close-popup'); // Кнопка для скрытия окна
        openPopupButtons.forEach((button) => { // Перебираем все кнопки
            button.addEventListener('click', (e) => { // Для каждой вешаем обработчик событий на клик
                let cur_id = e.target.id;
                console.log(cur_id);
                let car_userID = document.getElementById(cur_id).previousElementSibling.innerHTML.split(',');
                ftch_cur_car(car_userID);
                console.log(car_userID);
                e.preventDefault(); // Предотвращаем дефолтное поведение браузера
                popupBg.classList.add('active'); // Добавляем класс 'active' для фона
                popup.classList.add('active'); // И для самого окна
            })
        });
        async function ftch_cur_car(car_userID) {
            let ft = await fetch('../queries/order-car.php?' + 'car_id=' + car_userID[1] + '&user_id=' + car_userID[0])
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    console.log(data);
                    return data;
                });
            var slider = document.getElementById("myRange");
            var output = document.getElementById("dur-days");
            output.innerHTML = slider.value;
            let trip_price = (parseInt(ft['increase']) * parseInt(document.getElementById('myRange').value)) * 1.3;
            document.getElementById('trip-price').innerHTML = trip_price;
            slider.oninput = function() {
                trip_price = (parseInt(ft['increase']) * parseInt(document.getElementById('myRange').value)) * 1.3;
                document.getElementById('trip-price').innerHTML = trip_price;
                output.innerHTML = this.value;
            }
            document.getElementById('auto-name').innerHTML = ft['car_name'];
            document.getElementById('driver-name').innerHTML = ft['name'];
            document.getElementById('car-user-id').value = car_userID[1] + ',' + car_userID[0];
            document.getElementById("popup-car-img").src = ft['image'];


        }
        closePopupButton.addEventListener('click', () => { // Вешаем обработчик на крестик
            popupBg.classList.remove('active'); // Убираем активный класс с фона
            popup.classList.remove('active'); // И с окна
        });
        document.addEventListener('click', (e) => { // Вешаем обработчик на весь документ
            if (e.target === popupBg) { // Если цель клика - фот, то:
                popupBg.classList.remove('active'); // Убираем активный класс с фона
                popup.classList.remove('active'); // И с окна
            }
        });


        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return decodeURIComponent(parts.pop().split(';').shift());
        }
        let type_car = document.getElementById('car-type');
        type_car.value = getCookie('type');
        let temp_date = document.getElementById('find-data');
        temp_date.value = getCookie('date');
        let storiesLinks = document.querySelectorAll('.direct-page .direct-inner-container .messages-container .text-right span');

        function setTrip(id) {
            let cars_prev = document.getElementById("item2").previousElementSibling.innerHTML;
        }

        async function ftch() {
            var oldform = document.forms.getform;
            var formdata = new FormData(oldform);
            let p1 = formdata.get("car_type");
            let p2 = formdata.get("find_data");
            let ft = await fetch('../queries/order-get.php?' + 'car_type=' + p1 + '&find_data=' + p2)
                .then((response) => {
                    window.location.reload();
                    let elem = document.getElementById('car-type');
                    elem.value = getCookie('type');
                    return response.json();
                })
                .then((data) => {
                    console.log(data);
                    return data;
                });
        }
    </script>

<script>
            const data = {
                datasets: [{
                    cubicInterpolationMode: 'monotone',
                    label: 'График количества заказов в месяце',
                    data: [

                        <?php
                        for ($i = 1; $i < count($orders); $i++) {
                        ?> {
                                x: '<?php
                                    $graph_date = new DateTime(date('Y-m'));
                                    date_add($graph_date, date_interval_create_from_date_string("$i months"));
                                    $graph_date = $graph_date->format('Y-m');
                                    echo $graph_date; ?>',
                                y: <?php echo $orders[$i]['c']; ?>
                            },

                        <?php
                        }
                        ?>

                    ],


                    borderColor: 'rgba(234,124,234,0.4)',
                    backgroundColor: 'rgba(34,14,24,0.4)'
                }]
            };
            // config block
            const config = {
                type: 'line',
                data,
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'month'
                            },
                            min: '2022-06-01',
                            max: '2022-09-01'
                        },
                        y: {
                            min: '0',
                            max: '5'
                        }
                    }
                }
            };
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
</body>

</html>