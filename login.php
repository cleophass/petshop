<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/connection.css">

    <title>Document</title>
</head>

<?php require_once 'db.php'; ?>

<body>
    <?php require 'navbar.php'; ?>
    <div class="container">
        <div class="fixed wid">
            <h2 class="q">Connection to A.P.UPPIES</h2>

            <form class="bonus" action="login.php" method="post" style="
            display: flex;
            flex-direction: column;
            width: 30%;">
                <div class="form_group">
                    <input class="input" type="text" name="mail" placeholder="eMail">
                </div>
                <div class="form_group">
                    <input class="input" type="text" name="name" placeholder="Name">
                </div>
                <div class="form_group">
                    <input class="input" type="text" name="password" placeholder="Password">
                </div>
                <input class="border moved2 unset" type="submit" name="submit" value="Login">
            </form>

            <div class="line">
                <h2 class="customer">New customer ?</h2>
                <a class="border moved" href="registration.php">Register</a>
            </div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $mail = $_POST['mail'];
            $password = md5($_POST['password']);
            $query = "SELECT * FROM account WHERE password = '$password' AND mail = '$mail'";
            $result = mysqli_query($connexion, $query);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['mail'] = $mail;
                $_SESSION['name'] = $_POST['name'];
                echo session_id();
                header("Location: index.php");
            } else {
                echo "Error you have not been logged in😕<br>You might try another email or password🤔";
            }
        }
        ?>
    </div>
</body>

</html>