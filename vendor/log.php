<?php
require "./db.php";

$login = $_POST["login"];
$password = $_POST["password"];

$login = mysqli_real_escape_string($connect, $login);
$password = mysqli_real_escape_string($connect, $password);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

session_start();
if (mysqli_num_rows($check_user) <= 0) {
    $_SESSION["message"] = "Неверный логин или пароль!";
    header('Location: /login.php');
    exit();
} else {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION["user"] = [
        "id" => $user["id"],
        "login" => $user["login"],
        "full_name" => $user["full_name"],
        "telephone" => $user["telephone"],
        "email" => $user["email"],
        "status" => $user["status"]
    ];

    if ($_SESSION["user"]["status"] === "2") {
        header('Location: /catalog.php');
    } elseif ($_SESSION["user"]["status"] === "1") {
        header('Location: /admin.php');
    }
    exit();
}
?>
