<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-Moz-Is-Generator" content="true">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Profile</title>

    <link rel="stylesheet" href="../styles/profile-change-style.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
<?php session_start();
    require_once("../db+php/connect.php");
        if (!$_SESSION['user']) {
            header('Location: ../profile/login.php');}
            ?>
    <main>
    <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">Amica Taxi</a>
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
        <br>
        <h1 align="center">Редактирование профиля</h1>
        <div class="container">
            <form action="../profile/updateprofile.php" method="post" class="post-form">
                <div class="row">
                    <div class="col-25">
                        <label for="POST-name"><strong>Изменить имя:</strong></label>
                    </div>
                    <div class="col-75">
                        <input id="POST-name" type="text" name="name" value='<?php echo $_SESSION['user']['all']['name'];?>'>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-surname"><strong>Изменить фамилию:</strong></label>

                    </div>
                    <div class="col-75">
                        <input id="POST-surname" type="text" name="surname" value='<?php echo $_SESSION['user']['all']['surname'];?>'>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-phone"><strong>Изменить номер телефона:</strong></label>
                    </div>
                    <div class="col-75">
                        <input id="POST-phone" type="tel" name="phone" value='<?php echo $_SESSION['user']['all']['phone_number'];?>'>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-login"><strong>Изменить пароль:</strong></label>
                    </div>
                    <div class="col-75">
                        <input id="POST-login" type="password" name="password" value=''>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-password"><strong>Повторите пароль:</strong></label>
                    </div>
                    <div class="col-75">
                        <input id="POST-password" type="password" name="password_check" value=''>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Сохранить">
                    <input type="submit" value="Удалить профиль">
                </div>
            </form>
        </div>
        <?php 
        if ($_SESSION['reg_message']) {
            echo '<div align="center" style="margin-bottom:15px;">' . $_SESSION['reg_message'] . '</div>';
            unset($_SESSION['reg_message']);
        }?>
    </main>
    <footer class="footer mt-auto py-3 bg-dark">
                <div class="container">
                    <span class="text-muted">@Amica Taxi 2023 | Powered by: @amicaursa</span>
                </div>
            </footer>  

</body>

</html>