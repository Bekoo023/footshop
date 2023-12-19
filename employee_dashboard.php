<?php
session_start();

if ($_SESSION['role'] !== 'employee') {
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
                <?php include 'header.php' ?>
            </ul>
        </nav>
    </header>

    <main>

        <div class="logout-container">
            <form action="logout.php" method="post" class="logout-form">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>

    </main>
    <?php include 'footer.php'; ?>

</body>
</html>