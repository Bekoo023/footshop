<?php

require 'database.php';

if (isset($_SESSION['username'])) {
    echo '<nav>';
    echo '<ul>';
    echo '<li><a href="home.php">Home</a></li>';
    echo '<li><a href="producten.php">Products</a></li>';

    if ($_SESSION['role'] === 'administrator') {
        echo '<li><a href="admin_dashboard.php">Dashboard</a></li>';
        echo '<li><a href="admin_register.php">Register New</a></li>';
    } elseif ($_SESSION['role'] === 'employee') {
        echo '<li><a href="employee_dashboard.php">Dashboard</a></li>';
    } elseif ($_SESSION['role'] === 'customer') {
        echo '<li><a href="dashboard.php">Dashboard</a></li>';
    }
    echo '<li><a href="logout.php">Logout</a></li>';
    echo '</ul>';
    echo '</nav>';
} else {
    echo '<nav>';
    echo '<ul>';
    echo '<li><a href="home.php">Home</a></li>';
    echo '<li><a href="producten.php">Products</a></li>';
    echo '<li><a href="login.php">Login</a></li>';
    echo '<li><a href="register.php">Register</a></li>';
    echo '</ul>';
    echo '</nav>';
}

?>