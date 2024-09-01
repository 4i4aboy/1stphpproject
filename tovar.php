<?php
session_start();
if (!isset($_SESSION["user"]["id"])) {
    header('Location: /login.php');
    exit();
}

$id = $_GET["id"] ?? null;  // Добавлена проверка, чтобы избежать ошибок
if (!$id) {
    die("ID товара не указан.");
}

require "./vendor/db.php";
$tovar = mysqli_query($connect, "SELECT * FROM `tovar` WHERE `id` = '$id'");
$item = mysqli_fetch_assoc($tovar);

// Проверка, что товар найден
if (!$item) {
    die("Товар не найден.");
}

// Получение нескольких товаров для показа внизу страницы в случайном порядке
$related_tovars = mysqli_query($connect, "SELECT `id`, `title`, `image` FROM `tovar` ORDER BY RAND() LIMIT 3");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Товар - КанцТорг</title>
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

        .product-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }

        .related-products img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .related-products .card {
            border: none;
            max-width: 18rem;
            margin: auto;
        }

        .carousel-inner img {
            border-radius: 10px;
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

    <!-- Main content -->
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= htmlspecialchars($item["image"]) ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-md-6 product-info">
                <h2><?= htmlspecialchars($item["title"]) ?></h2>
                <p class="text-muted">Код товара: <?= htmlspecialchars($item["id"]) ?></p>
                <p class="h3 text-danger">Цена: <?= htmlspecialchars($item["price"]) ?> руб.</p>
                <p><?= htmlspecialchars($item["description"]) ?></p>
                <form id="add-to-cart-form" class="mt-4">
                    <input type="hidden" name="tovar_id" value="<?= htmlspecialchars($item["id"]) ?>">
                    <input type="hidden" name="title" value="<?= htmlspecialchars($item["title"]) ?>">
                    <input type="hidden" name="price" value="<?= htmlspecialchars($item["price"]) ?>">
                    <div class="mb-3 col-6">
                        <label for="quantity" class="form-label">Количество товара</label>
                        <input type="number" class="form-control" id="quantity" name="kol_vo" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Добавить в корзину</button>
                </form>
                <div id="message" class="alert alert-success mt-3" style="display: none;">
                    Товар добавлен в корзину!
                </div>
            </div>
        </div>

        <!-- Related products -->
        <div class="related-products mt-5">
            <h3>Другие товары</h3>
            <div class="row">
                <?php while ($related_item = mysqli_fetch_assoc($related_tovars)): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?= htmlspecialchars($related_item['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($related_item['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($related_item['title']) ?></h5>
                            <a href="tovar.php?id=<?= htmlspecialchars($related_item['id']) ?>" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-to-cart-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: './vendor/zakaz.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#message').show().delay(3000).fadeOut();
                    }
                });
            });
        });
    </script>
</body>

</html>
