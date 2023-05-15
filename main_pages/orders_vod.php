<!DOCTYPE html>
<html lang="ru">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-Moz-Is-Generator" content="true">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Панель заказов</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Подключение библиотеки jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Подключение библиотеки jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    <!-- <link rel="stylesheet" href="../styles/dashboard-style.css"> -->

    </head>
    <body>
    <?php session_start(); ?>   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php" style="text-decoration: none;">Amica Taxi</a>
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
                                    echo '<a href="orders.php"  style="text-decoration: none;"  class="nav-link">Dashboard</a>';
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
    <div id="timer"></div>
<div class="container mt-4">
    <div class="orders-container">
        <h2 align="center">Dashboard заказов</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 orders-grid mb-4 mt-1">
        </div>
    </div>
</div>
<div class="pagination d-flex justify-content-center mb-5"></div>
        </div>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../scripts/orderv4.js"></script>
    </body>
</html>