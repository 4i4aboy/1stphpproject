<?

require "./db.php";


$login = $_POST["login"];
$password = $_POST["password"];
$full_name = $_POST["full_name"];
$telephone = $_POST["telephone"];
$email = $_POST["email"];

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
if (mysqli_num_rows($check_user) > 0) {
    session_start();
    $_SESSION["message"] = "Такой логин уже занят!";
    header('location: /register.php');
} else {
    $add_user = mysqli_query($connect, "INSERT INTO `users`(`id`, `login`, `password`, `full_name`, `telephone`, `email`) 
    VALUES (NULL,'$login','$password','$full_name','$telephone','$email')");
    session_start();
    $_SESSION["message_log"] = "Вы успешно зарегистрировались!";
    header('location: /login.php');
}
