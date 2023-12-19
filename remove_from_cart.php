<?php
session_start();

if (isset($_GET['index']) && is_numeric($_GET['index'])) {
    $index = intval($_GET['index']);

    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
    }
}

header('Location: shopping_bag.php');
exit();
?>
