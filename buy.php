<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/cards.css">

    <title>Document</title>
</head>

<?php
require_once 'db.php';
ini_set('display_errors', '1');
?>

<body>
    <?php require 'navbar.php'; ?>
    <h1>Buy a new animal</h1>
    <?php
    $sql = "SELECT * FROM pets where id = " . $_SESSION['petId'];
    $result = mysqli_query($connexion, $sql);
    $animal = mysqli_fetch_assoc($result);
    if (!$animal) {
        $animal = $_SESSION['animal'];
    }
    mysqli_free_result($result);
    ?>
    <article class="card card--1" style="background-image:url(<?php echo $animal['photo'] ?>">
        <div class="card__info-hover">
            <span class="card__category" viewBox="0 0 24 24"><?php echo $animal['age'] ?>years old</span>
            <div class="card__clock-info">
                <span class="card__time" viewBox="0 0 24 24"><?php echo $animal['weight'] ?> kg</span>
                <span class="card__time"><?php echo $animal['race'] ?></span>
            </div>
        </div>
        <div class="card__img"></div>
        <div class="card_link">
            <div class="card__img--hover"></div>
        </div>
        <div class="card__info">
            <span class="card__category"><?php echo $animal['species'] ?></span>
            <h3 class="card__title"><?php echo $animal['name'] ?></h3>
            <span class="card__by"><?php echo $animal['price'] ?>$ <a href="#" class="
                    card__author" title="author"><?php echo $animal['sexe'] ?></a></span>
        </div>
    </article>
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
        echo "<br>Check your mails 🤭❗";
    } else {
        echo
        "<form method=\"post\" style=\"display: flex; flex-direction: column; width: 30%\">
        <input type=\"submit\" name=\"buy\" value=\"BUY\">
    </form>";
    }
    ?>


    <?php
    require_once 'mail.php';
    $mail = $_SESSION['mail'];
    $name = $_SESSION['name'];
    if (isset($_POST['buy']) && isset($_SESSION['name'])) {
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
                $_SESSION['animal'] = $animal;
                sendEmail("Congrats !", $mail, $name);
                // add an owner to the pet
                $query = "UPDATE pets SET owner = '$mail' WHERE id = " . $_SESSION['petId'];
                $result = mysqli_query($connexion, $query);
                // header("Refresh:0");
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
    if (isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
        $mail = $_SESSION['mail'];
        $query = "SELECT * FROM account WHERE name = '$name' and mail = '$mail'";
        $result = mysqli_query($connexion, $query);
        $row = mysqli_fetch_assoc($result);
        $balance = $row['balance'];
        echo "<h3>Your balance is: </h3>" . $balance . "$";
    }
    ?>
    <form action="buy.php" method="post" style="display: flex; flex-direction: column; width: 30%">
        <input type="text" name="amount" placeholder="Amount">
        <input type="submit" name="refill" value="Refill wallet">
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