<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/cards.css">
    <script src="./animals.js"></script>

</head>

<?php
require_once 'db.php';
ini_set('display_errors', '1');
?>


<body>
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

        // if ($_GET['species_id'] == 'all') {
        //     $sql = 'SELECT * FROM pets';
        // } else {
        //     // else we display only the pets with the species_id
        //     $sql = 'SELECT * FROM pets WHERE species = "' . $_GET['species_id'] . '"';
        // }


        $sql = 'SELECT * FROM pets';
        $result = mysqli_query($connexion, $sql);
        $animals = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($connexion);
        ?>


        <!-- <table>
        <tr>
            <th>Name</th>
            <th>Picture</th>
            <th>Species</th>
            <th>Race</th>
            <th>Weight</th>
            <th>Age</th>
            <th>Price</th>
            <th>Sexe</th>
            <th>Buy</th>
        </tr> -->





        <?php foreach ($animals as $animal) : ?>




            <article class="card card--1" style="background-image:url(<?php echo $animal['photo'] ?>">
                <div class="card__info-hover">
                    <span class="card__category" viewBox="0 0 24 24"><?php echo $animal['age'] ?>years old</span>

                    </svg>
                    <div class="card__clock-info">
                        <span class="card__time" viewBox="0 0 24 24"><?php echo $animal['weight'] ?> kg</span>

                        </svg><span class="card__time"><?php echo $animal['race'] ?></span>
                    </div>

                </div>
                <div class="card__img"></div>
                <a href="#" class="card_link">
                    <div class="card__img--hover"></div>
                </a>
                <div class="card__info">
                    <span class="card__category"><?php echo $animal['species'] ?></span>
                    <h3 class="card__title"><?php echo $animal['name'] ?></h3>
                    <span class="card__by"><?php echo $animal['price'] ?>$ <a href="#" class="card__author" title="author"><?php echo $animal['sexe'] ?></a></span>
                </div>
            </article>



            <!-- <tr>

                    <td><?php echo $animal['name'] ?></td>
                    <td><?php echo $animal['species'] ?></td>
                    <td><?php echo $animal['race'] ?></td>
                    <td><?php echo $animal['weight'] ?></td>
                    <td><?php echo $animal['age'] ?></td>
                    <td><?php echo $animal['price'] ?></td>
                    <td><?php echo $animal['sexe'] ?></td>
                    <td> -->
            <!-- <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $animal['id'] ?>">
                            <input type="submit" value="Buy" name="buy">
                        </form>
                    </td>
                </tr> -->
        <?php endforeach; ?>


        <!-- </table> -->
        <?php
        if (isset($_POST['buy'])) {
            $_SESSION['petId'] = $_POST['id'];
            $_SESSION['bought'] = false;
            echo "<script>location.href='buy.php'</script>";
        }
        ?>
</div>
</body>

</html>