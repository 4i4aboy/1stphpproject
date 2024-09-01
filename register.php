<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Регистрация</title>
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

    <!-- Main -->
    <div class="container">
        <h1 class="mt-4">Регистрация</h1>
        <p class="fs-5 mt-3 text-body-tertiary">Чтобы пользоваться нашим сайтом, Вам сначала нужно зарегистрироваться.</p>

        <form class="mt-4" action="./vendor/reg.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Логин</label>
                <input type="text" class="form-control" name="login" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input minlength="6" type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ФИО</label>
                <input type="text" class="form-control" name="full_name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Телефон</label>
                <input type="tel" class="form-control" name="telephone">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Согласен с правилами</label>
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
        <h1 class="mt-4 text-danger"><? 
        session_start();
        if(isset($_SESSION["message"])){
            echo $_SESSION["message"];
        } ?></h1>
    </div>
    <footer class=" fixed-bottom bg-secondary text-center text-lg-start mt-6 ">
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
    </footer>
</body>
<script src="./assets/js/bootstrap.bundle.min.js"></script>

</html>