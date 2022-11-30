<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/nav.css">
    <link rel="stylesheet" href="styles/home.css">

</head>

<?php
require_once 'db.php';
ini_set('display_errors', '1');
?>

<body>
    <?php
    require 'navbar.php';
    ?>

    <div class="header">
        <section id="header">
            <h4>Let's find the puppy of your dream !</h4>
            <h2>Super value deals</h2>
            <h1>On all products !</h1>
            <p><em>delivery in less than 24 hours!*</em></p>
            <br>
            <button class="button"><a href="#animal_part">See products <em class="fas fa-box"></a></button>
        </section>
    </div>


    <div id="animal_part">
        <?php
        require 'animals.php';
        ?>
    </div>

</body>

</html>