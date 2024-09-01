<?
session_start();
if ($_SESSION["user"]["status"] === "user") {
    header('Location: ./catalog.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Добавление товара</title>
</head>

<body>
    <!-- Навбар -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="vendor/image/logo.png" width="150" height="60" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin.php">Админ панель</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/edit_product.php">Редактировать товар</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="./vendor/destroy.php">Выйти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <div class="container">
    <form class="mt-4" action="./vendor/add.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Название</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Описание</label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Цена</label>
                <input type="text" class="form-control" name="price" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Описание</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Добавить новый товар</button>
        </form>
    </div>
</body>
<script src="./assets/js/bootstrap.bundle.min.js"></script>

</html>