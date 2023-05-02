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
        <nav class="navbar sticky-top navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Amica taxi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="../profile/login.php">Логин</a>
                        <?php
                            if (!$_SESSION['user']) {
                            echo '<a href="profile/login.php">
                            </a>';
                            } else {
                            echo '<a href="../profile/profile.php" >'. $_SESSION['user']['all']["name"] . ' </a>';
                            }
                        ?>
                        <a class="nav-link" href="../profile/registerpage.php" tabindex="-1">Регистрация</a>
                        <?php
                            if (!$_SESSION['user']) {
                                echo '<a href="../profile/registerpage.php">
                                    </a>';
                            }
                            else{
                                echo '<a href="../profile/singout.php" class="header_links">Выйти</a>';
                            }
                        ?>
                    </div>
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