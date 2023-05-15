<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-Moz-Is-Generator" content="true">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amica Taxi</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- style css
    <link rel="stylesheet" href="styles/style.css"> -->

    <!-- Подключение библиотеки jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Подключение библиотеки jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    <!-- 2gis -->
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
   
    <!-- Скрипты в теге -->
    
    <!-- 2gis -->
    <script type="text/javascript">
        var map;
        
        DG.then(function () {
            map = DG.map('map', {
                zoomControl: false
            }).setView([55.755864, 37.6176989], 13);

            DG.marker([55.755864, 37.617698]).addTo(map).bindPopup('Вы кликнули по мне!');

            DG.control.zoom({
                position: 'bottomright'
            }).addTo(map);
        });
    </script>
    
    <style>
        #map {
            position: fixed;
            top: 56px;
            left: 0;
            width: 100%;
            height: calc(100vh - 56px - 56px);
            z-index: 1;
        }
        
        .left-block {
            position: fixed;
            top: 56px;
            left: 20px;
            padding: 20px;
            width: 375px;
            z-index: 2;
            background-color: rgba(255, 255, 255, 1); 
            backdrop-filter: blur(95%); 
            margin-left: 0.5%; 
            margin-top: 2%; 
            border-radius: 12px;
        }
        
        .content-container {
            position: fixed;
            top: calc(56px + 1px);
            bottom: 56px;
            left: 0;
            right: 0;
            z-index: 2;
            overflow: hidden;
        }
        
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 3;
        }
    </style>
</head>
<body>
    <?php session_start() ?>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index: 3;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Amica Taxi</a>
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
                                        if ($_SESSION['user']['employee_type_id'] == '2') {
                                            echo '<a href="main_pages/orders_vod.php"  style="text-decoration: none;"  class="nav-link">Dashboard</a>';
                                        } else {
                                        echo '<a href="main_pages/orders.php"  style="text-decoration: none;"  class="nav-link">Dashboard</a>';
                                    }
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
                                        echo '<a href="../profile/profile.php"  style="text-decoration: none;"  class="nav-link">'. $_SESSION['user']['all']["login"] . ' </a>';
                                    }
                                ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a> 
                                <?php
                                    if (!$_SESSION['user']) {
                                        echo '<a href="../profile/registerpage.php" style="text-decoration: none;" class="nav-link" >Регистрация</a>';
                                    } else {
                                        echo '<a href="../profile/singout.php" style="text-decoration: none;" class="nav-link" >Выйти</a>';
                                    }
                                ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a> 
                                <?php
                                    if (!$_SESSION['user']) {
                                        echo '<a href="../profile/registerpage_vod.php" style="text-decoration: none;" class="nav-link">Стать водителем</a>';
                                    }
                                ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 left-block">
                    <span class="span_style text-center" style="max-height: 100%">
                        <div class="div_1span">
                            <h1>Заказ поездки:</h1>
                              <form action="main_pages/process_order.php" method="POST" class="post-form">
                                <input name="place_plant" type="text" placeholder="Место посадки" class="form-control mb-2"/>
                                <input name="place_arrival" type="text" placeholder="Место прибытия" class="form-control  mb-2"/>
                                <input name="payment" type="number" placeholder="Цена" class="form-control  mb-2"/>
                                <input name="date_p" type="date"  placeholder="Дата поездки" class="form-control  mb-2"/>
                                <input name="time_p" type="time" placeholder="Время поездки" class="form-control  mb-2"/>
                                <input type="submit" value="Заказать" class="btn btn-primary">
                            </form>
                        </div>
                    </span>
                </div>
                <div class="col-9">
                    <div id="map"></div>
                </div>
            </div>
        </div>
        <br>
        <footer class="footer mt-auto py-3 bg-dark" style="z-index: 3;">
            <div class="container text-center">
                <span class="text-muted">@Amica Taxi | Powered by: @amicaursa</span>
                <a href="#" id="terms-link" data-toggle="modal" data-target="#terms-modal" style="color: white; text-decoration: underline; margin-left: 10px;">Пользовательское соглашение</a>
            </div>
        </footer>

        <div class="modal fade" id="terms-modal" tabindex="-1" role="dialog" aria-labelledby="terms-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="terms-modal-title">Пользовательское соглашение</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <h3>Пользовательское соглашение</h3>
                            <p>Пожалуйста, внимательно ознакомьтесь с настоящим Пользовательским соглашением (далее - "Соглашение"), которое устанавливает условия использования веб-сервиса для заказа такси (далее - "Сервис") в правовой зоне Российской Федерации.</p>
                            
                            <h4>Определения</h4>
                            <p>1.1. В рамках настоящего Соглашения применяются следующие термины:</p>
                            <ul>
                                <li>"Мы", "Наш", "Провайдер" - означает оператора веб-сервиса, предоставляющего Сервис для заказа такси.</li>
                                <li>"Вы", "Ваш" - означает физическое или юридическое лицо, которое использует Сервис.</li>
                                <li>"Сервис" - означает веб-сервис для заказа такси, предоставляемый Провайдером.</li>
                                <li>"Пользовательский контент" - означает информацию, включая, но не ограничиваясь, текст, фотографии, видео и другой материал, размещенный Пользователем при использовании Сервиса.</li>
                            </ul>
                            
                            <h4>Общие положения</h4>
                            <p>2.1. Используя Сервис, Вы выражаете свое полное согласие с условиями настоящего Соглашния.</p>
                            <p>2.2. Провайдер оставляет за собой право в любое время изменять, модифицировать, добавлять или удалять любые положения настоящего Соглашения. Изменения вступают в силу с момента их публикации на сайте или приложении Сервиса. Ваше дальнейшее использование Сервиса после внесения изменений означает Ваше согласие с такими изменениями.</p>

                            <h4>Пользование Сервисом</h4>
                            <p>3.1. Пользование Сервисом возможно только после регистрации на сайте или в приложении Сервиса.</p>
                            <p>3.2. Вы обязуетесь предоставить достоверную и полную информацию при регистрации. Вы несете ответственность за безопасность своих учетных данных и несанкционированное использование Вашего аккаунта.</p>
                            <p>3.3. При использовании Сервиса Вы обязуетесь соблюдать действующее законодательство Российской Федерации и правила использования Сервиса, установленные Провайдером.</p>
                            <p>3.4. Вы несете ответственность за Пользовательский контент, размещенный Вами при использовании Сервиса. Вы гарантируете, что Пользовательский контент не нарушает права третьих лиц, включая авторские права, права на товарные знаки или другие интеллектуальные собственности.</p>
                            <p>3.5. При использовании Сервиса для заказа такси Вы обязуетесь соблюдать правила безопасности и не предпринимать действий, которые могут нанести вред другим пользователям или Провайдеру. Запрещено использование Сервиса для незаконных целей, включая, но не ограничиваясь, заказом такси для совершения преступных действий.</p>
                            
                            <h4>Личные данные</h4>
                            <p>4.1. При использовании Сервиса Вы соглашаетесь с обработкой Ваших личных данных Провайдером в соответствии с применимым законодательством и Политикой конфиденциальности, доступной на сайте или в приложении Сервиса.</p>
                            <p>4.2. Провайдер обязуется принимать все меры по обеспечению безопасности и конфиденциальности Ваших личных данных. Однако, Провайдер не несет ответственности за возможные нарушения безопасности, происходящие вследствие неправомерных действий третьих лиц.</p>
                            <h4>Интеллектуальная собственность</h4>
                            <p>5.1. Все права на интеллектуальную собственность, связанную с Сервисом (включая, но не ограничиваясь, дизайном, логотипами, текстами, графикой и программным обеспечением), принадлежат Провайдеру или его лицензиару. Использование Сервиса не предоставляет Вам права на использование или воспроизведение указанной интеллектуальной собственности без предварительного письменного согласия Провайдера.</p>
                            
                            <h4>Ограничение ответственности</h4>
                            <p>6.1. Сервис предоставляется на условиях "как есть", и Провайдер не несет ответственности за любые прямые или косвенные убытки, возникшие в результате использования или невозможности использования Сервиса.</p>
                            <p>6.2. Провайдер не несет ответственности за действия или бездействие водителей такси, предоставляющих услуги через Сервис. Отношения между Вами и водителями такси возникают непосредственно между Вами и водителями, и Провайдер не является стороной таких отношений.</p>
                            <p>6.3. Провайдер не несет ответственности за любые убытки, повреждения, задержки или некорректную работу Сервиса, вызванные неполадками в сети Интернет, обстоятельствами непреодолимой силы или действиями третьих лиц.</p>
                            
                            <h4>Прекращение соглашения</h4>
                            <p>7.1. Вы можете прекратить использование Сервиса в любое время путем удаления своего аккаунта или прекращения использования Сервиса.</p>
                            <p>7.2. Провайдер вправе прекратить предоставление Сервиса или ограничить Ваш доступ к нему в случае нарушения Вами положений настоящего Соглашения или действиях, которые могут причинить вред Провайдеру или другим пользователям Сервиса.</p>
                            
                            <h4>Прочие положения</h4>
                            <p>8.1. Настоящее Соглашение является юридически обязательным соглашением между Вами и Провайдером в отношении использования Сервиса и заменяет все предыдущие устные или письменные соглашения между сторонами.</p>
                            <p>8.2. Любые споры или разногласия, возникающие в связи с настоящим Соглашением, подлежат разрешению в соответствии с применимым законодательством Российской Федерации.</p>
                            <p>8.3. Если какое-либо положение настоящего Соглашения будет признано недействительным или неосуществимым в соответствии с применимым законодательством, остальные положения Соглашения остаются в полной силе и эффекте.</p>
                            <p>Пожалуйста, ознакомьтесь с настоящим Пользовательским соглашением внимательно и в случае несогласия с его условиями прекратите использование Сервиса.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

 <!-- bootstrap и другие скрипты -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-4jPxFj+YPb8JZgF2eJyxsf5VdS0OvrOBSpkoWqV7VG0VAmU3UAm+BAlCi8vV+bBE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>

   