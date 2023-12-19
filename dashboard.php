<?php
session_start();

if ($_SESSION['role'] !== 'customer') {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
</head>
<body>
<header>
        <h1>Your Dashboard</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Content of your dashboard goes here -->

        <!-- Logout button placed above the content -->
        <div class="logout-container">
            <form action="logout.php" method="post" class="logout-form">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>

        <!-- Rest of the dashboard content -->
    </main>
    <footer>
        <p>&copy; 2023 Coffee Delights</p>
    </footer>
</body>
</html>