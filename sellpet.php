<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/sellpet.css">
</head>

<?php
require_once 'db.php';
?>

<body>
    <?php require 'navbar.php'; ?>
    <div class="container">
        <h1>Sell your pet</h1>
        <form role="form" style="width: 50%;" method="POST">
            <div class="form_group">
                <input class="input" type="text" placeholder="Pet's name" required name="name">
            </div>
            <div class="form_group">
                <input class="input" type="text" placeholder="Pet's species" required name="species">
            </div>
            <div class="form_group">
                <input class="input" type="text" placeholder="Pet's race" required name="race">
            </div>
            <div class="form_group">
                <input class="input" type="number" placeholder="Pet's weight" required name="weight">
            </div>
            <div class="form_group">
                <input class="input" type="number" placeholder="Pet's age" required name="age">
            </div>
            <div class="form_group">
                <input class="input" type="number" placeholder="Pet's price" required name="price">
            </div>
            <div class="form_group">
                <select name="sexe" class="input">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form_group">
                <input class="input" type="text" placeholder="Pet's picture" required name="photo">
            </div>
            <div class="form_group">
                <input class="input" type="submit" placeholder="Sell" name="sell">
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['sell'])) {
        $name = $_POST['name'];
        $species = $_POST['species'];
        $race = $_POST['race'];
        $weight = $_POST['weight'];
        $age = $_POST['age'];
        $price = $_POST['price'];
        $sexe = $_POST['sexe'];
        $photo = $_POST['photo'];
        $sql = "INSERT INTO pets values
             (NULL, '$name', '$species', '$race', '$weight', '$age', '$price', '$sexe', '$photo', NULL)";
        $result = mysqli_query($connexion, $sql);
        if ($result) {
            echo "Pet added successfully";
        } else {
            echo "Error adding pet";
        }
    }
    ?>
</body>

</html>