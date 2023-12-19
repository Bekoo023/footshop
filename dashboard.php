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
        <?php include 'header.php'?>
    </header>

    <main>

    </main>

    <?php include 'footer.php'; ?>


    <script>
        document.getElementById('changePasswordBtn').addEventListener('click', function() {
            document.getElementById('changePasswordForm').style.display = 'block';
        });
    </script>
</body>
</html>