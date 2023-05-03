<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-Moz-Is-Generator" content="true">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">Amica Taxi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a>
                                <?php
                                    if (!$_SESSION['user']) {
                                    echo '<a href="profile/login.php" style="text-decoration: none;" class="nav-link">Dashboard</a>';
                                    } else {
                                    echo '<a href="../main_pages/orders.php"  style="text-decoration: none;"  class="nav-link">Dashboard</a>';
                                    }
                                ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a>
                                <?php
                                    if (!$_SESSION['user']) {
                                    echo '<a href="profile/login.php" style="text-decoration: none;" class="nav-link">Логин</a>';
                                    } else {
                                    echo '<a href="../profile/profile.php"  style="text-decoration: none;"  class="nav-link">'. $_SESSION['user']['all']["name"] . ' </a>';
                                    }
                                ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a> <?php
                                    if (!$_SESSION['user']) {
                                        echo '<a href="../profile/registerpage.php" style="text-decoration: none;" class="nav-link" >Регистрация</a>';
                                    }
                                    else{
                                        echo '<a href="../profile/singout.php" style="text-decoration: none;" class="nav-link" >Выйти</a>';
                                    }
                                ?>
                                </a>
                            </li>
                        </ul>
                </div>
            </div>
        </nav>
        <br>
        <h1 align="center">Профиль</h1>
        <div class="container">
            <form action="../profile/profile-change.php" method="post" class="post-form">
                <div class="row">
                    <div class="col-25">
                        <label for="POST-name"><strong>Имя:</strong></label>
                    </div>
                    <div class="col-75">
                        <?php echo '
                        <p class="profile-field-about">' . $_SESSION['user']['all']['name'] . '</p>'
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-surname"><strong>Фамилия:</strong></label>
                    </div>
                    <div class="col-75">
                    <?php echo '
                        <p class="profile-field-about">' . $_SESSION['user']['all']['surname'] . '</p>'
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-phone"><strong>Номер телефона:</strong></label>
                    </div>
                    <div class="col-75">
                    <?php echo '
                        <p class="profile-field-about">' . $_SESSION['user']['all']['phone_number'] . '</p>'
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="POST-login"><strong>Логин:</strong></label>
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