<?php
session_start();
if ($_SESSION["user"]["status"] !== "1") {
    header('Location: /login.php');
    exit();
}

require "./db.php";

$product_id = $_POST['id'];

$delete_query = "DELETE FROM `tovar` WHERE `id` = '$product_id'";

if (mysqli_query($connect, $delete_query)) {
    header('Location: /admin.php');
    exit();
} else {
    echo "Ошибка удаления товара: " . mysqli_error($connect);
}
?>
