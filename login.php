<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/index.css">
    <title>Document</title>
</head>

<?php
require_once 'db.php';
?>

<body>
    <h1>Login</h1>
    <form action="login.php" method="post" style="display: flex; flex-direction: column; width: 30%">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="mail" placeholder="eMail">
        <input type="text" name="password" placeholder="Password">

        <input type="submit" name="submit" value="Login">
    </form>
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

            // redirect to another page
            // header("Location: index.php");
        } else {
            echo "Error you have not been logged in";
        }
    }
    ?>
    <a href="index.html">BAKHOME</a>
</body>

</html>