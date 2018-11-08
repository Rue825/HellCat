<?php
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$subject = htmlspecialchars($_POST['subject']);
	$message = htmlspecialchars($_POST['message']);
	if ($name == '' || $email = '' || $subject == '' || $message == '') {
		echo 'Заполните все поля';
		exit;
	}
	// Отправка
	$subject = "=?utf-8?B?".base64_encode($subject)."?=";
	$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";
	if(mail($_POST['email'], $subject, $message, $headers))
		echo "<p style=color:green>Сообщение отправлено<p>";
	else
		echo "Сообщение не отправлено";
	// if(mail("bomber106460@gmail.com", $subject, $message, $headers))
	// 	echo "Сообщение отправлено";
	// else
	// 	echo "Сообщение не отправлено";
?>
