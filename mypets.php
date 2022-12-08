<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/cards.css">

    <link rel="stylesheet" href="styles/index.css">
</head>

<?php
require_once 'db.php';
ini_set('display_errors', '1');
?>

<body style="overflow-x:hidden">
    <?php require 'navbar.php';
    if (!isset($_SESSION['name'])) {
        header('Location: login.php');
    }
    ?>
    <div class="container plus">
        <?php
        $sql = "SELECT * from pets where owner like \"" . $_SESSION['mail'] . "\"";
        $result = mysqli_query($connexion, $sql);
        $animals = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($connexion);
        ?>
        <?php foreach ($animals as $animal) : ?>
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
                    <span class="card__by"><?php echo $animal['price'] ?>$ <a class="
                    card__author" title="author"><?php echo $animal['sexe'] ?></a></span>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</body>

</html>