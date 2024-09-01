<?php
session_start();
if (!isset($_SESSION["user"]) || $_SESSION["user"]["status"] !== "1") {
    header('Location: /login.php');
    exit();
}

require "./vendor/db.php";

// Запрос на получение всех товаров
$query = "SELECT * FROM tovar";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Редактирование товаров</title>
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
                        <a class="nav-link" href="/addtovar.php">Добавить товар</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin.php">Админ панель</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="./vendor/destroy.php">Выйти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Основное содержимое -->
    <div class="container">
        <h1 class="mt-4">Редактирование товаров</h1>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Картинка</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <form action="/vendor/update_product.php" method="POST" enctype="multipart/form-data">
                            <td><input type="text" name="title" value="<?= $row['title'] ?>" class="form-control" required></td>
                            <td><textarea name="description" class="form-control" required><?= $row['description'] ?></textarea></td>
                            <td><input type="number" step="0.01" name="price" value="<?= $row['price'] ?>" class="form-control" required></td>
                            <td>
                                <img src="<?= $row['image'] ?>" alt="Image" width="100">
                                <input type="file" name="image" class="form-control">
                            </td>
                            <td>
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </td>
                        </form>
                        <form action="/vendor/delete_product.php" method="POST" class="mt-3">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <td><button type="submit" class="btn btn-danger">Удалить товар</button></td>
        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
