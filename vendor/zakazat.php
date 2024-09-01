<?

session_start();
require "./db.php";

$cart = $_SESSION['cart'];
$user_id = $_SESSION["user"]["id"];
$total = $_POST['total'];

$order = "INSERT INTO `orders`(`id`, `user_id`, `cost`) VALUES (NULL,'$user_id','$total')";

if (mysqli_query($connect, $order)) {
    $order_id = mysqli_insert_id($connect);

    foreach ($cart as $item) {
       $sql = "INSERT INTO order_items (order_id, tovar_id, qnt, price) VALUES ($order_id, {$item['id']}, {$item['quantity']}, {$item['price']})";
        mysqli_query($connect, $sql);
    }

    $_SESSION['cart'] = [];
    header('Location:../zakaz_s.php');
} else {
    echo 'Ошибка';
} 
