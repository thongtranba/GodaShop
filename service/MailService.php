<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class MailService {
	function send($from, $to, $subject, $content) {
		// sleep(5);
		// echo "Đã gởi mail thành công";
		// //Import PHPMailer classes into the global namespace
		//These must be at the top of your script, not inside a function
		
		//Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);
		$mail->CharSet = 'UTF-8';//fix tiếng việt
		try {
    		//Server settings
    		$mail->SMTPDebug = 0;                      //Enable verbose debug output
		    $mail->isSMTP();                                            //Send using SMTP
		    $mail->Host       = SMTP_HOST;                     //Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $mail->Username   = SMTP_USERNAME;                     //SMTP username
		    $mail->Password   = SMTP_SECRET;                               //SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		    //Recipients
		    $mail->setFrom($from);
		    $mail->addAddress($to);     //Add a recipient

		    //Content
		    $mail->isHTML(true);                                  //Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $content;

		    $mail->send();
		    return true;
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}
 ?>
