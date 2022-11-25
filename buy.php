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
require_once 'con.php';


ini_set('display_errors', '1');
session_start();
echo session_id();

// set session variables
$_SESSION["name"] = "john";


?>

<body>
    <h1>Buy a new animal</h1>
    <!-- Check if user is connected -->
    <animal>
        <h3>Name: Nendo</h3>
        <h3>Species: Dog</h3>
        <h3>Race: Akita</h3>
        <h3>Weight: 30kg</h3>
        <h3>Age: 2 years</h3>
        <h3>Price: 1000$</h3>
        <h3>Sexe: male</h3>

    </animal>

    <form action="buy.php" method="post" style="display: flex; flex-direction: column; width: 30%">
        <input type="submit" name="buy" value="BUY">
    </form>

    <?php
    if (!isset($_SESSION['name'])) {
        echo "
        <a href='connection.php'>Please connect to your website to purchase a pet 🤭</a>
        ";
    } else {
        echo "Welcome " . $_SESSION["name"];
    }
    if (isset($_POST['buy'])) {
        // fetch data of the connected user
        $name = $_SESSION['name'];
        $query = "SELECT * FROM account WHERE name = '$name'";
        $result = mysqli_query($connexion, $query);
        // check balance of user and compare it to the price of the animal
        $row = mysqli_fetch_assoc($result);
        $balance = $row['balance'];
        echo $balance;
        $price = 1000;
        if ($balance >= $price) {
            // if balance is enough, remove the price of the animal from the balance
            $newBalance = $balance - $price;
            $query = "UPDATE account SET balance = '$newBalance' WHERE name = '$name'";
            $result = mysqli_query($connexion, $query);
            if ($result) {
                echo "You have bought the animal";
            } else {
                echo "Error you have not bought the animal";
            }
        } else {
            echo "You don't have enough money to buy this animal";
        }
    }
    ?>
</body>

</html>