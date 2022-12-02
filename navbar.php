<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/nav.css">
</head>

<body>
    <div class="nav">
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
            <li><a href="mybalance.php">
                    <p class="p1">MyBalance</p>
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
                    <ul class=\"main\">
                        <li > <a  class=\"title\" >Welcome " . $_SESSION['name'] . "</a></li>
                        <li> <a href=\"?logout\" class=\"image\">Logout</a></li>
                        <li> <a href=\"profile.php\" class=\"image\">Profile</a></li>
                        <li> <a href=\"cart.php\" class=\"image\">Cart</a></li>
                    </ul>
                </li>";
            } else {
                echo "
                <li class=\"hov\"><a ><img \"image\" src=\"assets/login.png
                \" alt=\"logo\" height=\"50px\" width=\"50px\" class=\"image\"></a>
                    <ul class=\"main\">
                        
                        <li> <a href=\"login.php\" class=\"image\">Login</a></li>
                        <li> <a href=\"registration.php\" class=\"image\">Register</a></li>
                        
                    </ul>
                </li>";
            }
            ?>

        </ul>
    </div>
</body>

</html>