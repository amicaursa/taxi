<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amica taxi</title>
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
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="one" >
        <div class="two">
        <?php include "./main_pages/header.php" ?>
            <div class="container">
            <div class="left-block">
                <span class="span_style" style="max-height: 100%">
                    <div data-baseweb="block" class="div_1span">
                        <section data-baseweb="card" class="section_class">
                            <div class="div_in_section_l1">
                                <h1>Заказ поездки</h1>
                                <div class="div_in_section_l2">
                                        <div class="div_in_section_l3">
                                            <div class="div_in_section_l4">
                                                <div data-baseweb="select" class="buttom_mpos">
                                                    <input type="text" placeholder="Место посадки"/>
                                                </div>
                                                <div data-baseweb="select" class="buttom_mprib">
                                                    <input type="text" placeholder="Место прибытия"/>
                                                </div>
                                                <div data-baseweb="select" class="cost">
                                                    <input type="text" placeholder="Цена"/>
                                                </div>
                                            </div>
                                            <div class="div_in_section_l5">
                                                <input type="date" placeholder="Дата поездки"/>
                                                <input type="time" placeholder="Время поездки"/>
                                            </div>
                                        </div>
                                    <div>
                                        <button id = "order-btn">Заказать</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </span>
            </div>
            <div class="right-block" src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full" id="map">
            </div>
            </div>
        </div>
    </div>
  </body>
<script src="scripts/index.js"></script>
</html>