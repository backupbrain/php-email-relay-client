<?php
// email.php

// include required settings and classes
require('classes/Email.class.php');
require('classes/Courier.class.php');
require('settings.php');

// initialize the server and configure it to connect
// to the relay server
$Courier = new Courier();
$Courier->server = $settings['smtp_server'];
$Courier->port = $settings['smtp_port'];
$Courier->username = $settings['smtp_username'];
$Courier->password = $settings['smtp_password'];

// let's make an Email
$Email = new Email();
$Email->from = "example@company.com";
$Email->to = "johnny@example.com";
$Email->headers['Reply-To'] = "example@company.com";
$Email->subject = "Email Subject";
$Email->message = "Hello! Your Email goes here";

// connect and send the Email.  
$Courier->connect();
$Courier->send($Email);
$Courier->disconnect();
?>