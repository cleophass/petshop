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
    <?php
    ini_set('display_errors', '1');
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;


    function sendEmail($subject, $to, $name)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->Username = "contact.apuppies@gmail.com";
        $mail->Password = "oxiywnbfxtxmypgj";
        $mail->Subject = $subject;
        $mail->setFrom('contact.apuppies@gmail.com');
        $mail->isHTML(true);
        // recuperer le contenue d'un ficher et le mettre dans une variable
        

       
        
        $mail->AddEmbeddedImage("assets/logo.png", "my-attach", "logo.png");
        $mail->Body = '<img alt="PHPMailer" src="cid:my-attach">';
        $mail->Body.= '<h1 style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;font-size: 40px;text-align: center;color:#003049;">
		Hello '. $_SESSION['name'] .' from the ApuPuppies team !
	</h1>
	<h2 style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;font-size: 30px;text-align: center;">
	we congratulate you for your purchase in our shop<br>We hope that you take care of '. $_SESSION['animal']['name'].'
	</h2>
	<h3 style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;font-size: 20px;text-align: center;font-style: italic;">if you have a question about your order you can contact us:
	✉️ : contact.apuppies@gmail.com
	📞 : +60-11-2967-1427
	(This is an automatic message.)
	No refund or exchange is possible for pets purchased on our online store.
	if the animals have abnormal behaviour or reaction,
	contact us, we will redirect you to the best animal behaviour specialists. </h3>';
        // $mail->Body .= file_get_contents('mailtemplate.php');
// convert body to html
// convert to html

        // $mail->Body = "Congratulation " . $name . " !!<br>You just bought " . $_SESSION['animal']['name'] . " 🎉🎉🎉";

        $mail->addAddress($to);


        if ($mail->send()) {
            echo "Check your mails 🤭❗<br>";
        } else {
            echo "Message could not be sent. Mailer Error: ";
        }

        $mail->smtpClose();
    }
    ?>

</body>

</html>