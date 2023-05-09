<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-Moz-Is-Generator" content="true">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="../styles/register-style.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php session_start()?>
    <main>
        <h1 style="margin-top: 1%;" align="center"><strong>Регистрация</strong></h1>
        <div class="container">
            <form action="regin.php" method="POST" class="post-form">
                <input name="name" type="text" maxlength="30" placeholder="Имя" required>
                <input name="surname" type="text" maxlength="45" placeholder="Фамилия" required>
                <input name="phone_number" type="tel" maxlength="15" placeholder="Номер телефона" required>
                <input name="login" type="text" maxlength="45" placeholder="Имя пользователя" required>
                <input name="password" type="password" maxlength="45" placeholder="Пароль" required>
                <input type="submit" value="Подтвердить">
                <div class="row">
                    <a style="text-decoration: none;" href="../profile/login.php">Войти</a>
                </div>
            </form>
        </div>
        <?php 
        if (isset($_SESSION['reg_message'])) {
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