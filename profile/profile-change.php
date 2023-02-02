<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таксупер</title>
    <link rel="stylesheet" href="../styles/profile-change-style.css">
</head>

<body>
<?php session_start();
    require_once("../db+php/connect.php");
        if (!$_SESSION['user']) {
            header('Location: ../profile/login.php');}
            ?>
<?php include "../main_pages/header.php" ?>
    <main>
        <h2 align="center">Изменение профиля</h2>
        <div class="container">
            <form action="../profile/updateprofile.php" method="post" class="post-form">
                <div class="row">
                    <div class="col-25">
                        <label for="POST-name">Изменить имя:</label>
                    </div>
                    <div class="col-75">
                        <input id="POST-name" type="text" name="name" value='<?php echo $_SESSION['user']['all']['name'];?>'>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-surname">Изменить фамилию:</label>

                    </div>
                    <div class="col-75">
                        <input id="POST-surname" type="text" name="surname" value='<?php echo $_SESSION['user']['all']['surname'];?>'>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-phone">Изменить номер телефона:</label>
                    </div>
                    <div class="col-75">
                        <input id="POST-phone" type="tel" name="phone" value='<?php echo $_SESSION['user']['all']['phone_number'];?>'>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-login">Изменить пароль:</label>
                    </div>
                    <div class="col-75">
                        <input id="POST-login" type="password" name="password" value=''>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-password">Повторите пароль:</label>
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

    <?php include "../main_pages/footer.php" ?>

</body>

</html>