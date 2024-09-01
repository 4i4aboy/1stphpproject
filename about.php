<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>О нас - КанцТорг</title>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        footer {
            margin-top: auto;
        }
    </style>
</head>

<body>
    <!-- Навбар -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="vendor/image/logo.png" width="170" height="65" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/login.php">Авторизация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register.php">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about.php">О нас</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container mt-5">
        <h1>О нас</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>Наша миссия</h2>
                <p>Мы стремимся предоставить нашим клиентам широкий ассортимент высококачественных канцелярских товаров по доступным ценам. Наша цель – сделать покупку канцелярии удобной и приятной для каждого клиента.</p>
            </div>
            <div class="col-md-6">
                <h2>История компании</h2>
                <p>Компания ООО "Концелярия" была основана в 2010 году с целью создания лучшего канцелярского магазина в регионе. С тех пор мы непрерывно растем и развиваемся, расширяя ассортимент и улучшая сервис.</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Наши ценности</h2>
                <ul>
                    <li>Качество</li>
                    <li>Доступность</li>
                    <li>Удовлетворенность клиентов</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Мы находимся</h2>
                <div style="width: 300px; height: 200px;">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa3126847ada221b3fecae88a26c3357a822a1195ad65dfb2adfe66526c7f67b8&amp;width=375&amp;height=328&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
        </div>
    </div>

    <!-- Футер -->
    <footer class="fixed-bottom bg-secondary text-center text-lg-start mt-5">
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
                    
                        <a href="https://prof-press.ru  " >Prof-Press</a> 
                        <a href="https://www.erichkrause.com" >Erich Krause</a>
                </div>
            </div>
        </div>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
    </footer>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
