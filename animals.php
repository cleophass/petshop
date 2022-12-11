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
$_SESSION['actual'] = '*';
$_SESSION['actualRace'] = '*';
ini_set('display_errors', '1');
if (isset($_POST['bought'])) {
    $_SESSION['petId'] = null;
}
?>



<body>
    <div class="nav_content">
        


        <ul id="item">
            <li><a href="?pressed=<?php echo '*'; ?>#animal_part">
                    <p class="p1">All</p>
                </a></li>



            <?php
            $sql = 'SELECT DISTINCT species FROM pets ';
            $list = mysqli_query($connexion, $sql);
            while ($data = mysqli_fetch_array($list)) {
                $sql2 = "SELECT DISTINCT race FROM pets where species = '" . $data['species'] . "' and owner is null" ;
                $list2 = mysqli_query($connexion, $sql2);


                echo"<li class=\"hov\">
                <a class='p1' href=?pressed=" . $data['species'] . "#animal_part >" . $data['species'] . "</a>
                <ul class=\"main\">
               
               ";
                while ($data2 = mysqli_fetch_array($list2)) {
                    echo '
                <li> <a href=?pressedRace=' . $data2['race'] . '#animal_part >' . $data2['race'] . '</a></li>
                ';
                }
                echo '</ul>
                
                
        </li>';
            }
            ?>

        </ul>
    </div>

    <?php


    if (isset($_GET['pressed'])) {
        $_SESSION['actual'] = $_GET['pressed'];
        $_SESSION['actualRace'] = '*';
    }

    if (isset($_GET['pressedRace'])) {
        $_SESSION['actualRace'] = $_GET['pressedRace'];
    }
    ?>







    <div class="container">
        <?php
        if ($_SESSION['actualRace'] == '*') {
            if ($_SESSION['actual'] == '*') {
                $sql = "SELECT * FROM pets where owner is null";
            } else {
                $sql = "SELECT * FROM pets where species = '" . $_SESSION['actual'] . "' and owner is null";
            }
        } else {
            $sql = "SELECT * FROM pets where race = '" . $_SESSION['actualRace'] . "' and owner is null";
        }
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