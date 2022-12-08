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
    <div class="header">
    <div class="nav" style="background-color: transparent;">
        <ul>
            <li><a href="index.php"><img src="assets/logo.png
        " alt="logo" height="100px" width="100px" class="logo"></a></li>
        </ul>

        <div class="space"></div>
        <ul id="item">
            <li>
            <li><a href="sellpet.php">
                    <p class="p1">MySell</p>
                </a></li>
            

            <li><a href="mypets.php">
                    <p class="p1">MyPets</p>
                </a></li>
            <li><a href="aboutus.php">
                    <p class="p1">About Us</i>
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
                
                <li class=\"hov\"><a  href=\"?logout\"><img src=\"assets/logout.png
                \" alt=\"logo\" height=\"50px\" width=\"50px\" class=\"image\"></a>
                    <ul class=\"main\" >
                       
                        <li style=\"background-color:transparent;\"> <a href=\"?logout\" class=\"image\" >Logout</a></li>
                        <li style=\"background-color:transparent;\"> <a href=\"mybalance.php\" class=\"image\" >MyBalance</a></li>
                       
                    </ul>
                </li>";
            } else {
                echo "
                <li class=\"hov\"><a ><img \"image\" src=\"assets/login.png
                \" alt=\"logo\" height=\"50px\" width=\"50px\" class=\"image\" ></a>
                    <ul class=\"main\" >
                        
                        <li  style=\"background-color:transparent;\"> <a href=\"login.php\" class=\"image\" >Login</a></li>
                        <li  style=\"background-color:transparent;\"> <a href=\"registration.php\" class=\"image\">Register</a></li>
                        
                    </ul>
                </li>";
            }
            ?>

        </ul>
    </div>




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