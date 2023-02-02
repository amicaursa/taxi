<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="../styles/profile-style.css">
</head>

<body>
    <?php session_start();
    require_once("../db+php/connect.php");
        if (!$_SESSION['user']) {
            header('Location: ../profile/login.php');}
            ?>
    <?php include "../main_pages/header.php" ?>
    <main>
        <h2 align="center">Профиль</h2>
        <div class="container">
            <form action="../profile/profile-change.php" method="post" class="post-form">
                <div class="row">
                    <div class="col-25">
                        <label for="POST-name">Имя:</label>
                    </div>
                    <div class="col-75">
                        <?php echo '
                        <p class="profile-field-about">' . $_SESSION['user']['all']['name'] . '</p>'
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-surname">Фамилия:</label>
                    </div>
                    <div class="col-75">
                    <?php echo '
                        <p class="profile-field-about">' . $_SESSION['user']['all']['surname'] . '</p>'
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-phone">Номер телефона:</label>
                    </div>
                    <div class="col-75">
                    <?php echo '
                        <p class="profile-field-about">' . $_SESSION['user']['all']['phone_number'] . '</p>'
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-login">Логин:</label>
                    </div>
                    <div class="col-75">
                    <?php echo '
                        <p class="profile-field-about">' . $_SESSION['user']['all']['login'] . '</p>'
                        ?>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Изменить профиль">
                </div>
            <?php
            if($_SESSION['user']['all']['employee_type_id'] != 1 && $_SESSION['user']['all']['employee_type_id'] != 3 )
            {
                $cur_user = $_SESSION['user']['all']['ID'];
                $add_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `employee` WHERE `user_id` = $cur_user"));
                if($add_info['drive_licence'] == NULL){
                    $add_info['drive_licence'] = 'Отсутствует';
                }
                if($add_info['med_book'] == NULL){
                    $add_info['med_book'] = 'Отсутствует';
                }
            echo'
            </form>
            <form action="../profile/profile-change.php" method="post" class="post-form" style="margin-left: 30px;">
                <div class="row">
                    <div class="col-25">
                        <label for="POST-name">Медицинская книжка:</label>
                    </div>
                    <div class="col-75">
                         '.
                        '<p class="profile-field-about">' . $add_info['med_book'] . '</p>' . '
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-surname">Снилс:</label>
                    </div>
                    <div class="col-75">
                    ' . '
                        <p class="profile-field-about">' . $add_info['SNILS'] . '</p>' . '
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-phone">Номер паспорта:</label>
                    </div>
                    <div class="col-75">
                     ' . '
                        <p class="profile-field-about">' . $add_info['passport_id'] . '</p>' . '
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-login">Водительская лицензия:</label>
                    </div>
                    <div class="col-75">
                     ' . '
                        <p class="profile-field-about">' . $add_info['drive_licence'] . '</p>' . '
                        
                    </div>
                </div>
            </form>
                ';}?>
        </div>
    </main>

    <?php include "../main_pages/footer.php" ?>

</body>

</html>