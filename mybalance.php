<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/nav.css">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/wallet.css">
    <title>Document</title>
</head>
<?php
require_once 'db.php';
ini_set('display_errors', '1');
?>

<body>

    <?php
    require 'navbar.php';
    ?>

    <h1 class="title1">Your current balance is :</h1>
    <?php
    if (isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
        $mail = $_SESSION['mail'];
        $query = "SELECT * FROM account WHERE name = '$name' and mail = '$mail'";
        $result = mysqli_query($connexion, $query);
        $row = mysqli_fetch_assoc($result);
        $balance = $row['balance'];
        echo "<h1 class=balance>" . $balance . "$</h1>";
    } else {
        echo "<a href=\"login.php\"><h1 class=\"title1\">You are not logged in!</h1></a>";
    }
    ?>


    <h1 class="title2">Refill your e-wallet :</h1>

    <form action="mybalance.php" method="post">
        <div class="center">
            <input type="text" name="" placeholder="Card Number" class="fill">
            <div class="ligne"> <input type="text" name="" placeholder="Expiration date" class="subfill">
                <input type="text" name="" placeholder="CVV" class="subfill">
            </div>
            <input type="text" name="amount" placeholder="Amount" class="fill">
            <input type="submit" name="refill" value="Refill wallet" class="button2">
        </div>
    </form>


    <?php
    if (isset($_POST['refill']) && isset($_SESSION['name'])) {
        $amount = $_POST['amount'];
        if ($amount > 0) {
            $newBalance = $balance + $amount;
            $query = "UPDATE account SET balance = '$newBalance' WHERE name = '$name' and mail = '$mail'";
            $result = mysqli_query($connexion, $query);
            if ($result) {
                echo "You have refilled your wallet";
                header("Refresh:0");
            } else {
                echo "Error you have not refilled your wallet";
            }
        } else {
            echo "Please enter a valid amount";
        }
    }
    ?>

</body>

</html>