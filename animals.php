<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index.css">
</head>

<?php
require_once 'db.php';
ini_set('display_errors', '1');
?>

<body>
    <h1>List of animals</h1>
    <?php
    $sql = "SELECT * FROM pets";
    $result = mysqli_query($connexion, $sql);
    $animals = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($connexion);
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
            <th>Buy</th>
        </tr>
        <?php foreach ($animals as $animal) : ?>
            <tr>
                <td><?php echo $animal['name'] ?></td>
                <td><?php echo $animal['species'] ?></td>
                <td><?php echo $animal['race'] ?></td>
                <td><?php echo $animal['weight'] ?></td>
                <td><?php echo $animal['age'] ?></td>
                <td><?php echo $animal['price'] ?></td>
                <td><?php echo $animal['sexe'] ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $animal['id'] ?>">
                        <input type="submit" value="Buy" name="buy">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
    if (isset($_POST['buy'])) {
        $_SESSION['petId'] = $_POST['id'];
    }
    ?>
    <a href="index.php">BAKHOME</a>
</body>

</html>