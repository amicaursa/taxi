<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-Moz-Is-Generator" content="true">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amica taxi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">

    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
    <script type="text/javascript">
            var map;
            
            DG.then(function () {
                map = DG.map('map', {
                    zoomControl: false
                }).setView([55.755864, 37.6176989], 13);  ;

                DG.marker([55.755864, 37.617698]).addTo(map).bindPopup('Вы кликнули по мне!');

                DG.control.zoom({
                    position: 'bottomright'
                }).addTo(map);
            });
        </script>
</head>

<body>
    <?php session_start(); ?>   
        <nav class="navbar sticky-top navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Amica taxi</a>
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
        <div class="container">
            <div class="left-block">
                <span class="span_style" style="max-height: 100%">
                    <div class="div_1span">
                            <div class="div_in_section_l1">
                                <h1>Заказ поездки:</h1>
                                        <div class="div_in_section_l3">
                                                    <input type="text" placeholder="Место посадки"/>
                                                    <input type="text" placeholder="Место прибытия"/>
                                                    <input type="text" placeholder="Цена"/>
                                                    <input type="date" placeholder="Дата поездки"/>
                                                    <input type="time" placeholder="Время поездки"/>
                                        </div>
                                        <button id = "order-btn">Заказать</button> 
                            </div>
                    </div>
                </span>
                <br>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Вопрос #1
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Вопрос #2
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Вопрос #3
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
            <div class="right-block" src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full" id="map">
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="scripts/index.js"></script>
  </body>
</html>