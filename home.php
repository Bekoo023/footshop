<?php

session_start();

require 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <header>
        <div class="headerlinks">
            <form action="search.php" method="get" class="search-form">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>
        <h1>Welcome to Delights</h1>
        <?php include 'header.php'?>
        <a href="shopping_bag.php" class="shopping_bag_button"><img src="fotos/bag.jpg" alt="Shopping Bag"></a>
    </header>

    <main>
        <h2>Welcome to Our Website</h2>
    </main>

    <div class="product-list" id="productList">
        <?php
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product">';
                echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>' . $row['omschrijving'] . '</p>';
                echo '<p>Price: € ' . number_format($row['price'], 2) . '</p>';
                echo '<button class="add-to-cart-button" onclick="addToCart(' . $row['product_id'] . ')">Add to Cart</button>';
                echo '</div>';
            }
        } else {
            echo '<p>No products available.</p>';
        }

        mysqli_close($conn);
        ?>
    </div>

    <?php include 'footer.php'; ?>

    <script src="script.js"></script>
</body>
</html>
