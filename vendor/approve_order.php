<?php
require './db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = (int) $_POST['order_id'];
    $query = "UPDATE orders SET status='Подтверждено' WHERE id=$order_id";
    if (mysqli_query($connect, $query)) {
        header('Location: ../admin.php');
        exit();
    } else {
        echo "Ошибка: " . mysqli_error($connect);
    }
} else {
    header('Location: ../login.php');
    exit();
}
?>
