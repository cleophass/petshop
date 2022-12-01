<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index.css">
</head>

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
        $mail->Password = "aemlybffsvoqdknh";
        $mail->Subject = $subject;
        $mail->setFrom('contact.apuppies@gmail.com');
        $mail->isHTML(true);

        $mail->Body = "Congratulation " . $name . " !!<br>You just bought " . $_SESSION['animal']['name'] . " 🎉🎉🎉";

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