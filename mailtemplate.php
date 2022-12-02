<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- linkcss -->
    
    <title>Document</title>
    
</head>
<body>
<?php
require_once 'db.php';
ini_set('display_errors', '1');
?>






    <!-- img -->
    <img src="assets/logo.png" alt="mail" border="0">
    <h1 style="
        
        font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 40px;
    
    text-align: center;
    color:cyan;">
        Hello <?php echo $_SESSION['name'] ?>

    from the ApuPuppies team !</h1>
    <h2>we congratulate you for your purchase in our shop<br>
    We hope that you take care of <?php echo $_SESSION['animal']['name'] ?></h2>
    <img src="<?php echo $_SESSION['animal']['photo'] ?>" alt="mail" border="0">

    <h3></h3>
        if you have a question about your order you can contact us:
        ✉️ : contact.apuppies@gmail.com
        📞 : +60-11-2967-1427
        (This is an automatic message.)
        No refund or exchange is possible for pets purchased on our online store. 
        if the animals have abnormal behaviour or reaction, contact us, we will redirect you to the best animal behaviour specialists.</h3>
    <!-- insert image -->


    <p>Thank you for your purchase. We hope you enjoy your new puppy.</p>
    <p>Best Regards,</p>
    <p>ApuPuppies Team</p>

    
</body>
<style>
    h1{
        

       

    
        
    }
    img{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 10%;
        /* color red */
    }

    h2{
        /* font */
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        text-align: center;
    }
   


h3{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        text-align: center;

    
}
</style>
</html>