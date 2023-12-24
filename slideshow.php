<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="fotos/achtergrond.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Slidehsow</title>
</head>
<body>
    <header>
        <h1>Slideshow</h1>
        <?php include 'header.php'?>
    </header>

    <main>
    <div class="slideshow-container">
    <div class="mySlides fade">
            <img src="fotos/coffee1.jpg" style="width:100%" onclick="showInfo('Coffee Image 1')">
            <div class="text">Coffee 1</div>
        </div>

        <div class="mySlides fade">
            <img src="fotos/coffee2.jpg" style="width:100%" onclick="showInfo('Coffee Image 2')">
            <div class="text">Coffee 2</div>
        </div>

        <div class="mySlides fade">
            <img src="fotos/coffee3.jpg" style="width:100%" onclick="showInfo('Coffee Image 3')">
            <div class="text">Coffee 3</div>
        </div>

        <div class="mySlides fade">
            <img src="fotos/coffee4.jpg" style="width:100%" onclick="showInfo('Coffee Image 4')">
            <div class="text">Coffee 4</div>
        </div>

        <div class="mySlides fade">
            <img src="fotos/coffee5.jpg" style="width:100%" onclick="showInfo('Coffee Image 5')">
            <div class="text">Coffee 5</div>
        </div>

        <div class="mySlides fade">
            <img src="fotos/coffee6.jpg" style="width:100%" onclick="showInfo('Coffee Image 6')">
            <div class="text">Coffee 6</div>
        </div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </main>

    <?php include 'footer.php'; ?>


    <script src="script.js"></script>
</body>
</html>