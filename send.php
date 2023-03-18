<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

$name = htmlentities($_POST['name']);
$email = htmlentities($_POST['email']);
$subject = htmlentities($_POST['subject']);
$message = htmlentities($_POST['message']);


if ($_POST['email'])
{
$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "janz20221231@gmail.com";                 
$mail->Password = "apoqlecjpsuxmyue";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   

$mail->From = $email;

$mail->addAddress('janz20221231@gmail.com');
$mail->addReplyTo($email, $name);

$mail->isHTML(true);

$mail->Subject = ("$email ($subject)");
$mail->Body = $message;
//$mail->AltBody = "This is the plain text version of the email content";

$mail->send();

echo "Message has been sent successfully";


}
else
{
    echo "Something went wrong";
}

?>
