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
    <header>
        <div class="header_logo">
        <a href="/">
            <img src="../pics/taxi-logo.png" alt="taxi_main_logo">
        </a>
        </div>
        <nav>
            <a href="../main_pages/orders.php" class="header_links">
                Заказать машину
            </a>
            <?php
            if ($_SESSION['user']['all']['employee_type_id'] == "1" && $_SESSION['user']['all']['employee_type_id'] == "2") {
                echo '
           <a href="../main_pages/drive_history.php" class="header_links">
                История поездок
            </a>';
            } ?>
            
            <?php
            if ($_SESSION['user']['all']['employee_type_id'] == "3") {
                echo '
            <a href="../main_pages/employee_info.php" class="header_links">
                Статистика водителей
            </a>
            <a href="../main_pages/cars_info.php" class="header_links">
                Управление автомобилями
            </a>';
            } ?>
            <div class="login_logout">
                <div class="login-main-ref">
                    <?php
                    if (!$_SESSION['user']) {
                        echo '<a href="profile/login.php">
                            Логин
                        </a>';
                    } else {
                        echo '<a href="../profile/profile.php" >Привет, '. $_SESSION['user']['all']["name"] . ' </a>';
                    }
                    ?>
                </div>
                <div class="registration-main">
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

        </nav>
    </header>
</body>
</html>