<?php

require 'database.php';

// Data uit het formulier halen
$title = $_POST['title'];
$rating = $_POST['rating'];
$purchase_date = $_POST['purchase_date'];
$product_service_name = $_POST['product_service_name'];
$review_text = $_POST['review_text'];
$recommendation = $_POST['recommendation'];
$usage_tips = $_POST['usage_tips'];

// SQL-query om de review in te voegen
$sql = "INSERT INTO reviews (title, rating, purchase_date, product_service_name, review_text, recommendation, usage_tips) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("siissss", $title, $rating, $purchase_date, $product_service_name, $review_text, $recommendation, $usage_tips);

if ($stmt->execute()) {
    echo "Review succesvol ingediend!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// dit moet in de page om te laten zien

require 'database.php';

// SQL-query om alle reviews op te halen
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // De data van elke rij weergeven
    while($row = $result->fetch_assoc()) {
        echo "<div><h3>" . $row["title"]. "</h3><p>Rating: " . $row["rating"]. " - Purchase date: " . $row["purchase_date"]. "</p><p>Product/Dienst: " . $row["product_service_name"]. "</p><p>Review: " . $row["review_text"]. "</p><p>Aanbeveling: " . $row["recommendation"]. "</p><p>Tips voor gebruik: " . $row["usage_tips"]. "</p></div><hr>";
    }
} else {
    echo "0 results";
}
?>
