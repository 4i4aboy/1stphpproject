<?php
session_start();
if ($_SESSION["user"]["id"] === NULL) {
    header('Location: /login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Каталог</title>
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

        .carousel-inner img {
            max-height: 500px;
            object-fit: cover;
            border-radius: 15px; 
        }

        .card {
            max-width: 300px;
            margin: auto;
        }

        .card img {
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
        }

        .card-body {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Навбар -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="catalog.php">
                <img src="vendor/image/logo.png" width="170" height="65" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <ul class="navbar-nav">
                    <?php if ($_SESSION["user"]["status"] === "1"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin.php">Админ панель</a>
                        </li>
                    <?php endif; ?>
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
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/vendor/image/sl1.png" class="d-block w-100 rounded" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/vendor/image/sl2.jpg" class="d-block w-100 rounded" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Main -->
    <div class="container">
        <h2 class="mt-4">Каталог товаров нашего магазина</h2>
        <p class="fs-5 mt-3">Ниже вы можете посмотреть и заказать себе товар.</p>
        <main class="mb-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                require "./vendor/db.php";
                $result = mysqli_query($connect, "SELECT * FROM `tovar`");
                $tovar = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($tovar as $item) {
                ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?= $item['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item['title'] ?></h5>
                                <p class="card-text"><?= $item['description'] ?></p>
                                <p class="card-text text-primary">Цена: <?= $item['price'] ?> руб.</p>
                                <a href="./tovar.php?id=<?= $item['id'] ?>"><button type="button" class="btn btn-primary">Перейти к товару</button></a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </main>
    </div>

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
