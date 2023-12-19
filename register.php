<?php

require 'database.php';

// Check of de form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $defaultRole = 'customer';

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "INSERT INTO users (firstname, lastname, username, hashed_password, email, role) VALUES ('$firstname', '$lastname', '$username', '$hashed_password', '$email', '$defaultRole')");

     if ($result) {
         echo "Registration successful!";
     } else {
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
                <?php include 'header.php';  ?>
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

        <button type="submit" class="submit-button">Register</button>
    </form>

    <?php include 'footer.php'; ?>

</body>
</html>