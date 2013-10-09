<?php
// email.php


require('classes/Email.class.php');
require('classes/Courier.class.php');
require('settings.php');

$Courier = new Courier();
$Courier->server = $settings['smtp_server'];
$Courier->port = $settings['smtp_port'];
$Courier->username = $settings['smtp_username'];
$Courier->password = $settings['smtp_password'];

$Email = new Email();
$Email->from = "example@company.com";
$Email->to = "johnny@example.com";
$Email->headers['Reply-To'] = "example@company.com";
$Email->subject = "Email Subject";
$Email->message = "Hello! Your Email goes here";

$Courier->connect();
$Courier->send($Email);
$Courier->disconnect();
?>