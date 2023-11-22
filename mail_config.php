<?php
require 'PHPMailer/vendor/autoload.php';
$sendemail = new PHPMailer\PHPMailer\PHPMailer();
$sendemail->isSMTP();
$sendemail->Host = 'mail.asfera.in';
$sendemail->Port = 587;
$sendemail->SMTPSecure = 'tls';
$sendemail->SMTPAuth = true;
$sendemail->Username = 'forms@asfera.in';
$sendemail->Password = 'asfera@1234';
$sendemail->SetFrom('forms@asfera.in', 'Asfera');
$sendemail->IsHTML(true);
// $sendemail->SMTPDebug=4;
?>
