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