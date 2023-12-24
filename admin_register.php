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
    <link rel="shortcut icon" type="x-icon" href="fotos/achtergrond.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
    <div class="registration-container">
        <form action="admin_register_process.php" method="post">
            <h2>Admin Registration</h2>
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" required>

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" required>

            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
        <input type="password" name="password" required>

            <label for="role">Select Role:</label>
                <select name="role" required>
                    <option value="administrator">Admin</option>
                    <option value="employee">Employee</option>
                    <option value="customer">Customer</option>
                </select>
            <button type="submit">Register</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>

    
</body>
</html>