<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Панель заказов</title>
        <link rel="stylesheet" href="../styles/dashboard-style.css">
    </head>
    <body>
        <?php include "header.php" ?> <!--Из-за подключенного хидера плывут шрифты на заказах -->
        <h1>Панель заказов</h1>
        <div class="orders-container">
            <div class="orders-grid"></div><br>
            <div class="pagination"></div>
        </div>
        <script src="../scripts/orderv2.js"></script>
    </body>
</html>