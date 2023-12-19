<?php

require 'database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve registration data from the form
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $postal_code = $_POST["postal_code"];
    $email = $_POST["email"];
    $defaultRole = 'customer';

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // TODO: Implement database query to insert user data
    $result = mysqli_query($conn, "INSERT INTO users (firstname, lastname, username, hashed_password, address, postal_code, email, role) VALUES ('$firstname', '$lastname', '$username', '$hashed_password', '$address', '$postal_code', '$email', '$defaultRole')");

    //Example validation
     if ($result) {
         // Registration successful
         echo "Registration successful!";
     } else {
         // Registration failed
         echo "Registration failed. Please try again.";
     }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
<header>
        <h1>Register</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <!-- Add other navigation links as needed -->
            </ul>
        </nav>
    </header>

    <form method="post" action="" class="clearfix">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="postal_code">Postal Code:</label>
        <input type="text" id="postal_code" name="postal_code" required>

        <button type="submit" class="submit-button">Register</button>
    </form>

    <footer>
        <p>&copy; 2023 Coffee Delights</p>
    </footer>
</body>
</html>