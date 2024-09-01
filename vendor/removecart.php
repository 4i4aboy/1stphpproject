<?php
session_start();

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];

        foreach ($cart as $key => $item) {
            if ($item['id'] == $id) {
                unset($cart[$key]);
                break;
            }
        }

        $_SESSION['cart'] = array_values($cart); // пересобираем массив, чтобы ключи были последовательны
    }
}

header('Location:../cart.php');
