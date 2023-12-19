<?php

require 'database.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];

    $current_password = $_POST["current_password"];

    $query = "SELECT hashed_password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password_from_db = $row['hashed_password'];

        if (password_verify($current_password, $hashed_password_from_db)) {

            $new_password = $_POST["new_password"];
            $confirm_password = $_POST["confirm_password"];

            if ($new_password === $confirm_password) {
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                $update_query = "UPDATE users SET hashed_password = '$hashed_new_password' WHERE username = '$username'";
                $update_result = mysqli_query($conn, $update_query);

                if ($update_result) {
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "Error updating password: " . mysqli_error($conn);
                }
            } else {
                echo "Nieuwe wachtwoorden komen niet overeen.";
            }
        } else {
            echo "Het huidige wachtwoord is onjuist.";
        }
    } else {
        echo "Error fetching user data: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
