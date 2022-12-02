<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/cards.css">
    
    <link rel="stylesheet" href="styles/nav.css">
    <script src="./animals.js"></script>


</head>

<?php
require_once 'db.php';
ini_set('display_errors', '1');
if (isset($_POST['bought'])) {
    $_SESSION['petId'] = null;
}
?>


<body>
<div class="navanimal">
        
        
        <ul id="anim">
        <li><a href="">
                    <p class="t1">All</p>
            </a></li>
            <li><a href="">
                    <p class="t1">Dog</p>
            </a></li>
            <li><a href="">
                    <p class="t1">Cat</i>
            </a></li>
            <li><a href="">
                    <p class="t1">Monkey</p>
            </a></li>
            <li><a href="">
                    <p class="t1">Tiger</i>
            </a></li>

        </ul>
    </div>







    <div class="container">

        <select name="species" id="species_id">
            <option value="all">all</option>
            <?php

            $sql = 'SELECT DISTINCT species FROM pets ';
            $list = mysqli_query($connexion, $sql);

            while ($data = mysqli_fetch_array($list)) {
                echo '<option value="' . $data['species'] . '">' . $data['species'] . '</option>';
            }
            ?>
        </select>

        <?php
        $sql = 'SELECT * FROM pets';
        $result = mysqli_query($connexion, $sql);
        $animals = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($connexion);
        ?>

        <?php foreach ($animals as $animal) : ?>
            <a href="?buy=<?php echo $animal['id']; ?>">
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
            </a>
        <?php endforeach; ?>
        <?php
        if (isset($_GET['buy'])) {
            $_SESSION['petId'] = $_GET['buy'];
            $_SESSION['bought'] = false;
            echo "<script>location.href='buy.php'</script>";
        }
        ?>
    </div>
</body>

</html>