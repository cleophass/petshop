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


        <img src="assets/logo.png" alt="logo" height="100px" width="100px" class="logo">

        <div class="space"></div>


        <ul id="item">
            <li><a href="index.php">
                    <p class="p1">Home Page </p>
                </a></li>
            <li><a href="AboutMe.html">
                    <p class="p2">About Me </i>
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
</body>

</html>