<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-Moz-Is-Generator" content="true">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amica Taxi</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="styles/style.css">

    <!-- Подключение библиотеки jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Datepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/plugins/pikaday-i18n.js"></script>


    <!-- Подключение библиотеки jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    <!-- Подключение плагина Timepicker от jQuery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script>

    <!-- 2gis -->
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
   
    <!-- Скрипты в теге -->
    <!-- 2gis -->
    <script type="text/javascript">
            var map;
            
            DG.then(function () {
                map = DG.map('map', {
                    zoomControl: false
                }).setView([55.755864, 37.6176989], 13);  ;

                DG.marker([55.755864, 37.617698]).addTo(map).bindPopup('Вы кликнули по мне!');

                DG.control.zoom({
                    position: 'bottomright'
                }).addTo(map);
            });
        </script>
    <!-- Datepicker -->
    <script>
   $(function() {
    var picker = new Pikaday({
        field: document.querySelector('.datepicker'),
        format: 'DD.MM.YYYY', // Формат вывода даты в русской локали
        i18n: {
            previousMonth : 'Предыдущий месяц',
            nextMonth     : 'Следующий месяц',
            months        : ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            weekdays      : ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'],
            weekdaysShort : ['Вс','Пн','Вт','Ср','Чт','Пт','Сб']
        },
        onSelect: function(date) {
            console.log(date);
        }
    });
});
    </script>

    <!-- Timepicker -->
    <script>
    $(function() {
        $('#timep').timepicker({
            timeFormat: 'HH:mm',
            interval: 30,
            dropdown: true,
            scrollbar: true,
            minTime: '00:00',
            maxTime: '23:59'
        });
    });
</script>
</head>

<body>
    <?php session_start(); ?>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Amica Taxi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a>
                                <?php
                                    if (!$_SESSION['user']) {
                                    echo '<a href="profile/login.php" style="text-decoration: none;" class="nav-link">Dashboard</a>';
                                    } else {
                                    echo '<a href="main_pages/orders.php"  style="text-decoration: none;"  class="nav-link">Dashboard</a>';
                                    }
                                ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a>
                                <?php
                                    if (!$_SESSION['user']) {
                                    echo '<a href="profile/login.php" style="text-decoration: none;" class="nav-link">Логин</a>';
                                    } else {
                                    echo '<a href="../profile/profile.php"  style="text-decoration: none;"  class="nav-link">'. $_SESSION['user']['all']["name"] . ' </a>';
                                    }
                                ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a> <?php
                                    if (!$_SESSION['user']) {
                                        echo '<a href="../profile/registerpage.php" style="text-decoration: none;" class="nav-link" >Регистрация</a>';
                                    }
                                    else{
                                        echo '<a href="../profile/singout.php" style="text-decoration: none;" class="nav-link" >Выйти</a>';
                                    }
                                ?>
                                </a>
                            </li>
                        </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="container">
            <div class="left-block">
                <span class="span_style" style="max-height: 100%">
                    <div class="div_1span">
                            <div class="div_in_section_l1">
                                <h1>Заказ поездки:</h1>
                                        <div class="div_in_section_l3">
                                                    <input type="text" placeholder="Место посадки"/>
                                                    <input type="text" placeholder="Место прибытия"/>
                                                    <input type="text" placeholder="Цена"/>
                                                    <input type="text" class="datepicker" placeholder="Дата поездки"/>
                                                    <input type="text" class="timepicker" placeholder="Время поездки"/>
                                        </div>
                                        <button id = "order-btn">Заказать</button> 
                            </div>
                    </div>
                </span>
                <br>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Как заказать такси?
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Заполните все поля формы "Заказ поездки" и нажмите кнопку "Заказать"
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Как отследить статус заказа?
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            На странице "Заказы" отображен статус вашего заказа на данный момент и все предыдущие поездки
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Какой способ оплаты?
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            На данный момент принимается только наличный способ оплаты
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
            <div class="right-block" src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full" id="map">
            </div>
        </div>
        <br>
        <footer class="footer mt-auto py-3 bg-dark">
                <div class="container">
                    <span class="text-muted">@Amica Taxi 2023 | Powered by: @amicaursa</span>
                </div>
            </footer>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="scripts/index.js"></script>

  </body>
</html>