<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Wachtwoord wijzigen</title>
</head>
<body>
<header>
        <h1>Login</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <div class="reset-password-container">
            <form action="reset_password_proces.php" method="post" onsubmit="return validateForm()">
                <h2>Wachtwoord wijzigen</h2>

                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" required>
                
                <label for="current_password">Huidig Wachtwoord:</label>
                <input type="password" name="current_password" required>

                <label for="new_password">Nieuw Wachtwoord:</label>
                <input type="password" name="new_password" id="new_password" required>

                <label for="confirm_password">Bevestig Nieuw Wachtwoord:</label>
                <input type="password" name="confirm_password" id="confirm_password" required>

                <button type="submit">Wijzig Wachtwoord</button>
            </form>
        </div>
    </main>


    <?php include 'footer.php'; ?>

</body>
</html>
