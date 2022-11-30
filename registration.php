<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/connection.css">

    <title>Document</title>
</head>
<?php
require_once 'db.php';
?>

<body>
    <div class="container">
        <div class="fixed wid">
            <h2 class="q">Register</h2>
            <form class="bonus" action="registration.php
            " method="post" style="display: flex; flex-direction: column; width: 30%">
                <div class="form_group">
                    <input class="input" type="text" name="mail" placeholder="eMail">
                </div>
                <div class="form_group">
                    <input class="input" type="text" name="name" placeholder="Name">
                </div>
                <div class="form_group">
                    <input class="input" type="password" name="password" placeholder="Password">
                </div>
                <input class="border moved2 unset" type="submit" name="submit" value="Register">
            </form>
        </div>
        <?php
        if (isset($_POST['submit']) && $_POST['name'] && $_POST['mail'] && $_POST['password']) {
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $password = md5($_POST['password']);
            $sql = "SELECT * FROM account WHERE mail = '$mail'";
            $result = mysqli_query($connexion, $sql);
            $user = mysqli_fetch_assoc($result);
            if ($user) {
                echo "User already exist";
                echo "<br>
                <a href=\"login.php\">Go to Login ⬅️</a>";
            } else {
                $query = "INSERT INTO account (name, mail, password) VALUES
                                                 ('$name', '$mail', '$password')";
                $result = mysqli_query($connexion, $query);
                if ($result) {
                    $_SESSION['name'] = $name;
                    echo "You have been registered";
                    echo "<br>
                <a href=\"index.php\">Go Home 🏡⬅️</a>";
                } else {
                    echo "Error you have not been registered";
                }
            }
        }
        ?>
    </div>
</body>

</html>