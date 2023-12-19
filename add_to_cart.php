<?php
session_start();
require 'database.php';

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = "SELECT * FROM products WHERE product_id = $productId";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $product;

    echo 'Product added to the cart.';
} else {
    echo 'Invalid product ID.';
}

mysqli_close($conn);
?>
