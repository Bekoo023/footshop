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
    <title>FootShop</title>
</head>
<body>
    <header>
        <h1>Welcome to FootShop</h1>
        <?php include 'header.php'?>
        <a href="shopping_bag.php" class="shopping_bag_button"><img src="fotos/bag.jpg" alt="Shopping Bag"></a>
    </header>

    <main>
    <div class="slideshow-container">
    <div class="mySlides fade">
            <a href="producten.php"><img src="fotos/fotoslide.jpg" style="width:100%" onclick="showInfo('Coffee Image 1')"></a>
        </div>

        <div class="mySlides fade">
        <a href="producten.php"><img src="fotos/fotoslide2.jpg" style="width:100%" onclick="showInfo('Coffee Image 1')"></a>
        </div>

        <div class="mySlides fade">
        <a href="producten.php"><img src="fotos/fotoslide3.jpg" style="width:100%" onclick="showInfo('Coffee Image 1')"></a>
        </div>
    </div>
    </main>

    <div class="texttopproducten">
        <p><strong>Top producten: </strong></p>
    </div>

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
