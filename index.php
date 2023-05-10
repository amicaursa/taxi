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
    <!-- style css
    <link rel="stylesheet" href="styles/style.css"> -->

    <!-- Подключение библиотеки jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Подключение библиотеки jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    <!-- 2gis -->
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
   
    <!-- Скрипты в теге -->
    
    <!-- 2gis -->
    <script type="text/javascript">
        var map;
        
        DG.then(function () {
            map = DG.map('map', {
                zoomControl: false
            }).setView([55.755864, 37.6176989], 13);

            DG.marker([55.755864, 37.617698]).addTo(map).bindPopup('Вы кликнули по мне!');

            DG.control.zoom({
                position: 'bottomright'
            }).addTo(map);
        });
    </script>
    
    <style>
        #map {
            position: fixed;
            top: 56px;
            left: 0;
            width: 100%;
            height: calc(100vh - 56px - 56px);
            z-index: 1;
        }
        
        .left-block {
            position: fixed;
            top: 56px;
            left: 20px;
            padding: 20px;
            width: 375px;
            z-index: 2;
            background-color: rgba(255, 255, 255, 1); 
            backdrop-filter: blur(95%); 
            margin-left: 0.5%; 
            margin-top: 2%; 
            border-radius: 12px;
        }
        
        .content-container {
            position: fixed;
            top: calc(56px + 1px);
            bottom: 56px;
            left: 0;
            right: 0;
            z-index: 2;
            overflow: hidden;
        }
        
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 3;
        }
    </style>
</head>
<body>
    <?php session_start() ?>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index: 3;">
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
                                        echo '<a href="../profile/profile.php"  style="text-decoration: none;"  class="nav-link">'. $_SESSION['user']['all']["login"] . ' </a>';
                                    }
                                ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a> 
                                <?php
                                    if (!$_SESSION['user']) {
                                        echo '<a href="../profile/registerpage.php" style="text-decoration: none;" class="nav-link" >Регистрация</a>';
                                    } else {
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 left-block">
                    <span class="span_style text-center" style="max-height: 100%">
                        <div class="div_1span">
                            <h1>Заказ поездки:</h1>
                              <form action="main_pages/process_order.php" method="POST" class="post-form">
                                <input name="place_plant" type="text" placeholder="Место посадки" class="form-control mb-2"/>
                                <input name="place_arrival" type="text" placeholder="Место прибытия" class="form-control  mb-2"/>
                                <input name="payment" type="number" placeholder="Цена" class="form-control  mb-2"/>
                                <input name="date_p" type="date"  placeholder="Дата поездки" class="form-control  mb-2"/>
                                <input name="time_p" type="time" placeholder="Время поездки" class="form-control  mb-2"/>
                                <input type="submit" value="Заказать" class="btn btn-primary">
                            </form>
                        </div>
                    </span>
                </div>
                <div class="col-9">
                    <div id="map"></div>
                </div>
            </div>
        </div>
        <br>
        <footer class="footer mt-auto py-3 bg-dark" style="z-index: 3;">
            <div class="container text-center">
                <span class="text-muted">@Amica Taxi | Powered by: @amicaursa</span>
                </div>
            </footer> 
 <!-- bootstrap и другие скрипты -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-4jPxFj+YPb8JZgF2eJyxsf5VdS0OvrOBSpkoWqV7VG0VAmU3UAm+BAlCi8vV+bBE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.js"></script>
    </body>
</html>

   