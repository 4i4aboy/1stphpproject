<?

session_start();
require "./db.php";


$tovar_id = $_POST["tovar_id"];
$user_id = $_SESSION["user"]["id"];
$kol_vo = $_POST["kol_vo"];
$addres = $_POST["addres"];
$full_name = $_SESSION["user"]["full_name"];
$email = $_SESSION["user"]["email"];
$title = $_POST["title"];

$sql = "SELECT * FROM tovar WHERE id = $tovar_id";
$result = mysqli_query($connect, $sql);
$product = mysqli_fetch_assoc($result);

if ($product) {
    $cart_item = [
        'id' => $product['id'],
        'name' => $product['title'],
        'price' => $product['price'],
        'quantity' => $kol_vo,
    ];

    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $found = false;

        foreach ($cart as &$item) {
            if ($item['id'] === $product['id']) {
                $item['quantity']++;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = $cart_item;
        }

        $_SESSION['cart'] = $cart;
    } else {
        $_SESSION['cart'] = [$cart_item];
    }
}
header('Location:../cart.php');
