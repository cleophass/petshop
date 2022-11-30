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
    <div class="nav">
        <div class="space"></div>

        <ul id="item">
            <li><a href="index.php">
                    <p class="p1">Home Page </p>
                </a></li>
            <li><a href="AboutMe.html">
                    <p class="p2">About Me </i>
                </a></li>
            <li><a href="db.php">
                    <p class="p5">test
                        <col>
                    </p>
                </a></li>
            <li><a href="buy.php">
                    <p class="p3">BUY</p>
                </a></li>
            <?php
            if (isset($_GET['logout'])) {
                unset($_SESSION); // unset and session data
                session_unset();  // remove all session variables
                session_destroy(); // destroy the session
                header("Location: index.php");
            }

            if (isset($_SESSION['name'])) {
                echo "
                        <li><a  href=\"?logout\"><img src=\"assets/logout.png
                        \" alt=\"logo\" height=\"50px\" width=\"50px\" class=\"image\"></a></li>";
            } else {
                echo "
                        <li><a href=\"login.php\"><img \"image\" src=\"assets/login.png
                        \" alt=\"logo\" height=\"50px\" width=\"50px\" class=\"image\"></a></li>";
            }
            ?>

        </ul>
    </div>
    <header>
        <section id="header">
            <h4>New season collection</h4>
            <h2>Super value deals</h2>
            <h1>On all products !</h1>
            <p><em>70% discount until the 2nd of june! *</em></p>
            <br>
            <button class="button"><a href="#animals">See products <em class="fas fa-box"></a></em></button>
        </section>
    </header>
    <?php
    require 'animal.php';
    ?>

</body>

</html>