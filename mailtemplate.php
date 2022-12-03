<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<?php
require_once 'db.php';
ini_set('display_errors', '1');
?>

<body>
	


	
	<h1 style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;font-size: 40px;text-align: center;color:#003049;">
		Hello <?php echo $_SESSION['name'] ?> from the ApuPuppies team !
	</h1>
	<h2 style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;font-size: 30px;text-align: center;">
	we congratulate you for your purchase in our shop<br>We hope that you take care of <?php echo $_SESSION['animal']['name'] ?>
	</h2>
	<h3 style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;font-size: 20px;text-align: center;font-style: italic;">if you have a question about your order you can contact us:
	✉️ : contact.apuppies@gmail.com
	📞 : +60-11-2967-1427
	(This is an automatic message.)
	No refund or exchange is possible for pets purchased on our online store.
	if the animals have abnormal behaviour or reaction,
	contact us, we will redirect you to the best animal behaviour specialists. </h3>

	





</body>


</html>