<?php 

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$message = $_POST['user_message'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'kit_vitalevich@mail.ru';                 // Наш логин
$mail->Password = 'Saturn1911';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('kit_vitalevich@mail.ru', 'Nikita Vitalevich');   // От кого письмо 
$mail->addAddress('kit.vitalevich@yandex.ru');     // Кому письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Это тема сообщения';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Имя: ' . $name . ' <br>
	Телефон: ' . $phone . ' <br>
	Почта: ' . $email . ' <br>
	Сообщение: ' . $message . '';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
	   echo 'Сообщение не отправлено';
	   echo 'Mailer Error : ' . $mail->ErrorInfo;
} else {
	   echo 'Сообщение отправлено';
}

?>