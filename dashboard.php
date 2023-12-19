<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Your Dashboard</title>
</head>
<body>
<header>
        <h1>Your Dashboard</h1>
        <?php include 'header.php'; ?>
    </header>

        
    <div class="container_bag">
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                echo '<div class="product_bag">';
                echo '<img src="' . $item['image'] . '" alt="' . $item['name'] . '">';
                echo '<h3>' . $item['name'] . '</h3>';
                echo '<p>Omschrijving: ' . $item['omschrijving'] . '</p>';
                echo '<p>Price: €' . number_format($item['price'], 2) . '</p>';
                echo '<button class="remove-from-cart-button" onclick="removeFromCart(' . $key . ')">Remove from Cart</button>';
                echo '</div>';
            }

            $totalAmount = array_sum(array_column($_SESSION['cart'], 'price'));
            echo '<div class="total">';
            echo 'Total Amount: $' . number_format($totalAmount, 2);
            echo '</div>';
        } else {
            echo '<p>Your shopping bag is empty.</p>';
        }

        mysqli_close($conn);
        ?>
    </div>

    <?php include 'footer.php'; ?>

    <script src="script.js"></script>
</body>
</html>