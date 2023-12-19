<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Products</title>
</head>
<body>
    <header>
    <div class="headerlinks">
            <form action="search.php" method="get" class="search-form">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>
        <h1>Products</h1>
        <?php include 'header.php'; ?>
    </header>
    <main>
        
    </main>

    <?php include 'footer.php'; ?>

</body>
</html>
