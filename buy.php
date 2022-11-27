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
ini_set('display_errors', '1');
?>

<body>
    <h1>Buy a new animal</h1>
    <?php
    $sql = "SELECT * FROM pets where id = " . $_SESSION['petId'];
    $result = mysqli_query($connexion, $sql);
    $animal = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Species</th>
            <th>Race</th>
            <th>Weight</th>
            <th>Age</th>
            <th>Price</th>
            <th>Sexe</th>
        </tr>
        <tr>
            <td><?php echo $animal['name'] ?></td>
            <td><?php echo $animal['species'] ?></td>
            <td><?php echo $animal['race'] ?></td>
            <td><?php echo $animal['weight'] ?></td>
            <td><?php echo $animal['age'] ?></td>
            <td><?php echo $animal['price'] ?></td>
            <td><?php echo $animal['sexe'] ?></td>
        </tr>
    </table>
    <?php
    if (!isset($_SESSION['name'])) {
        echo "
    <a href='connection.php'>Please connect to your website to purchase a pet 🤭</a>
    ";
    } else {
        echo "Welcome " . $_SESSION["name"];
    }
    if ($_SESSION['bought']) {
        echo "<br>Congrats! You have bought " . $animal['name'] . ' 🎉';
    } else {
        echo
        "<form method=\"post\" style=\"display: flex; flex-direction: column; width: 30%\">
        <input type=\"submit\" name=\"buy\" value=\"BUY\">
    </form>";
    }
    ?>


    <?php
    if (isset($_POST['buy'])) {
        // fetch data of the connected user
        $name = $_SESSION['name'];
        $mail = $_SESSION['mail'];
        $query = "SELECT * FROM account WHERE name = '$name' and mail = '$mail'";
        $result = mysqli_query($connexion, $query);
        // check balance of user and compare it to the price of the animal
        $row = mysqli_fetch_assoc($result);
        $balance = $row['balance'];
        $price = $animal['price'];
        if ($balance >= $price) {
            // if balance is enough, remove the price of the animal from the balance
            $newBalance = $balance - $price;
            $query = "UPDATE account SET balance = '$newBalance' WHERE name = '$name'";
            $result = mysqli_query($connexion, $query);
            if ($result) {
                $_SESSION['bought'] = true;
                header("Refresh:0");
            } else {
                echo "Error you have not bought the animal";
            }
        } else {
            echo "<br>You don't have enough money to buy this animal";
        }
    }
    ?>

    <h1>Wallet</h1>
    <!-- fetch balance from table account -->
    <?php
    $name = $_SESSION['name'];
    $mail = $_SESSION['mail'];
    $query = "SELECT * FROM account WHERE name = '$name' and mail = '$mail'";
    $result = mysqli_query($connexion, $query);
    $row = mysqli_fetch_assoc($result);
    $balance = $row['balance'];
    echo "<h3>Your balance is: </h3>" . $balance . "$";
    ?>

    <form action="buy.php" method="post" style="display: flex; flex-direction: column; width: 30%">
        <input type="text" name="amount" placeholder="Amount">
        <input type="submit" name="refill" value="Refill wallet">
    </form>

    <?php
    if (isset($_POST['refill'])) {
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