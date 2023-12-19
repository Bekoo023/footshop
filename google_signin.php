<!-- google_signin.php -->

<?php

require 'vendor/autoload.php';

// Replace 'YOUR_CLIENT_ID' with your actual client ID
$client = new Google_Client(['client_id' => 'YOUR_CLIENT_ID']);

$id_token = $_POST['id_token'] ?? null;

if ($id_token) {
    try {
        $payload = $client->verifyIdToken($id_token);

        if ($payload) {
            // The id_token is valid, you can use $payload to access user information
            $user_id = $payload['sub'];
            $user_email = $payload['email'];

            // Perform further actions like user authentication or registration
            // For example, you might check if the user is already in your database
            // and create a new user account if necessary.

            echo 'Authentication successful';
        } else {
            echo 'Invalid id_token';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Error: id_token is not set';
}

?>
