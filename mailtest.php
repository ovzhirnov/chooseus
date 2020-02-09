<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Документ без названия</title>
</head>

<body>
<?php
 $to = "zov1976@gmail.com";
// $to = "zhirnoff.oleg@yandex.ru";
 $subject = "Сообщение посетителя магазина";
 $message = "Посетитель просит перезвонить ему!";

//  	mail ($to, $subject, $message);

  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=windows-1251\r\n";
  $headers .= "To: $to\r\n";
  $headers .= "From: chooseus";
 
    require_once ("smtpauth.php");
	MailSmtp ($to, $subject, $message, $headers);
?>
</body>
</html>