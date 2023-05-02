<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="../styles/profile-style.css">

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
    <footer class="footer mt-auto py-3 bg-dark">
                <div class="container">
                    <span class="text-muted">@Amica Taxi 2023 | Powered by: @amicaursa</span>
                </div>
            </footer>  
</body>

</html>