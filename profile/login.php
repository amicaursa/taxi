<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-Moz-Is-Generator" content="true">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>login</title>

    <link rel="stylesheet" href="../styles/login-style.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <main>
    <?php session_start() ?>
    <br>
    <br>
    <br>
    <br>
    <h1 align="center"><strong>Amica Taxi</strong></h1>
    <h6 align="center"><strong>Личный кабинет</strong></h6>
    <div class="container">
        <form action="../profile/singin.php" method="post" class="post-form">
            <div class="row">
                <div class="col-25">
                    <label for="POST-login"><strong>Введите логин:</strong></label>
                </div>
                <div class="col-75">
                    <input id="POST-login" type="text" name="login" placeholder="Имя пользователя">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="POST-password"><strong>Введите пароль:</strong></label>
                </div>
                <div class="col-75">
                    <input id="POST-password" type="password" name="password" placeholder="Пароль">
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Войти">
            </div>
            <div class="row">
                <a style="text-decoration: none;" class=".text-secondary" href="../profile/registerpage.php">Регистрация</a>
            </div>
        </form> 
    </div>
    <?php 
        if ($_SESSION['log_fail']) {
            echo '<div align="center">' . $_SESSION['log_fail'] . '</div>';
            unset($_SESSION['log_fail']);
        }?>
    </main>

    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <span class="text-muted">@Amica Taxi 2023 | Powered by: @amicaursa</span>
        </div>
    </footer> 

</body>

</html>