<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    // Validate the email address (you can use PHP filter_var or a library like PHPMailer)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Add the email to your database or mailing list
        // Send a confirmation email to the subscriber
        // Redirect to a thank-you page
        header("Location: home.php");
        exit;
    } else {
        // Invalid email, display an error message
        echo "Invalid email address.";
    }
}
?>
