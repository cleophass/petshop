<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>
    <?php
    ini_set('display_errors', '1');
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "DATAPETS";
    $connexion = mysqli_connect($host, $user, $password, $db);

    if (!$connexion) {
        die("Connection failed: " . mysqli_connect_error());
    }
    session_start();
    ?>
</body>

</html>