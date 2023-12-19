<?php

require 'database.php';

session_start();

$error = "Verkeerde gegevens";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $row = mysqli_fetch_assoc($result);
    
    if ($row && password_verify($password, $row['hashed_password'])) {

        $_SESSION['role'] = $row['role'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['user_id'];

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
                $error = "Verkeerde login gegevens!";
        }
        exit;
    } else {
        $error = "Verkeerde login gegevens!";
    }

}


?>
<?php require_once('auth.php') ?>
<?php require_once('vendor/autoload.php') ?>
<?php
$clientID = "678469642038-ipjs6ntba68c42egk8f0il7snhonph6e.apps.googleusercontent.com";
$secret = "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";

// Google API Client
$gclient = new Google_Client();

$gclient->setClientId($clientID);
$gclient->setClientSecret($secret);
$gclient->setRedirectUri('http://localhost/test/login.php');


$gclient->addScope('email');
$gclient->addScope('profile');

if(isset($_GET['code'])){
    // Get Token
    $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);

    // Check if fetching token did not return any errors
    if(!isset($token['error'])){
        // Setting Access token
        $gclient->setAccessToken($token['access_token']);

        // store access token
        $_SESSION['access_token'] = $token['access_token'];

        // Get Account Profile using Google Service

        // Get User Data
        $udata = $gservice->userinfo->get();
        foreach($udata as $k => $v){
            $_SESSION['login_'.$k] = $v;
        }
        $_SESSION['ucode'] = $_GET['code'];

        header('location: ./');
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <title>Login</title>
    </head>
<body>
    <header>
        <h1>Login</h1>
        <nav>
            <?php include 'header.php';  ?>
        </nav>
    </header>

    <main>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        
            <?php if ($error !== "Verkeerde gegevens") : ?>
                <p class="verkeerd"><?php echo $error; ?></p>
            <?php endif; ?>

            <button type="submit">Login</button><br><br>
            <div class="googlesignin">
                <a href="<?= $gclient->createAuthUrl() ?>"><button type="button">Log in met Google.</button></a>
            </div>
            
            <p>Nog geen account? <a href="register.php">Registreer hier</a></p>
            <p>Wachtwoord vergeten? <a href="reset_password.php">Wijzig hier je wachtwoord</a></p>
        </form>
    </main>

    <?php include 'footer.php'; ?>


    <script src="script.js"></script>

</body>
</html>
