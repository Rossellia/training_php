<?php

	// Include the PHPMailer classes
	// If these are located somewhere else, simply change the path.
	require_once("../ch5__12/photo_gallery/includes/PHPMailer/src/PHPMailer.php");
	//require_once("../ch5__12/photo_gallery/includes/PHPMailer/src/POP3.php");
	require_once("../ch5__12/photo_gallery/includes/PHPMailer/src/SMTP.php");
	//require_once("../ch5__12/photo_gallery/includes/PHPMailer/language/phpmailer.lang-en.php");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	//require 'vendor/autoload.php';
	
	// mostly the same variables as before
	// ($to_name & $from_name are new, $headers was omitted) 
	$to_name = "Leyu";
	$to = "raluca.bucnaru@gmail.com";
	$subject = "Mail Test at ".strftime("%T", time());
	$message = "This is a test.";
	$message = wordwrap($message,70);
	$from_name = "Leya Tenebrae";
	$from = "raluca.bucnaru@gmail.com";
	
	// PHPMailer's Object-oriented approach
	$mail = new PHPMailer();
	
	// // Can use SMTP
	// // comment out this section and it will use PHP mail() instead
	// // $mail->IsSMTP();
	// // $mail->Host     = "your.host.com";
	// // $mail->Port     = 25;
	// // $mail->SMTPAuth = false;
	// // $mail->Username = "your_username";
	// // $mail->Password = "your_password";
	
	// Could assign strings directly to these, I only used the 
	// former variables to illustrate how similar the two approaches are.
	$mail->FromName = $from_name;
	$mail->From     = $from;
	$mail->AddAddress($to, $to_name);
	$mail->Subject  = $subject;
	$mail->Body     = $message;
	
	$result = $mail->Send();
	echo $result ? 'Sent' : 'Error';


	
// try {
//     //Server settings
//     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     // $mail->isSMTP();                                            //Send using SMTP
//     // $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
//     // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     // $mail->Username   = 'user@example.com';                     //SMTP username
//     // $mail->Password   = 'secret';                               //SMTP password
//     // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('raluca.bucnaru@gmail.com', 'Mailer');
//     $mail->addAddress('raluca.bucnaru@outlook.com', 'Leya Tenebrae');     //Add a recipient
//     //$mail->addAddress('ellen@example.com');               //Name is optional
//     $mail->addReplyTo('raluca.bucnaru@gmail.com', 'Information');
//     //$mail->addCC('cc@example.com');
//     //$mail->addBCC('bcc@example.com');

//     //Attachments
//     //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//     //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = $subject;
//     $mail->Body    = $message;
//     $mail->AltBody = $message;

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }

//somehoww doesn't work
  
?>