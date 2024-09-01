<?
$connect = mysqli_connect('127.0.0.1:3306', 'root', '', 'avoska');

if (!$connect) {
    die("Database error!");
}
