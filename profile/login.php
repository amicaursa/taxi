<?php
    session_start();

    function checkUser($login, $password) {
        $connect = mysqli_connect('localhost', 'root', '', 'taxi');
        if (!$connect) {
            die("Ошибка подключения: " . mysqli_connect_error());
        }
    
        $query = "SELECT * FROM users WHERE login = ?";
        $statement = $connect->prepare($query);
        $statement->bind_param('s', $login);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];
    
            if (password_verify($password, $hashedPassword)) {
                return true;
            }
        }

        return false;
    }

    if (isset($_COOKIE['remember_user'])) {
        $remember_user = $_COOKIE['remember_user'];

        if (checkUser($remember_user, "")) {
            $_SESSION['user'] = $remember_user;
            header('Location: index.php');
            exit();
        } else {
            setcookie('remember_user', '', time() - 3600, '/');
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (!empty($login) && !empty($password)) {
            if (checkUser($login, $password)) {
                $_SESSION['user'] = $login;

                if (isset($_POST['remember-me'])) {
                    $remember_me = true;
                    setcookie('remember_user', $login, time() + (7 * 24 * 60 * 60), '/');
                } else {
                    setcookie('remember_user', '', time() - 3600, '/');
                }

                header('Location: index.php');
                exit();
            } else {
                $_SESSION['log_fail'] = 'Неправильный логин или пароль';
                header('Location: login.php');
                exit();
            }
        } else {
            $_SESSION['log_fail'] = 'Введите логин и пароль';
            header('Location: login.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="../styles/login-style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
</head>

<body class="text-center style='background-color: #C6C6C6;'">
    <?php session_start(); ?>

    <main class="form-signin">
        <form action="../profile/singin.php" method="post" class="post-form">
            <img class="mb-4" src="../pics/logo.png" alt="" width="100" height="100">
            <h1 class="h3 mb-3 fw-normal">Личный кабинет</h1>

            <div class="form-floating">
                <input type="text" name="login" placeholder="Имя пользователя" class="form-control" id="floatingInput">
                <label for="floatingInput">Имя пользователя</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" placeholder="Пароль" class="form-control" id="floatingPassword">
                <label for="floatingPassword">Пароль</label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember-me" value="1"> Запомнить меня
                </label>
            </div>
            <button class="w-100 mb-3 btn btn-lg btn-primary" type="submit">Войти</button>
            <div class="row">
                    <a style="text-decoration: none;" href="../profile/registerpage.php">Регистрация</a>
                </div>
            <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>
        </form>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>