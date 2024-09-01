<?
session_start();

require "db.php";

$tit = $_POST['title'];
$desc = $_POST['description'];
$price = $_POST['price'];
$photo = $_FILES['image'];

$photoname = $photo['name'];
$photopath = __DIR__.'/image/'.$photoname;
$path = 'vendor/image/' . $photoname;

if(!move_uploaded_file($photo['tmp_name'], $photopath)){
    echo 'Фото не загрузилось';
}

$check_user = mysqli_query($connect,"INSERT INTO `tovar`(`id`, `title`, `description`,`price`, `image`) VALUES (NULL,'$tit','$desc','$price','$path')");

header('location:../catalog.php');