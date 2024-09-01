<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['status'] !== '1') {
    header('Location: ./catalog.php');
    exit();
}

require './vendor/db.php';

$query = "
    SELECT 
        orders.id AS order_id, 
        orders.status AS order_status, 
        users.full_name AS user_name, 
        users.email AS user_email, 
        GROUP_CONCAT(tovar.title SEPARATOR ', ') AS item_titles, 
        GROUP_CONCAT(order_items.qnt SEPARATOR ', ') AS quantities
    FROM orders 
    JOIN users ON orders.user_id = users.id 
    JOIN order_items ON orders.id = order_items.order_id
    JOIN tovar ON order_items.tovar_id = tovar.id
    GROUP BY orders.id, orders.status, users.full_name, users.email
";
$result = mysqli_query($connect, $query);

$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Панель-Администратора</title>
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
        <h2 class="mt-4">Заказы</h2>
        <main class="row mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-1">№ Заказа</th>
                        <th class="col-2">ФИО</th>
                        <th class="col-2">Email</th>
                        <th class="col-2">Название товара</th>
                        <th class="col-2">Количество товара</th>
                        <th class="col-2">Cтатус заказа</th>
                        <th class="col-1"></th>
                        <th class="col-1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <th><?= htmlspecialchars($order['order_id']) ?></th>
                            <td><?= htmlspecialchars($order['user_name']) ?></td>
                            <td><?= htmlspecialchars($order['user_email']) ?></td>
                            <td><?= htmlspecialchars($order['item_titles']) ?></td>
                            <td><?= htmlspecialchars($order['quantities']) ?></td>
                            <td>
                                <?php if ($order['order_status'] === 'Новый'): ?>
                                    <p class="text-primary"><?= htmlspecialchars($order['order_status']) ?></p>
                                <?php elseif ($order['order_status'] === 'Отменено'): ?>
                                    <p class="text-danger"><?= htmlspecialchars($order['order_status']) ?></p>
                                <?php elseif ($order['order_status'] === 'Подтверждено'): ?>
                                    <p class="text-success"><?= htmlspecialchars($order['order_status']) ?></p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($order['order_status'] === 'Новый'): ?>
                                    <form action="./vendor/approve_order.php" method="POST">
                                        <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['order_id']) ?>">
                                        <button type="submit" class="btn btn-success">Принять</button>
                                    </form>
                                <?php else: ?>
                                    <button type="button" class="btn btn-success" disabled>Принять</button>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($order['order_status'] === 'Новый'): ?>
                                    <form action="./vendor/reject_order.php" method="POST">
                                        <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['order_id']) ?>">
                                        <button type="submit" class="btn btn-danger">Отклонить</button>
                                    </form>
                                <?php else: ?>
                                    <button type="button" class="btn btn-danger" disabled>Отклонить</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
<script src="./assets/js/bootstrap.bundle.min.js"></script>

</html>
