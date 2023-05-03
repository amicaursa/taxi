<!DOCTYPE html>
<html lang="ru">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-Moz-Is-Generator" content="true">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Панель заказов</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/dashboard-style.css">
    </head>
    <body>
    <?php session_start(); ?>   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">Amica Taxi</a>
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
        <h1>Панель заказов</h1>
        <div class="orders-container">
            <div class="orders-grid"></div><br>
            <div class="pagination"></div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="../scripts/orderv2.js"></script>
    </body>
</html>