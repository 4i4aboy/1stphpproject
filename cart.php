<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Корзина</title>
</head>
<body>
    <!-- Навбар -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="catalog.php">
                <img src="vendor/image/logo.png" width="170" height="65" class="d-inline-block align-top">
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

    <div class="container mt-5">
        <h2>Моя корзина</h2>
        <?php if ($cart): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Товар</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Всего</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><?= htmlspecialchars($item['price']) ?> Руб.</td>
                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                            <td><?= htmlspecialchars($item['price'] * $item['quantity']) ?> Руб.</td>
                            <td><a href="/vendor/removecart.php?id=<?= htmlspecialchars($item['id']) ?>" class="btn btn-danger">Удалить</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <h4>Всего: <?= $total ?> Руб.</h4>
            </div>
            <form method="post" action="/vendor/zakazat.php">
                <div class="my-3">
                    <select class="form-select" aria-label="Default select example" name="address">
                        <option selected value="Сосновоборск">Сосновоборск, 9 пятилетки, 22</option>
                    </select>
                </div>
                <input type="hidden" value="<?= $total ?>" name="total">
                <button type="submit" class="btn btn-primary">Заказать</button>
            </form>
        <?php else: ?>
            <p>Ваша корзина пуста.</p>
        <?php endif; ?>
    </div>

    <!-- Футер -->
    <footer class="fixed-bottom bg-secondary text-lg-start mt-5">
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
                    
                        <a href="https://prof-press.ru">Prof-Press</a> 
                        <a href="https://www.erichkrause.com">Erich Krause</a>
                </div>
            </div>
        </div>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
    </footer>
</body>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
</html>
