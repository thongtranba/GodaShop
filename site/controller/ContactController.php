<?php 

class ContactController {
	function form() {
		include "view/contact/form.php";
	}

function send() {

	$mailService = new MailService();
	$from 		= SMTP_USERNAME;
	$to 		= OWNER_EMAIL;

	$name 		= $_POST["fullname"];
	$mobile 	= $_POST["mobile"];
	$email 		= $_POST["email"];
	$message 	= $_POST["content"];
	$content 	= "
	Name: $name,<br>
	Email: $email, <br>
	Mobile: $mobile,<br>
	Message: $message

	";
	$subject 	= "Khách hàng $email liên hệ";
	if ($mailService->send($from, $to, $subject, $content)) {
		echo 'Đã gởi mail thành công';
	}
}
}
?>
