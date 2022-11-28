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
                    <input class="input" type="text" name="password" placeholder="Password">
                </div>



                <input class="border moved2 unset" type="submit" name="submit" value="Register">
            </form>

        </div>













        <!-- 
    <h1>
        Register
    </h1>
    <form action="registration.php" method="post" style="display: flex; flex-direction: column; width: 30%">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="password" placeholder="Password">
        <input type="email" name="mail" placeholder="mail">



        <input type="submit" name="submit" value="Register">
    </form> -->
        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $password = md5($_POST['password']);


            $query = "INSERT INTO account (name, mail, password) VALUES
        ('$name', '$mail', '$password')";
            $result = mysqli_query($connexion, $query);
            if ($result) {
                echo "You have been registered";
            } else {
                echo "Error you have not been registered";
            }
        }
        ?>
</body>

</html>