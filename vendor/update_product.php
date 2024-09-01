<?php
session_start();
if ($_SESSION["user"]["status"] !== "1") {
    header('Location: /login.php');
    exit();
}

require "./db.php";

$product_id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_FILES['image'];

$update_query = "UPDATE `tovar` SET `title` = '$title', `description` = '$description', `price` = '$price'";

if ($image['name']) {
    $target_dir = "vendor/image/";
    $target_file = $target_dir . basename($image["name"]);
    move_uploaded_file($image["tmp_name"], $target_file);
    $update_query .= ", `image` = '$target_file'";
}

$update_query .= " WHERE `id` = '$product_id'";

if (mysqli_query($connect, $update_query)) {
    header('Location: /edit_product.php');
    exit();
} else {
    echo "Ошибка обновления товара: " . mysqli_error($connect);
}
?>
