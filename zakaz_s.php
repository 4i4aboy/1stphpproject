<?php
session_start();
if ($_SESSION["user"]["id"] === NULL) {
    header('Location: /login.php');
    exit();
}

$user_id = $_SESSION["user"]["id"];
require "./vendor/db.php";

$query = "SELECT 
orders.id AS order_id, 
orders.status AS order_status, 
orders.cost as order_cost,
order_items.tovar_id, 
tovar.title, 
order_items.qnt, 
order_items.price 
FROM 
orders 
JOIN 
order_items ON orders.id = order_items.order_id 
JOIN 
tovar ON order_items.tovar_id = tovar.id  
WHERE 
orders.user_id = '$user_id'
ORDER BY 
orders.id";

$result = mysqli_query($connect, $query);

$output = '';
if (mysqli_num_rows($result) > 0) {
    $output .= '<div class="container mt-5">';
    $output .= '<h2>Мои заказы</h2>';
    $output .= '<div class="list-group">';

    $current_order_id = null;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['order_id'] !== $current_order_id) {
            if ($current_order_id !== null) {
                $output .= '<p><b>Статус заказа:</b> ' . $current_order_status . '</p>';
                $output .= '<p><b>Общая сумма заказа:</b> ' . $current_order_cost . ' Руб</p>';
                $output .= '</ul>';
                $output .= '</div>';
                if ($current_order_status == "Подтверждено") {
                    $output .= '<b><p>Заказ можно забрать по адресу: Г.Сосновоборск ул.9 Лененского Комсомола 21</p></b>';
                } elseif ($current_order_status == "Отменено") {
                    $output .= '<p>Необходимого товара нет на складе</p>';
                }
            }
            $current_order_id = $row['order_id'];
            $current_order_status = $row['order_status'];
            $current_order_cost = $row['order_cost'];
            $output .= '<div class="list-group-item">';
            $output .= '<h5 class="mb-1">Заказ № ' . $row['order_id'] . '</h5>';
            $output .= '<ul class="list-unstyled">';
        }
        $output .= '</br><li>Название товара: <b>' . $row['title'] . '</b> 
        </br>- Количество: <b>' . $row['qnt'] . '</b> шт. 
        </br>- Цена: ' . $row['price'] . ' Руб / Штука</li>';
    }
    $output .= '<p><b>Статус заказа:</b> ' . $current_order_status . '</p>';
    $output .= '<p><b>Общая сумма заказа:</b> ' . $current_order_cost . ' Руб</p>';
    $output .= '</ul>';
    $output .= '</div>';
    $output .= '</div>';
} else {
    $output .= '<div class="container mt-5">';
    $output .= '<h2>Мои заказы</h2>';
    $output .= '<p>У вас нет заказов.</p>';
    $output .= '</div>';
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Мои заказы</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #6c757d;
            color: white;
            padding: 1rem 0;
        }
    </style>
</head>

<body>
    <!-- Навбар -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="catalog.php">
                <img src="vendor/image/logo.png" width="170" height="65" class="d-inline-block align-top" alt="КанцТорг">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/catalog.php">Каталог</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/cart.php">Корзина</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zakaz_s.php">Мои заказы</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="./vendor/destroy.php">Выйти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Основное содержимое -->
    <main class="container mt-5">
        <?php echo $output; ?>
    </main>

    <!-- Футер -->
    <footer class="bg-secondary text-white text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Контакты</h5>
                    <p>
                        Эл. почта: chanceryshop@gmail.com <br>
                        Телефон: +7(904)-892-14-88 <br>
                        Адрес: Главный офис: г. Сосновоборск, ул. Пушкина 22
                    </p>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Наши партнеры</h5>
                    <p>
                        <a href="https://prof-press.ru" class="text-white">Prof-Press</a><br>
                        <a href="https://www.erichkrause.com" class="text-white">Erich Krause</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
