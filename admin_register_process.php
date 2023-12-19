<?php

require 'database.php';

// Check of de form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "INSERT INTO users (firstname, lastname, username, hashed_password, email, role) VALUES ('$firstname', '$lastname', '$username', '$hashed_password', '$email', '$role')");

     if ($result) {
         echo "Registration successful!";
         header("location: admin_dashboard.php");
     } else {
         echo "Registration failed. Please try again.";
     }

}