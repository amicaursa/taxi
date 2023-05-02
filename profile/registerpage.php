<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../styles/register-style.css">

     <!-- bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <main>
    <?php session_start()?>
        <h2 align="center">Регистрация</h2>
        <div class="container">
            <form action="./regin.php" method="post" class="post-form">
                <div class="row">
                    <div class="col-25">
                        <label for="POST-name">Введите имя:</label>
                    </div>
                    <div class="col-75">
                        <input id="POST-name" type="text" name="name" placeholder="Имя">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-surname">Введите фамилию:</label>

                    </div>
                    <div class="col-75">
                        <input id="POST-surname" type="text" name="surname" placeholder="Фамилия">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-phone">Введите номер телефона:</label>
                    </div>
                    <div class="col-75">
                        <input id="POST-phone" type="tel" name="phone" placeholder="Номер телефона">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-login">Придумайте логин:</label>
                    </div>
                    <div class="col-75">
                        <input id="POST-login" type="text" name="login" placeholder="Имя пользователя">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-password">Придумайте пароль:</label>
                    </div>
                    <div class="col-75">
                        <input id="POST-password" type="password" name="password" placeholder="Пароль">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Подтвердить">
                    <a href="../profile/login.php">Войти</a>
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