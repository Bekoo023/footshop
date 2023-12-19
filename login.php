<?php

require 'database.php';

session_start();

// Initialize the error variable
$error = "Verkeerde gegevens";


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve login data from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // TODO: Implement database query to retrieve hashed password
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $row = mysqli_fetch_assoc($result);

    // Example validation
    if ($row && password_verify($password, $row['hashed_password'])) {
        // Valid login

        $_SESSION['role'] = $row['role'];

        switch ($_SESSION['role']) {
            case 'administrator':
                header('Location: admin_dashboard.php');
                break;
            case 'employee':
                header('Location: employee_dashboard.php');
                break;
            case 'customer':
                header('Location: dashboard.php');
                break;
            default:
                // Handle unexpected roles
                $error = "Invalid login credentials!";
        }
    
        exit;
    } else {
        // Invalid login
        $error = "Invalid login credentials!";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Login</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <!-- Add other navigation links as needed -->
            </ul>
        </nav>
    </header>

    <!-- Display error message if any -->
    <?php if ($error !== "Verkeerde gegevens") : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <footer>
        <p>&copy; 2023 Coffee Delights</p>
    </footer>
</body>
</html>
