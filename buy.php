<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/cards.css">
    <link rel="stylesheet" href="styles/buy.css">
    <title>Buy</title>
</head>

<?php
require_once 'db.php';
ini_set('display_errors', '1');
?>

<body style="overflow-y:hidden" >
    <?php require 'navbar.php'; ?>
    <div class="container">
        <h1 class="titre">Buy a new animal</h1>
        <div class="content">
            <div class="pic">
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
            </div>
            <?php
            if (!isset($_SESSION['name'])) {
                echo "
    <a href='connection.php'>Please connect to your website to purchase a pet 🤭</a>
    ";
            } else {

                $mail = $_SESSION['mail'];
                $name = $_SESSION['name'];
            }
            if ($_SESSION['bought']) {
                echo "<br>Congrats! You have bought " . $animal['name'] . ' 🎉';
                echo "<br>Check your mails 🤭❗";
            } else {
                echo
                "<form method=\"post\" style=\"display: flex; flex-direction: column; width: 30%\" class=\"newbut\">
        <input class=\"buy\" type=\"submit\" name=\"buy\" value=\"Buy\" >
    </form>";
            }
            ?>
        </div>

        <?php
        require_once 'mail.php';
        if (isset($_POST['buy']) && isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
            $mail = $_SESSION['mail'];
            $query = "SELECT * FROM account WHERE name = '$name' and mail = '$mail'";
            $result = mysqli_query($connexion, $query);
            $row = mysqli_fetch_assoc($result);
            $balance = $row['balance'];
            $price = $animal['price'];
            if ($balance >= $price) {
                $newBalance = $balance - $price;
                $query = "UPDATE account SET balance = '$newBalance' WHERE name = '$name'";
                $result = mysqli_query($connexion, $query);
                if ($result) {
                    $_SESSION['bought'] = true;
                    $_SESSION['animal'] = $animal;
                    sendEmail("Congrats !", $mail, $name);
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
    </div>
</body>

</html>