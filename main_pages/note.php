<?php
                            if ($_SESSION['user']['all']['employee_type_id'] == "1" && $_SESSION['user']['all']['employee_type_id'] == "2") {
                            echo '
                                <a href="../main_pages/drive_history.php" class="header_links">
                                История поездок
                                </a>';
                        } ?>

<?php
            if ($_SESSION['user']['all']['employee_type_id'] == "3") {
                echo '
            <a href="../main_pages/employee_info.php" class="header_links">
                Статистика водителей
            </a>
            <a href="../main_pages/cars_info.php" class="header_links">
                Управление автомобилями
            </a>';
            } ?> 


<!-- <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Как заказать такси?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Заполните все поля формы "Заказ поездки" и нажмите кнопку "Заказать"
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Как отследить статус заказа?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    На странице "Заказы" отображается статус вашего заказа на данный момент и все предыдущие поездки
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Какой способ оплаты?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    На данный момент принимается только наличный способ оплаты
                                </div>
                            </div>
                        </div>
                    </div> -->