<div class= "map-container">
            <div id="map" style="width: 100%; height: 100%"></div>
                <div class="overlay">
                    <div class="main-cars">
                        <div class="car-link" onclick="openCarType(event, 'sedan')" id="defaultType">Эконом</div>
                        <div class="car-link" onclick="openCarType(event, 'comfort')">Комфорт</div>
                        <div class="car-link" onclick="openCarType(event, 'random')">Рандом</div>
                        <div class="car-link" onclick="openCarType(event, 'business-cars')">Премиум</div>
                        <div class="car-link" onclick="openCarType(event, 'e-cars')">Электрические</div>
                        <div class="car-link" onclick="openCarType(event, 'truck')">Грузовые</div>
                        <div class="about">
                            <!-- Лекговые -->
                            <div class="car-content" id="sedan">
                                <p>LADA GRANTA, KIA RIO, VOLKSVAGEN POLO, SKODA RAPID, HUINDAY SOLARIS</p>
                                <button type="button" class="btn btn-outline-dark" onclick="ftch('Эконом')">
                                    Заказать
                                </button>
                            </div>
                            <!-- Комфорт -->
                            <div class="car-content" id="comfort">
                                <p>KIA CEE'D SW, KIA OPTIMA, KIA K5, SKODA OCTAVIA, TOYOTA CAMRY</p>
                                <button type="button" class="btn btn-outline-dark" onclick="ftch('Комфорт')">
                                    Заказать
                                </button>
                            </div>
                            <!-- Рандом -->
                            <div class="car-content" id="random">
                                <p>В данном тарифе представлены все классы машин. Чем больше вы катались вместе с нами, тем выше шанс что приедет более интересная машина</p>
                                <button type="button" class="btn btn-outline-dark" onclick="ftch('Рандом')">
                                    Заказать
                                </button>
                            </div>
                            <!-- Премиум -->
                            <div class="car-content" id="business-cars">
                                <p>Mercedes-benz S 350 d, Mercedes-benz E-klasse, BMW 5, AUDI A6, AUDI A8</p>
                                <button type="button" class="btn btn-outline-dark" onclick="ftch('Премиум')">
                                    Заказать
                                </button>
                            </div>
                            <!-- Элеткрические -->
                            <div class="car-content" id="e-cars">
                                <p>TESLA X, CHERRY EXCEED</p>
                                <button type="button" class="btn btn-outline-dark" onclick="ftch('Электрические')">
                                    Заказать
                                </button>
                            </div>
                            <!-- Грузовые -->
                            <div class="car-content" id="truck">
                                <p>Mercedes-benz Arocs</p>
                                <button type="button" class="btn btn-outline-dark" onclick="ftch('Грузовой')">
                                    Заказать
                                </button>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>   
        </div>