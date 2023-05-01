<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/header-style.css">

</head>
<body>
    <?php session_start(); ?>
        <div class="header_logo">
        <a href="/">
            <img src="../pics/taxi-logo.png" alt="taxi_main_logo">
        </a>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Amica taxi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="./index.php">Главная</a>
                        <a class="nav-link" href="../main_pages/orders.php">Заказать машину</a>
                        <?php
                            if ($_SESSION['user']['all']['employee_type_id'] == "1" && $_SESSION['user']['all']['employee_type_id'] == "2") {
                            echo '
                                <a href="../main_pages/drive_history.php" class="header_links">
                                История поездок
                                </a>';
                        } ?>
                        //
                        <a class="nav-link" href="#">Логин</a>
                        <?php
                            if (!$_SESSION['user']) {
                            echo '<a href="profile/login.php">
                                Логин
                            </a>';
                            } else {
                            echo '<a href="../profile/profile.php" >'. $_SESSION['user']['all']["name"] . ' </a>';
                            }
                        ?>
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Регистрация</a>
                        <?php
                            if (!$_SESSION['user']) {
                                echo '<a href="../profile/registerpage.php">
                                    Регистрация
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
</body>
</html>