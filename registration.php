<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link stylesheet registration.css -->
    <link rel="stylesheet" href="registration.css">
    
    <title>Document</title>
</head>
<?php
ini_set('display_errors', '1');
$host = "localhost";
$user = "root";
$password = "";
$db = "DATAPETS";
$connexion = mysqli_connect($host, $user, $password, $db);

if (!$connexion) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

?>

<body>
    <h1>
        Register
    </h1>
    <form action="registration.php" method="post" style="display: flex; flex-direction: column; width: 30%">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="password" placeholder="Password">
        <input type="email" name="mail" placeholder="mail">
        

        <input type="submit" name="submit" value="Register">
    </form>
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