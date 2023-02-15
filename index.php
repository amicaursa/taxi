<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Таксупер-заказ такси</title>
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
    <script type="text/javascript"> //.
            var map;

            DG.then(function () {
                map = DG.map('map', {
                    center: [55.755864, 37.617698],
                    zoom: 13
                });

                DG.marker([55.755864, 37.617698]).addTo(map).bindPopup('Вы кликнули по мне!');
            });
        </script>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php include "./main_pages/header.php" ?>
    <main>
        <h1 align='center'>Заказать машину - легко</h1>
        <!-- Машины -->
        <div class="main-cars">
            <div class="car-link" onclick="openCarType(event, 'sedan')" id="defaultType">Эконом</div>
            <div class="car-link" onclick="openCarType(event, 'comfort')">Комфорт</div>
            <div class="car-link" onclick="openCarType(event, 'random')">Рандом</div>
            <div class="car-link" onclick="openCarType(event, 'business-cars')">Премиум</div>
            <div class="car-link" onclick="openCarType(event, 'e-cars')">Электрические</div>
            <div class="car-link" onclick="openCarType(event, 'truck')">Грузовые</div>
            <!-- Лекговые -->
            <div class="car-content" id="sedan">
                <p>В нашем сервисе заказа машин представлены лучшие современные ЭКОНОМ автомобили. Вы можете ознакомиться с доступными вариантами, нажав на кнопку ниже </p>
                <button id="type-btn" onclick="ftch('Эконом')">
                    Заказать эконом машину
                </button>
            </div>
             <!-- Комфорт -->
             <div class="car-content" id="comfort">
                <p>В нашем сервисе заказа машин представлены лучшие современные КОМФОРТН автомобили. Вы можете ознакомиться с доступными вариантами, нажав на кнопку ниже </p>
                <button id="type-btn" onclick="ftch('Комфорт')">
                    Заказать комфорт машину
                </button>
            </div>
             <!-- Рандом -->
             <div class="car-content" id="random">
                <p>В нашем сервисе заказа машин представлены лучшие современные ЭКОНОМ автомобили. Вы можете ознакомиться с доступными вариантами, нажав на кнопку ниже </p>
                <button id="type-btn" onclick="ftch('Рандом')">
                    Заказать случайную машину
                </button>
            </div>
            <!-- Премиум -->
            <div class="car-content" id="business-cars">
                <p>В нашем сервисе заказа машин представлены лучшие современные ПРЕМИУМ машины. Вы можете ознакомиться с доступными вариантами, нажав на кнопку ниже </p>
                <button id="type-btn" onclick="ftch('Премиум')">
                    Заказать премиум машину 
                </button>
            </div>
            <!-- Элеткрические -->
            <div class="car-content" id="e-cars">
                <p>В нашем сервисе заказа машин представлены лучшие современные ЭЛЕКТРИЧЕСКИЕ  автомобили. Вы можете ознакомиться с доступными вариантами, нажав на кнопку ниже </p>
                <button id="type-btn" onclick="ftch('Электрические')">
                    Заказать электрическую машину
                </button>
            </div>
            <!-- Грузовые -->
            <div class="car-content" id="truck">
                <p>В нашем сервисе заказа машин представлены лучшие современные ГРУЗОВЫЕ автомобили. Вы можете ознакомиться с доступными вариантами, нажав на кнопку ниже </p>
                <button id="type-btn" onclick="ftch('Грузовой')">
                    Заказать грузовую машину
                </button>
            </div>
        </div>
        <div id="map" style="width:650px; height:400px"></div>
        <!-- Текст -->
        <div class="main-about-text" align="center">
            <p>Наша компания специализируется на профессиональном оказании услуг по аренде автомобилей.<br> Присоединяйтесь и убедитесь сами!</p>
        </div>
    </main>
    <?php include "./main_pages/footer.php" ?>
</body>
<script src="scripts/index.js"></script>

</html>